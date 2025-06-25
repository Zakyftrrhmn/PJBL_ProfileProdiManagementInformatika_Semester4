<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Tambahkan ini
use Carbon\Carbon; // Untuk memudahkan manipulasi tanggal

class PrestasiMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prestasiData = [
            [
                'nama_mahasiswa' => 'Budi Setiawan',
                'nim' => '202201001',
                'nama_lomba' => 'Lomba Desain UI/UX Nasional',
                'tingkat' => 'Nasional',
                'penyelenggara' => 'Asosiasi Desainer Indonesia',
                'tanggal_lomba' => Carbon::parse('2024-11-15'),
                'peringkat' => 'Juara 1',
                'file_sertifikat' => 'sertifikat_budi_uiux.pdf',
            ],
            [
                'nama_mahasiswa' => 'Siti Aminah',
                'nim' => '202301002',
                'nama_lomba' => 'Kompetisi Pemrograman Hackathon Regional',
                'tingkat' => 'Regional',
                'penyelenggara' => 'Dinas Komunikasi dan Informatika',
                'tanggal_lomba' => Carbon::parse('2025-03-20'),
                'peringkat' => 'Juara 3',
                'file_sertifikat' => 'sertifikat_siti_hackathon.pdf',
            ],
            [
                'nama_mahasiswa' => 'Joko Susilo',
                'nim' => '202101003',
                'nama_lomba' => 'Olimpiade Matematika Perguruan Tinggi',
                'tingkat' => 'Provinsi',
                'penyelenggara' => 'Kementerian Pendidikan',
                'tanggal_lomba' => Carbon::parse('2024-09-10'),
                'peringkat' => 'Medali Perak',
                'file_sertifikat' => 'sertifikat_joko_olimpiade.pdf',
            ],
            [
                'nama_mahasiswa' => 'Dewi Lestari',
                'nim' => '202201004',
                'nama_lomba' => 'Lomba Karya Tulis Ilmiah Nasional',
                'tingkat' => 'Nasional',
                'penyelenggara' => 'Lembaga Ilmu Pengetahuan',
                'tanggal_lomba' => Carbon::parse('2025-01-25'),
                'peringkat' => 'Finalis Terbaik',
                'file_sertifikat' => 'sertifikat_dewi_karya_ilmiah.pdf',
            ],
            [
                'nama_mahasiswa' => 'Rizky Pratama',
                'nim' => '202301005',
                'nama_lomba' => 'Turnamen E-Sports Mobile Legends',
                'tingkat' => 'Internal Kampus',
                'penyelenggara' => 'BEM Kampus',
                'tanggal_lomba' => Carbon::parse('2025-05-01'),
                'peringkat' => 'Juara 1',
                'file_sertifikat' => 'sertifikat_rizky_esports.pdf',
            ],
        ];

        foreach ($prestasiData as $data) {
            DB::table('prestasi_mahasiswas')->insert([
                'id' => (string) Str::uuid(), // <-- TAMBAHKAN BARIS INI UNTUK UUID
                'nama_mahasiswa' => $data['nama_mahasiswa'],
                'nim' => $data['nim'],
                'nama_lomba' => $data['nama_lomba'],
                'tingkat' => $data['tingkat'],
                'penyelenggara' => $data['penyelenggara'],
                'tanggal_lomba' => $data['tanggal_lomba'],
                'peringkat' => $data['peringkat'],
                'file_sertifikat' => $data['file_sertifikat'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
