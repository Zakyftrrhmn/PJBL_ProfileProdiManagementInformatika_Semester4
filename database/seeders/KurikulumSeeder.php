<?php

namespace Database\Seeders;

use App\Models\Kurikulum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KurikulumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kurikulum::create(
            [
                'tahun_kurikulum' => '2023',
                'nama_kurikulum' => 'Kurikulum 2023',
                'file_kurikulum' => 'awd.pdf'
            ]
        );
    }
}
