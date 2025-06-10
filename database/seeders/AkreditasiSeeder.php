<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AkreditasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('akreditasi')->insert([
            'photo_sertifikat'    => 'akreditasi/sertifikat1.jpg',
            'nama_prodi'          => 'Manajemen Informatika',
            'akreditasi'          => 'B',
            'sk_akreditasi'       => 'SK-12345/Akred/2023',
            'tanggal_mulai'       => Carbon::create(2023, 1, 1),
            'tanggal_berakhir'    => Carbon::create(2028, 1, 1),
            'lembaga_akreditasi'  => 'BAN-PT',
            'jenjang'             => 'D3',
            'created_at'          => now(),
            'updated_at'          => now(),
        ]);
    }
}
