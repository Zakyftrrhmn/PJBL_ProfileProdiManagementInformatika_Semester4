<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('misi')->insert([
            'misi' => 'Menyelenggarakan pendidikan vokasional dibidang Sistem Informasi yang sesuai dengan perkembangan ilmu pengetahuan dan teknologi yang berwawasan Internasional.'
        ]);
        DB::table('misi')->insert([
            'misi' => 'Menyelanggarakan penelitian yang inovatif dan adaptif dibidang Sistem Informasi untuk pengembangan ilmu pengetahuan dan teknologi.'
        ]);
        DB::table('misi')->insert([
            'misi' => 'Menerapkan ilmu pengetahuan dan teknologi dalam rangka memecahkan masalah dan meningkatkan taraf hidup masyarakat dibidang Sistem Informasi.'
        ]);
        DB::table('misi')->insert([
            'misi' => 'Menjalin kerjasama yang produktif dan berkelanjutan dengan lembaga pendidikan, pemerintahan dan dunai usaha ditingkat Nasional dan Internasional dibidang Sistem Informasi.'
        ]);
    }
}
