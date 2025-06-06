<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrontsideSeeder extends Seeder
{
    public function run()
    {
        DB::table('frontside')->insert([
            'hero_title' => 'Selamat datang di website Prodi D3 Manajemen Informatika PSDKU Pelalawan ✨',
            'hero_subtitle' => 'MANAJEMEN INFORMATIKA </br> PNP PSDKU PELALAWAN',
            'hero_description' => '240+ mahasiswa aktif di Prodi Manajemen Informatika PNP Pelalawan siap bersaing di dunia digital.',

            'intro_title' => 'Halo Sobat MI! 👋',
            'intro_description' => 'Selamat datang di website Prodi kami! Yuk, jelajahi serunya dunia kampus dan jurusan kita di sini. <strong class="text-black font-semibold">Jangan lupa kasih feedback, ya!</strong>Terima kasih! ❤️',

            'visi_misi_title' => 'Visi & Misi Prodi Kami',
            'visi_misi_subtitle' => 'Menjadi Inspirasi Masa Depan Lewat Pendidikan Vokasional',
            'visi_misi_description' => 'Kenali visi & misi kami untuk tahu ke mana langkah kami menuju!',
            'visi_misi_video_url' => null,

            'why_join_title' => 'Kenapa Manajemen Informatika PSDKU Pelalawan?',
            'why_join_description' => 'Masuk sebagai Mahasiswa, <br />Keluar sebagai Developer',
            'why_join_video_url' => null,

            'karya_title' => 'KARYA ANAK MANAJEMEN INFORMATIKA PSDKU PELALAWAN',
            'karya_subtitle' => 'Karya Nyata, Bukan Cuma Tugas Kuliah!',
            'karya_description' => 'Lihat hasil seru dari ide-ide mahasiswa: IoT, Web, dan Mobile siap tampil!',

            'dosen_title' => 'Tenaga pengajar berpengalaman',
            'dosen_subtitle' => 'Profil Dosen Pengajar',
            'dosen_description' => 'Lihat profil singkat para dosen.',

            'banner' => null,

            'information_title' => 'ARTIKEL & BERITA',
            'information_subtitle' => 'Berita & Artikel Terkini',
            'information_description' => 'Update terbaru seputar kegiatan, prestasi, dan informasi penting dari Manajemen Informatika PSDKU Pelalawan.',

            'penutup_title' => 'Penasaran dengan kampus kami?',
            'penutup_description' => 'Yuk, cari tahu lebih banyak tentang program studi, kegiatan seru, dan kehidupan mahasiswa di Politeknik Negeri Padang!',

            'kurikulum_title' => 'Kurikulum',
            'kurikulum_subtitle' => 'Struktur Kurikulum Program Studi',
            'kurikulum_description' => 'Daftar mata kuliah beserta rencana pembelajaran pada Program Studi Manajemen Informatika PSDKU Pelalawan.',

            'akreditasi_title' => 'Akreditasi',
            'akreditasi_subtitle' => 'Akreditasi',
            'akreditasi_description' => 'Akreditasi Program Studi Manajemen Informatika PSDKU Pelalawan.',

            'kalender_title' => 'Kalender Akademik',
            'kalender_subtitle' => 'Kalender Akademik Politeknik Negeri Padang Tahun 2024/2025',

            'profile_title' => 'Profile Lulusan',
            'profile_subtitle' => 'Profile Lulusan',
            'profile_description' => 'Berbagai peran yang dapat dilakukan oleh lulusan program studi Informatika di bidang keahlian atau bidang kerja tertentu setelah menyelesaikan masa perkuliahan.',

            'laporan_title' => 'Laporan Kepuasan',
            'laporan_subtitle' => 'Laporan Evaluasi Kepuasan Layanan',
            'laporan_description' => 'Evaluasi Layanan Akademik dan Non-Akademik PSDKU Pelalawan oleh Mahasiswa dan Mitra.',

            'galeri_title' => 'Gallery',
            'galeri_subtitle' => 'Galeri Kegiatan & Dokumentasi',
            'galeri_description' => 'Lihat momen-momen penting dan kegiatan menarik kami.',

            'prestasi_title' => 'Prestasi',
            'prestasi_subtitle' => 'Prestasi Mahasiswa',
            'prestasi_description' => 'Lihat pencapaian luar biasa mahasiswa kami di berbagai ajang lomba sepanjang tahun.',

            'kontak_title' => 'Informasi Kontak',
            'kontak_description' => 'Hubungi kami untuk pertanyaan, saran, atau kritik.',
        ]);
    }
}
