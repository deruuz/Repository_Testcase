<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan UserSeeder
        $this->call([
            SynonymSeeder::class,
            UserSeeder::class, 
            CategoriesSeeder::class,
            TypeSeeder::class,
            TagSeeder::class,
            TestCaseSeeder::class,
        ]);
    }
}