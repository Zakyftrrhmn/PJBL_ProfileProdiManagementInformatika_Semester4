<?php

namespace Database\Seeders;

use App\Models\ProfileKelulusan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfileKelulusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProfileKelulusan::create([
            'nama_profile' => 'Kemampuan Pengelolaan Sistem Informasi',
            'deskripsi' => 'Lulusan mampu merancang, mengembangkan, dan mengelola sistem informasi untuk mendukung pengambilan keputusan di organisasi, termasuk analisis kebutuhan dan perancangan sistem berbasis TI.'
        ]);

        ProfileKelulusan::create([
            'nama_profile' => 'Manajemen Proyek TI',
            'deskripsi' => 'Lulusan memiliki keterampilan dalam merencanakan dan mengelola proyek TI, termasuk pengorganisasian tim, anggaran, dan waktu, untuk memastikan keberhasilan implementasi teknologi di organisasi.'
        ]);
    }
}
