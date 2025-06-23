<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informasi_umums', function (Blueprint $table) {
            $table->id();

            // Informasi Struktur Organisasi
            $table->string('nama_direktur')->nullable();
            $table->string('nama_wakil_direktur')->nullable();
            $table->string('nama_ketua_jurusan')->nullable();
            $table->string('nama_kaprodi')->nullable();
            $table->string('nama_koordinator_kampus')->nullable();

            // Statistik
            $table->integer('total_mahasiswa')->nullable();
            $table->integer('total_dosen')->nullable();
            $table->integer('total_alumni')->nullable();

            // Umum
            $table->year('prodi_didirikan')->nullable();
            $table->text('syarat_masuk')->nullable();
            $table->boolean('kelas_karyawan')->default(false);
            $table->string('gelar_diperoleh')->nullable();
            $table->boolean('bisa_lanjut_s1')->default(false);

            $table->boolean('mendukung_mbkm')->default(false);
            $table->boolean('ada_pertukaran_pelajar')->default(false);

            // Fasilitas
            $table->text('fasilitas_prodi')->nullable();
            $table->boolean('ada_labor')->default(false);
            $table->boolean('ada_perpustakaan')->default(false);
            $table->boolean('wifi_kampus')->default(false);
            $table->boolean('akses_lms')->default(false);
            $table->text('layanan_disabilitas')->nullable();
            $table->text('sistem_informasi_akademik')->nullable();

            // Organisasi & Kegiatan
            $table->text('daftar_ukm')->nullable();
            $table->text('himpunan_mahasiswa')->nullable();
            $table->boolean('ada_kkn')->default(false);
            $table->boolean('ada_pkm')->default(false);
            $table->text('kegiatan_wirausaha')->nullable();

            // Beasiswa & Bantuan
            $table->boolean('ada_beasiswa')->default(false);
            $table->text('jenis_beasiswa')->nullable();
            $table->text('syarat_beasiswa')->nullable();


            // Alumni
            $table->text('prospek_kerja')->nullable();
            $table->boolean('bisa_lanjut_cpns')->default(true);
            $table->boolean('bisa_lanjut_s2')->default(false);
            $table->text('komunitas_alumni')->nullable();
            $table->text('data_tracer_study')->nullable();

            // Link penting (optional)
            $table->string('link_kurikulum')->nullable();
            $table->string('link_pendaftaran')->nullable();
            $table->string('link_pengumuman')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informasi_umums');
    }
};
