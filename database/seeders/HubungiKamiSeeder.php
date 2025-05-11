<?php

namespace Database\Seeders;

use App\Models\HubungiKami;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubungiKamiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HubungiKami::create([
            'nama' => 'Zaky',
            'email' => 'zakifathurrahman0@gmail.com',
            'subjek' => 'Lorem ipsum dolor sit amet.',
            'pesan' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aut quo hic in totam laudantium nisi reiciendis voluptas quos enim magni.',
        ]);
    }
}
