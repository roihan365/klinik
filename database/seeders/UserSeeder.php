<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // cari berdasarkan email
            [
                'name' => 'admin-klinik',
                'password' => bcrypt('password'), // password default
            ]
        );
        $admin->assignRole('admin-klinik');

        $dokter = User::updateOrCreate(
            ['email' => 'dokter@gmail.com'],
            [
                'name' => 'dr. Klinik',
                'password' => bcrypt('password'),
            ]
        );
        $dokter->assignRole('dokter');

        $pasien = User::updateOrCreate(
            ['email' => 'pasien@gmail.com'],
            [
                'name' => 'pasien 1',
                'password' => bcrypt('password'),
            ]
        );
        $pasien->assignRole('pasien');
    }
}
