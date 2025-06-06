<?php

namespace Database\Seeders;

use App\Models\PageView;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageViewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $today = Carbon::now();

        // // Loop 30 hari ke belakang
        // for ($i = 0; $i < 30; $i++) {
        //     $date = $today->copy()->subDays($i);

        //     // Simulasikan jumlah kunjungan antara 5 - 50 per hari
        //     $jumlahKunjungan = rand(5, 50);

        //     for ($j = 0; $j < $jumlahKunjungan; $j++) {
        //         DB::table('page_views')->insert([
        //             'page_slug' => 'homepage',
        //             'viewed_at' => $date->copy()->setTime(rand(0, 23), rand(0, 59), rand(0, 59)),
        //         ]);
        //     }
        // }
    }
}
