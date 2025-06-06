<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Functional', 'description' => 'Fungsi dasar aplikasi.'],
            ['name' => 'UI', 'description' => 'Tampilan antarmuka pengguna.'],
            ['name' => 'Security', 'description' => 'Keamanan aplikasi.'],
            ['name' => 'Performance', 'description' => 'Kinerja dan kecepatan sistem.'],
            ['name' => 'Usability', 'description' => 'Kemudahan penggunaan aplikasi.'],
        ];

        DB::table('type')->insert($types);
    }
}
