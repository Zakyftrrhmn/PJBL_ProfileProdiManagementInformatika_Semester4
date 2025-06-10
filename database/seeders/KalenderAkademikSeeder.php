<?php

namespace Database\Seeders;

use Illuminate\Container\Attributes\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB as FacadesDB;

class KalenderAkademikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FacadesDB::table('kalender_akademik')->insert([
            'judul' => 'Kalender Akademik Politeknik Negeri Padang Tahun 2024/2025',
            'photo_kalender' => 'kalender_akademik.jpg',
        ]);
    }
}
