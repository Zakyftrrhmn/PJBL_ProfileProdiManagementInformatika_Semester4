<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('visi')->insert([
            'visi' => 'Pada tahun 2025 menjadi institusi pendidikan vokasional terbaik tingkat nasional dibidang Sistem Informasi, Bermartabat dan berwawasan Internasional'
        ]);
    }
}
