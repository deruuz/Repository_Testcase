<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Login', 'description' => 'Test kasus seputar proses login.'],
            ['name' => 'Register', 'description' => 'Test kasus untuk registrasi user.'],
            ['name' => 'Profile Update', 'description' => 'Test update data profil pengguna.'],
            ['name' => 'Reset Password', 'description' => 'Test lupa/reset password.'],
            ['name' => 'Dashboard Access', 'description' => 'Cek akses dashboard.'],
        ];

        DB::table('category')->insert($categories);
    }
}
