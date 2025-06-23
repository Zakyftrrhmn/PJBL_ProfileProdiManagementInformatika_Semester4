<?php

namespace App\Console\Commands; // PASTIKAN NAMESPACE INI SAMA PERSIS

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ImportCampusData extends Command // PASTIKAN NAMA CLASS INI SAMA PERSIS DENGAN NAMA FILE
{
    /**
     * The name and signature of the console command.
     * Ini adalah nama yang akan Anda gunakan untuk menjalankan perintah: php artisan campus:import-data
     *
     * @var string
     */
    protected $signature = 'campus:import-data'; // PASTIKAN STRING INI SAMA PERSIS

    /**
     * The console command description.
     * Deskripsi ini akan muncul saat Anda menjalankan `php artisan list`.
     *
     * @var string
     */
    protected $description = 'Import data pengetahuan kampus dari REST APIs ke tabel database lokal.';

    /**
     * URL dasar untuk semua endpoint API Anda.
     * Pastikan ini mengarah ke API Laravel Anda yang sedang berjalan.
     *
     * @var string
     */
    private $apiBaseUrl = 'http://localhost:8000/api/';

    /**
     * Execute the console command.
     * Ini adalah metode utama yang berisi logika untuk mengambil dan menyimpan data.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Mulai import data kampus dari REST API...');

        // Inisialisasi Guzzle HTTP Client untuk membuat permintaan ke API
        $httpClient = new Client([
            'timeout' => 30.0,          // Timeout untuk seluruh permintaan (detik)
            'connect_timeout' => 10.0,  // Timeout untuk koneksi awal (detik)
        ]);

        // Mengosongkan tabel 'campus_knowledge_data' sebelum mengimpor data baru.
        // Ini memastikan bahwa setiap kali perintah dijalankan, tabel akan berisi data terbaru dan tidak ada duplikasi.
        DB::table('campus_knowledge_data')->truncate();
        $this->info('Tabel campus_knowledge_data telah dikosongkan.');

        /**
         * Helper function to process data from a given API endpoint.
         * Fungsi pembantu untuk memproses data dari setiap endpoint API.
         *
         * @param string $endpoint The API endpoint path (e.g., 'kontak', 'visi').
         * @param string $itemName The name of the data item/type (for 'source_type' column in database).
         * @param callable $textFormatterCallback A callback function to format the API item into text content.
         */
        $processApiData = function ($endpoint, $itemName, $textFormatterCallback) use ($httpClient) {
            $fullApiUrl = $this->apiBaseUrl . $endpoint;
            $this->info("Mengambil data '{$itemName}' dari {$fullApiUrl}...");

            try {
                $response = $httpClient->get($fullApiUrl);
                $bodyContents = $response->getBody()->getContents();
                $data = json_decode($bodyContents);

                // Check for JSON decoding errors
                if (json_last_error() !== JSON_ERROR_NONE) {
                    $this->error("Gagal parse JSON untuk '{$itemName}' dari API '{$endpoint}'. Error: " . json_last_error_msg() . ". Respon diterima: " . substr($bodyContents, 0, 500) . "...");
                    Log::error("API {$itemName} JSON Decode Error: " . json_last_error_msg() . " Full Response: " . $bodyContents);
                    return;
                }

                // Laravel API Resources often wrap data in a 'data' property.
                // Check if the response has this structure and extract the actual array.
                if (is_object($data) && isset($data->data)) {
                    // For single item resources (like InformasiUmum), $data->data will be an object, not an array of objects.
                    // Convert it to an array containing that single object for consistent processing.
                    $data = is_array($data->data) ? $data->data : [$data->data];
                } else {
                    // If no 'data' property or not an object, assume it's directly the data.
                    // This warning helps in debugging unexpected API response formats.
                    $this->warn("Format respon API '{$itemName}' dari '{$endpoint}' tidak mengandung properti 'data'. Memproses apa adanya atau respon kosong.");
                    // Ensure $data is iterable, even if it's a single object
                    $data = is_array($data) ? $data : [$data];
                }

                // Ensure $data is an array before iterating
                if (is_array($data)) {
                    if (empty($data)) {
                        $this->warn("Tidak ada data ditemukan dari API '{$endpoint}'.");
                        return;
                    }
                    foreach ($data as $item) {
                        $text = $textFormatterCallback($item);
                        DB::table('campus_knowledge_data')->insert([
                            'content' => $text,
                            'source_type' => $itemName,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                    $this->info("Data '{$itemName}' dari API '{$endpoint}' selesai diimpor: " . count($data) . " item.");
                } else {
                    // Handle case where $data is not an array after data extraction
                    $this->error("Data '{$itemName}' dari API '{$endpoint}' tidak valid (bukan array setelah ekstraksi properti 'data'). Respon Diterima: " . substr($bodyContents, 0, 500) . "...");
                    Log::error("API {$itemName} Not an array after data extraction: " . $bodyContents);
                }
            } catch (\GuzzleHttp\Exception\ClientException $e) {
                $this->error("Gagal mengambil data '{$itemName}' dari API (Client Error: " . $e->getCode() . "): " . $e->getMessage());
                Log::error("API {$itemName} Client Error: " . $e->getMessage() . " Response: " . ($e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'No response body'));
            } catch (\GuzzleHttp\Exception\ServerException $e) {
                $this->error("Gagal mengambil data '{$itemName}' dari API (Server Error: " . $e->getCode() . "): " . $e->getMessage());
                Log::error("API {$itemName} Server Error: " . $e->getMessage() . " Response: " . ($e->hasResponse() ? $e->getResponse()->getBody()->getContents() : 'No response body'));
            } catch (\Exception $e) {
                $this->error("Gagal mengambil data '{$itemName}' dari API: " . $e->getMessage());
                Log::error("API {$itemName} General Error: " . $e->getMessage());
            }
        };

        // --- Panggilan ke Helper Function untuk Setiap API Endpoint ---
        // Pastikan nama properti ($item->nama_kolom) sesuai dengan respons JSON dari API Anda.
        // Jika API Anda mengembalikan objek tunggal (bukan array), ini akan tetap berfungsi karena loop 'foreach' pada objek tunggal akan mengiterasinya sekali.

        // Menambahkan informasi nama kampus dan prodi secara manual.
        // Ini adalah fallback yang bagus jika Anda tidak memiliki API khusus untuk ini.
        DB::table('campus_knowledge_data')->insert([
            'content' => "Nama kampus adalah Politeknik Negeri Padang, dan nama program studinya adalah Manajemen Informatika PSDKU Pelalawan. Kampus ini berlokasi di Jl. Maharaja Indra, Pelalawan, Riau, Indonesia.",
            'source_type' => 'informasi_umum_dasar', // Tipe sumber baru untuk informasi umum dasar
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $this->info('Informasi nama kampus dan prodi telah ditambahkan secara manual.');


        // ==========================================================================================================
        // PENAMBAHAN BARU UNTUK INFORMASI UMUM
        // ==========================================================================================================
        $this->info('Mengambil data Informasi Umum...');
        $processApiData('informasi_umum', 'informasi_umum', function ($item) {
            $content = [];
            $content[] = "Nama Direktur: " . ($item->nama_direktur ?? 'N/A');
            $content[] = "Nama Wakil Direktur: " . ($item->nama_wakil_direktur ?? 'N/A');
            $content[] = "Nama Ketua Jurusan: " . ($item->nama_ketua_jurusan ?? 'N/A');
            $content[] = "Nama Kaprodi: " . ($item->nama_kaprodi ?? 'N/A');
            $content[] = "Nama Koordinator Kampus: " . ($item->nama_koordinator_kampus ?? 'N/A');
            $content[] = "Total Mahasiswa: " . ($item->total_mahasiswa ?? 'N/A');
            $content[] = "Total Dosen: " . ($item->total_dosen ?? 'N/A');
            $content[] = "Total Alumni: " . ($item->total_alumni ?? 'N/A');
            $content[] = "Prodi Didirikan Tahun: " . ($item->prodi_didirikan ?? 'N/A');
            $content[] = "Syarat Masuk: " . ($item->syarat_masuk ?? 'N/A');
            $content[] = "Kelas Karyawan Tersedia: " . (($item->kelas_karyawan ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Gelar Diperoleh: " . ($item->gelar_diperoleh ?? 'N/A');
            $content[] = "Bisa Lanjut S1: " . (($item->bisa_lanjut_s1 ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Mendukung MBKM: " . (($item->mendukung_mbkm ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Ada Pertukaran Pelajar: " . (($item->ada_pertukaran_pelajar ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Fasilitas Prodi: " . ($item->fasilitas_prodi ?? 'N/A');
            $content[] = "Ada Laboratorium: " . (($item->ada_labor ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Ada Perpustakaan: " . (($item->ada_perpustakaan ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Wifi Kampus Tersedia: " . (($item->wifi_kampus ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Akses LMS Tersedia: " . (($item->akses_lms ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Layanan Disabilitas: " . ($item->layanan_disabilitas ?? 'N/A');
            $content[] = "Sistem Informasi Akademik: " . ($item->sistem_informasi_akademik ?? 'N/A');
            $content[] = "Daftar UKM: " . ($item->daftar_ukm ?? 'N/A');
            $content[] = "Himpunan Mahasiswa: " . ($item->himpunan_mahasiswa ?? 'N/A');
            $content[] = "Ada KKN: " . (($item->ada_kkn ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Ada PKM: " . (($item->ada_pkm ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Kegiatan Wirausaha: " . ($item->kegiatan_wirausaha ?? 'N/A');
            $content[] = "Ada Beasiswa: " . (($item->ada_beasiswa ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Jenis Beasiswa: " . ($item->jenis_beasiswa ?? 'N/A');
            $content[] = "Syarat Beasiswa: " . ($item->syarat_beasiswa ?? 'N/A');
            $content[] = "Prospek Kerja: " . ($item->prospek_kerja ?? 'N/A');
            $content[] = "Bisa Lanjut CPNS: " . (($item->bisa_lanjut_cpns ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Bisa Lanjut S2: " . (($item->bisa_lanjut_s2 ?? false) ? 'Ya' : 'Tidak');
            $content[] = "Komunitas Alumni: " . ($item->komunitas_alumni ?? 'N/A');
            $content[] = "Data Tracer Study: " . ($item->data_tracer_study ?? 'N/A');
            $content[] = "Link Kurikulum: " . ($item->link_kurikulum ?? 'N/A');
            $content[] = "Link Pendaftaran: " . ($item->link_pendaftaran ?? 'N/A');
            $content[] = "Link Pengumuman: " . ($item->link_pengumuman ?? 'N/A');

            return implode(". ", array_filter($content)); // Gabungkan semua string menjadi satu paragraf
        });
        // ==========================================================================================================
        // AKHIR PENAMBAHAN BARU UNTUK INFORMASI UMUM
        // ==========================================================================================================


        // Visi (Menggunakan VisiResource atau struktur API Anda)
        $processApiData('visi', 'visi', function ($item) {
            return "Visi kampus Manajemen Informatika PSDKU Pelalawan adalah: " . ($item->visi ?? 'Tidak Ada Visi');
        });

        // Misi (Menggunakan MisiResource atau struktur API Anda)
        $processApiData('misi', 'misi', function ($item) {
            return "Misi kampus Manajemen Informatika PSDKU Pelalawan adalah: " . ($item->misi ?? 'Tidak Ada Misi');
        });

        // Karya Mahasiswa (Menggunakan KaryaMahasiswaResource atau struktur API Anda)
        $processApiData('karya_mahasiswa', 'karya_mahasiswa', function ($item) {
            return "Karya mahasiswa berjudul '" . ($item->judul ?? 'Tidak Ada Judul') . "' dari kategori " . ($item->kategori ?? 'Tidak Ada Kategori') . ". Isinya: " . ($item->isi ?? 'Tidak Ada Isi') . ". Dibuat pada tahun " . ($item->tahun ?? 'Tidak Ada Tahun') . ".";
        });

        // Informasi (Menggunakan InformasiResource atau struktur API Anda)
        $processApiData('informasi', 'informasi', function ($item) {
            return "Informasi berjudul '" . ($item->judul ?? 'Tidak Ada Judul') . "'. Kategorinya: " . ($item->kategori ?? 'Tidak Ada Kategori') . ". Isinya: " . ($item->isi ?? 'Tidak Ada Isi') . ". Dipublikasikan oleh " . ($item->user_id ?? 'Tidak Diketahui') . " sekitar " . ($item->created_at ?? 'Tidak Ada Waktu') . ".";
        });

        // Kalender Akademik (Menggunakan KalenderAkademikResource atau struktur API Anda)
        $processApiData('kalender_akademik', 'kalender_akademik', function ($item) {
            return "Kalender akademik berjudul '" . ($item->judul ?? 'Tidak Ada Judul') . "'.";
            // Jika ada detail kegiatan di KalenderAkademikResource, tambahkan di sini
        });

        // Kurikulum (Menggunakan KurikulumResource atau struktur API Anda)
        $processApiData('kurikulum', 'kurikulum', function ($item) {
            return "Mata kuliah " . ($item->mata_kuliah ?? 'Tidak Ada Nama') . " (Kode " . ($item->kode_mk ?? 'Tidak Ada Kode') . ") memiliki " . ($item->sks ?? 'Tidak Ada SKS') . ". Bentuk perkuliahannya " . ($item->bentuk_perkuliahan ?? 'Tidak Diketahui') . " dan diajarkan pada semester " . ($item->semester ?? 'Tidak Ada Semester') . ". RPS tersedia di " . ($item->rps ?? 'Tidak Ada RPS') . ".";
        });

        // Akreditasi (Pastikan nama kolom sesuai dengan AkreditasiResource atau struktur API Anda)
        $processApiData('akreditasi', 'akreditasi', function ($item) {
            return "Status akreditasi program studi Manajemen Informatika PSDKU Pelalawan adalah '" . ($item->akreditasi ?? 'Tidak Ada Status') . "', berlaku dari tahun " . ($item->tanggal_mulai ?? 'Tidak Ada Tahun Mulai') . " hingga " . ($item->tanggal_berakhir ?? 'Tidak Ada Tahun Selesai') . ". Nama prodi: " . ($item->nama_prodi ?? 'Tidak Ada Nama Prodi') . ".";
        });

        // Profile Kelulusan (Menggunakan ProfileKelulusanResource atau struktur API Anda)
        $processApiData('profile_lulusan', 'profile_lulusan', function ($item) {
            return "Profil kelulusan mahasiswa: " . ($item->nama_profile ?? 'Tidak Ada Nama Profil') . ". Deskripsi: " . ($item->deskripsi ?? 'Tidak Ada Deskripsi') . ".";
        });

        // Laporan Kepuasan (Menggunakan LaporanKepuasanResource atau struktur API Anda)
        $processApiData('laporan_kepuasan', 'laporan_kepuasan', function ($item) {
            return "Laporan kepuasan berjudul '" . ($item->nama_laporan ?? 'Tidak Ada Nama Laporan') . "'. File laporan tersedia di " . ($item->file_laporan ?? 'Tidak Ada File');
        });

        // Prestasi Mahasiswa (Menggunakan PrestasiMahasiswaResource atau struktur API Anda)
        $processApiData('prestasi_mahasiswa', 'prestasi_mahasiswa', function ($item) {
            return "Prestasi mahasiswa bernama " . ($item->nama_mahasiswa ?? 'Tidak Ada Nama') . " (NIM: " . ($item->nim ?? 'Tidak Ada NIM') . ") meraih peringkat " . ($item->peringkat ?? 'Tidak Ada Peringkat') . " dalam lomba '" . ($item->nama_lomba ?? 'Tidak Ada Nama Lomba') . "' tingkat " . ($item->tingkat ?? 'Tidak Ada Tingkat') . ". Diselenggarakan oleh " . ($item->penyelenggara ?? 'Tidak Ada Penyelenggara') . " pada tanggal " . ($item->tanggal_lomba ?? 'Tidak Ada Tanggal Lomba') . ". File sertifikat: " . ($item->file_sertifikat ?? 'Tidak Ada File Sertifikat') . ".";
        });

        // Kontak (Menggunakan API endpoint 'kontak' dan skema tabel Anda)
        // Pastikan $item->location dan properti lainnya sesuai dengan data dari API /api/kontak Anda.
        $processApiData('kontak', 'kontak', function ($item) {
            return "Informasi kontak kampus Manajemen Informatika PSDKU Pelalawan: Facebook: " . ($item->link_fb ?? 'Tidak Tersedia') . ". Twitter: " . ($item->link_twitter ?? 'Tidak Tersedia') . ". Instagram: " . ($item->link_instagram ?? 'Tidak Tersedia') . ". WhatsApp: " . ($item->link_wa ?? 'Tidak Tersedia') . ". Website: " . ($item->link_website ?? 'Tidak Tersedia') . ". Nomor Telepon: " . ($item->no_telp ?? 'Tidak Tersedia') . ". Email: " . ($item->gmail ?? 'Tidak Tersedia') . ". Lokasi: " . ($item->location ?? 'Tidak Tersedia') . ".";
        });

        // Dosen (Pastikan nama kolom ($item->kolom_anda) sesuai dengan respons JSON API /dosen)
        $processApiData('dosen', 'dosen', function ($item) {
            return "Dosen bernama " . ($item->nama ?? 'Tidak Ada Nama') . ". NIDN: " . ($item->nidn ?? 'Tidak Ada NIDN') . ". Email: " . ($item->email ?? 'Tidak Ada Email') . ". Asal kota: " . ($item->asal_kota ?? 'Tidak Ada Informasi Asal Kota') . ". Pendidikan terakhir: " . ($item->pendidikan ?? 'Tidak Ada Informasi Pendidikan') . ". Jabatan: " . ($item->jabatan ?? 'Tidak Ada Informasi Jabatan') . ". Website: " . ($item->website ?? 'Tidak Ada Website') . ".";
        });


        $this->info('Semua data kampus selesai diimpor ke tabel campus_knowledge_data.');
        return Command::SUCCESS; // Mengembalikan status sukses
    }
}
