<?php

namespace Database\Seeders;

use App\Models\VisiMisi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisiMisi::create([
            'visi' => 'Menjadi Program Studi unggul di bidang Manajemen Informatika yang adaptif terhadap perkembangan teknologi informasi, berdaya saing, dan berkontribusi pada pembangunan daerah Pelalawan dan nasional.',
            'misi' => 'Menyelenggarakan pendidikan vokasional dibidang Teknik Komputer Jaringan yang sesuai dengan perkembangan ilmu pengetahuan dan teknologi yang berwawasan internasional.'
        ]);
    }
}
