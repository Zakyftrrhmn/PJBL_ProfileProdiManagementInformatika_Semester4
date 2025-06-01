<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriKaryaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_karya')->insert([
            'nama_kategori' => 'WEBSITE'
        ]);
        DB::table('kategori_karya')->insert([
            'nama_kategori' => 'MOBILE'
        ]);
        DB::table('kategori_karya')->insert([
            'nama_kategori' => 'IoT'
        ]);
    }
}
