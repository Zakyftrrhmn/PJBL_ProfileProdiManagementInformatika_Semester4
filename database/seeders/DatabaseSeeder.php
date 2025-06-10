<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            DeskripsiSeeder::class,
            ProfileKelulusanSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class,
            KategoriSeeder::class,
            KategoriKaryaSeeder::class,
            FrontsideSeeder::class,
            VisiSeeder::class,
            MisiSeeder::class,
            KontakSeeder::class,
            KalenderAkademikSeeder::class,
            AkreditasiSeeder::class
        ]);
    }
}
