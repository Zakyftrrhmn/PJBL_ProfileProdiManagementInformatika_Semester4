<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Tambahkan ini

class KategoriKaryaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori_karya')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'nama_kategori' => 'WEBSITE',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
        DB::table('kategori_karya')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'nama_kategori' => 'MOBILE',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
        DB::table('kategori_karya')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'nama_kategori' => 'IoT',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
    }
}
