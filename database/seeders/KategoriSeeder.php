<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kategori::create([
            'nama_kategori' => 'Pengumuman'
        ]);
        Kategori::create([
            'nama_kategori' => 'Lowongan'
        ]);
        Kategori::create([
            'nama_kategori' => 'Tips'
        ]);
        Kategori::create([
            'nama_kategori' => 'Berita'
        ]);
        Kategori::create([
            'nama_kategori' => 'Prestasi'
        ]);
    }
}
