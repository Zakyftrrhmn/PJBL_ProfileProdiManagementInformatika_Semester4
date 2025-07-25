<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str; // Tambahkan ini

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Superadmin
        $superadmin = User::firstOrCreate(
            ['email' => 'superadmin@mail.com'], // Kriteria pencarian: cari user dengan email ini
            [ // Atribut untuk dibuat jika tidak ditemukan
                'id'                => (string) Str::uuid(), // <-- TAMBAHKAN UUID DI SINI
                'name'              => 'Zaky Fathur Rahman',
                'password'          => Hash::make('superadmin'),
                'email_verified_at' => now(), // Sebaiknya langsung verified untuk admin
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        );
        $superadmin->assignRole('Superadmin');

        // Kaprodi
        $kaprodi = User::firstOrCreate(
            ['email' => 'kaprodi@mail.com'],
            [
                'id'                => (string) Str::uuid(), // <-- TAMBAHKAN UUID DI SINI
                'name'              => 'Kumala Sari Tri Wahyuni',
                'password'          => Hash::make('kaprodi'),
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        );
        $kaprodi->assignRole('Kaprodi');

        // Dosen
        $dosen = User::firstOrCreate(
            ['email' => 'dosen@mail.com'],
            [
                'id'                => (string) Str::uuid(), // <-- TAMBAHKAN UUID DI SINI
                'name'              => 'Risa Salsabilla',
                'password'          => Hash::make('dosen'),
                'email_verified_at' => now(),
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        );
        $dosen->assignRole('Dosen');
    }
}
