<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Tambahkan ini

class MisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('misi')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'misi' => 'Menyelenggarakan pendidikan vokasional dibidang Sistem Informasi yang sesuai dengan perkembangan ilmu pengetahuan dan teknologi yang berwawasan Internasional.',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
        DB::table('misi')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'misi' => 'Menyelanggarakan penelitian yang inovatif dan adaptif dibidang Sistem Informasi untuk pengembangan ilmu pengetahuan dan teknologi.',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
        DB::table('misi')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'misi' => 'Menerapkan ilmu pengetahuan dan teknologi dalam rangka memecahkan masalah dan meningkatkan taraf hidup masyarakat dibidang Sistem Informasi.',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
        DB::table('misi')->insert([
            'id' => (string) Str::uuid(), // Tambahkan UUID secara manual
            'misi' => 'Menjalin kerjasama yang produktif dan berkelanjutan dengan lembaga pendidikan, pemerintahan dan dunai usaha ditingkat Nasional dan Internasional dibidang Sistem Informasi.',
            'created_at' => now(), // Tambahkan timestamps
            'updated_at' => now(), // Tambahkan timestamps
        ]);
    }
}
