<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeskripsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deskripsi')->insert([
            'deskripsi' => 'Program Studi Manajemen Informatika mempersiapkan mahasiswa untuk menjadi tenaga ahli di bidang teknologi informasi dengan penekanan pada kemampuan pengelolaan sistem informasi, pengembangan perangkat lunak, dan penerapan teknologi komputer dalam dunia bisnis. Lulusan program ini dibekali keterampilan teknis dan manajerial untuk mendukung operasional dan transformasi digital di berbagai sektor industri.'
        ]);
    }
}
