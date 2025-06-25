<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Tambahkan ini

class AlasanBergabungSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data contoh untuk tabel alasan_bergabung
        $alasanBergabung = [
            ['alasan' => 'Mencari pengalaman baru'],
            ['alasan' => 'Meningkatkan skill dan pengetahuan'],
            ['alasan' => 'Mendapatkan penghasilan tambahan'],
            ['alasan' => 'Menjalin koneksi dengan komunitas'],
            ['alasan' => 'Menyalurkan hobi atau minat'],
            ['alasan' => 'Kontribusi sosial'],
        ];

        // Masukkan data ke tabel
        foreach ($alasanBergabung as $alasan) {
            DB::table('alasan_bergabung')->insert([
                'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
                'alasan' => $alasan['alasan'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
