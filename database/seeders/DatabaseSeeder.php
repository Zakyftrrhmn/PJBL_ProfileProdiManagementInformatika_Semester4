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
            VisiMisiSeeder::class,
            KurikulumSeeder::class,
            ProfileKelulusanSeeder::class,
            HubungiKamiSeeder::class,
            KategoriSeeder::class,
            RolePermissionSeeder::class,
            UserSeeder::class
        ]);
    }
}
