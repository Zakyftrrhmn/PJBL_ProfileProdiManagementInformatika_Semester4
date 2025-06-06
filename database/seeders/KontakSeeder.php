<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KontakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kontak')->insert([
            'link_fb'       => 'https://www.facebook.com/pnp.pelalawan/',
            'link_twitter'  => 'https://twitter.com/',
            'link_instagram' => 'https://www.instagram.com/pnp.pelalawan/?hl=en',
            'link_wa'       => 'https://wa.me/6285264961167',
            'link_website'  => 'https://www.pnp.ac.id/download/psdku-pelalawan/',
            'no_telp'       => '085264961167',
            'gmail'         => 'mi.psdku@gmail.com',
            'location'      => 'Jl. Maharaja Indra, Pelalawan, Riau, Indonesia',
        ]);
    }
}
