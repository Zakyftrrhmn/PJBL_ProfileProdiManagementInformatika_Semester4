<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\InformasiUmum; // Pastikan Anda memiliki model InformasiUmum
use Illuminate\Support\Facades\DB; // Opsional, jika tidak pakai model

class InformasiUmumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan tabel kosong sebelum menambahkan data baru (opsional, tergantung kebutuhan)
        // InformasiUmum::truncate(); // Hanya jika menggunakan model
        DB::table('informasi_umums')->truncate(); // Jika tidak menggunakan model, atau sebagai fallback

        InformasiUmum::create([
            // Informasi Struktur Organisasi
            'nama_direktur' => 'Prof. Dr. Ir. H. John Doe, M.Eng.',
            'nama_wakil_direktur' => 'Dr. Jane Smith, S.Kom., M.T.',
            'nama_ketua_jurusan' => 'Ir. Budi Santoso, M.Kom.',
            'nama_kaprodi' => 'Andi Wijaya, S.Kom., M.TI.',
            'nama_koordinator_kampus' => 'Siti Aminah, M.Pd.', // Contoh saja

            // Statistik (Angka perkiraan, bisa disesuaikan)
            'total_mahasiswa' => 240, // Sesuai deskripsi di Hero Section sebelumnya
            'total_dosen' => 12,
            'total_alumni' => 300,

            // Umum
            'prodi_didirikan' => 2015,
            'syarat_masuk' => 'Lulusan SMA/SMK/MA sederajat, mengikuti Ujian Masuk Politeknik (UMPN) atau jalur mandiri, memiliki minat di bidang informatika.',
            'kelas_karyawan' => false,
            'gelar_diperoleh' => 'Ahli Madya Komputer (A.Md.Kom.)',
            'bisa_lanjut_s1' => true, // Prodi D3 umumnya bisa lanjut ke S1 terapan/ekstensi

            'mendukung_mbkm' => true,
            'ada_pertukaran_pelajar' => false, // Sesuaikan jika ada

            // Fasilitas
            'fasilitas_prodi' => 'Laboratorium Komputer, Ruang Kelas Ber-AC, Perpustakaan, Hotspot Wi-Fi, Kantin, Area Parkir Luas.',
            'ada_labor' => true,
            'ada_perpustakaan' => true,
            'wifi_kampus' => true,
            'akses_lms' => true,
            'layanan_disabilitas' => 'Tersedia ramp dan toilet khusus disabilitas di beberapa area gedung utama.',
            'sistem_informasi_akademik' => 'Menggunakan SIAKAD untuk KRS, KHS, Jadwal Kuliah, dan Informasi Akademik lainnya.',

            // Organisasi & Kegiatan
            'daftar_ukm' => 'Pramuka, UKM Seni, UKM Olahraga, UKM Robotik, UKM Kewirausahaan.',
            'himpunan_mahasiswa' => 'Himpunan Mahasiswa Manajemen Informatika (HIMAMI).',
            'ada_kkn' => true, // D3 kadang ada PkM atau Kuliah Kerja Lapangan
            'ada_pkm' => true, // Program Kreativitas Mahasiswa
            'kegiatan_wirausaha' => 'Workshop pengembangan startup, bazar produk mahasiswa, pelatihan bisnis digital.',

            // Beasiswa & Bantuan
            'ada_beasiswa' => true,
            'jenis_beasiswa' => 'Beasiswa Bidikmisi, Beasiswa PPA, Beasiswa Unggulan, Beasiswa Yayasan.',
            'syarat_beasiswa' => 'IPK minimal 3.00, aktif organisasi, tidak sedang menerima beasiswa lain, mengisi formulir dan melengkapi berkas.',

            // Alumni
            'prospek_kerja' => 'Web Developer, Mobile Developer, Database Administrator, System Analyst, Network Administrator, IT Support.',
            'bisa_lanjut_cpns' => true,
            'bisa_lanjut_s2' => false, // D3 umumnya belum bisa langsung ke S2, perlu S1 dulu
            'komunitas_alumni' => 'Ikatan Alumni Manajemen Informatika PSDKU Pelalawan.',
            'data_tracer_study' => 'Tersedia laporan tracer study terbaru yang dapat diakses di bagian kemahasiswaan.',

            // Link penting (contoh link dummy)
            'link_kurikulum' => 'https://www.politeknik.ac.id/kurikulum-mi-d3',
            'link_pendaftaran' => 'https://pmb.politeknik.ac.id',
            'link_pengumuman' => 'https://www.politeknik.ac.id/pengumuman',
        ]);
    }
}
