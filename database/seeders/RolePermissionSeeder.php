<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan cache permission
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar permission
        $permissions = [
            'dashboard',
            'kurikulum',
            'dosen',
            'kalender-akademik',
            'akreditasi',
            'laporan_kepuasan',
            'gallery',
            'prestasi_mahasiswa',
            'profile-kelulusan',
            'karya_mahasiswa',
            'publish',
            'manajemen_konten',
            'management-access',

        ];

        // Buat permission jika belum ada
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // === ROLES ===

        // Super Admin: Semua akses
        $superAdmin = Role::firstOrCreate(['name' => 'Superadmin']);
        $superAdmin->syncPermissions(Permission::all());

        // Kaprodi: Akses terbatas ke pengguna dan peran
        $kaprodi = Role::firstOrCreate(['name' => 'Kaprodi']);
        $kaprodi->syncPermissions(Permission::all());

        // Dosen: Akses terbatas hanya view users
        $dosen = Role::firstOrCreate(['name' => 'Dosen']);
        $dosen->syncPermissions(Permission::all());
    }
}
