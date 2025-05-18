<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superadmin = User::create([
            'name'  => 'Zaky Fathur Rahman',
            'email' => 'superadmin@mail.com',
            'password' => Hash::make('superadmin'),
            'email_verified_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $superadmin->assignRole('Superadmin');

        $kaprodi = User::create([
            'name'  => 'Kumala Sari Tri Wahyuni',
            'email' => 'kaprodi@mail.com',
            'password' => Hash::make('kaprodi'),
            'email_verified_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $kaprodi->assignRole('Kaprodi');

        $dosen = User::create([
            'name'  => 'Risa Salsabilla',
            'email' => 'dosen@mail.com',
            'password' => Hash::make('dosen'),
            'email_verified_at' => null,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $dosen->assignRole('Dosen');
    }
}
