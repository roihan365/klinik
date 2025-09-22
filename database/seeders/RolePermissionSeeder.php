<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // daftar permissions
        $permissions = [
            'tambah-user', 'edit-user', 'hapus-user', 'lihat-user',
            'pilih-klinik', 'pilih-dokter', 'input-datadiri', 'booking',
            'lihat-jadwal', 'lihat-pasien', 'input-diagnosa', 'lihat-rekammedis',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // roles
        $roleAdmin  = Role::firstOrCreate(['name' => 'admin-klinik']);
        $rolePasien = Role::firstOrCreate(['name' => 'pasien']);
        $roleDokter = Role::firstOrCreate(['name' => 'dokter']);

        // assign permission ke role
        $roleAdmin->givePermissionTo(['tambah-user', 'edit-user', 'hapus-user', 'lihat-user']);
        $rolePasien->givePermissionTo(['pilih-klinik', 'pilih-dokter', 'input-datadiri', 'booking']);
        $roleDokter->givePermissionTo(['lihat-jadwal', 'lihat-pasien', 'input-diagnosa', 'lihat-rekammedis']);
    }
}
