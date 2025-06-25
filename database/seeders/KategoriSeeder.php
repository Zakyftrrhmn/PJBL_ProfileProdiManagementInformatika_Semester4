<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Tambahkan ini

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'nama_kategori' => 'Berita',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
        DB::table('kategori')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'nama_kategori' => 'Artikel',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
    }
}
