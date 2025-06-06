<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SynonymSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            // Sinonim dan typo dalam bahasa Inggris dan Indonesia
            $synonyms = [
                // Login-related terms
                ['original_word' => 'login', 'synonyms' => ['log in', 'log-in', 'loginn', 'logn', 'masuk', 'msk', 'login-in', 'mlogin']],
                ['original_word' => 'logout', 'synonyms' => ['log out', 'log-out', 'logoutt', 'logut', 'keluar', 'kluar']],
                ['original_word' => 'register', 'synonyms' => ['register', 'registrasi', 'mendaftar', 'mendaftarkan', 'daftar', 'sign up', 'signup']],
                ['original_word' => 'sign up', 'synonyms' => ['sign up', 'signup', 'sign-in', 'signin', 'registrasi', 'mendaftar', 'daftar']],

                // Test-case related terms
                ['original_word' => 'test case', 'synonyms' => ['testcase', 'test-case', 'tc', 'tes case', 'tes-case']],
                ['original_word' => 'steps', 'synonyms' => ['step', 'langkah', 'tahapan', 'langkahn', 'stpes']],
                ['original_word' => 'expected result', 'synonyms' => ['expected result', 'expected-result', 'hasil yang diharapkan', 'hasil', 'resul', 'reults']],
                
                // General common synonyms with typos
                ['original_word' => 'case', 'synonyms' => ['case', 'kasus', 'cs', 'cases', 'kase']],
                ['original_word' => 'priority', 'synonyms' => ['priority', 'prioritas', 'priorites', 'prority']],
                ['original_word' => 'type', 'synonyms' => ['type', 'tipe', 'tipes', 'tip', 'typo']],
                ['original_word' => 'category', 'synonyms' => ['category', 'kategori', 'catagory', 'categori', 'kategori']],

                // Other common terms
                ['original_word' => 'update', 'synonyms' => ['update', 'updating', 'updateed', 'updte', 'perbarui']],
                ['original_word' => 'login page', 'synonyms' => ['login page', 'page login', 'halaman login', 'login-pg']],
                ['original_word' => 'forgot password', 'synonyms' => ['forgot password', 'forgot-pass', 'lupa password', 'forgotpw', 'forgotpass']],

                // Miscellaneous
                ['original_word' => 'home', 'synonyms' => ['home', 'homes', 'halaman utama', 'homepage']],
                ['original_word' => 'dashboard', 'synonyms' => ['dashboard', 'dasboard', 'dshboard', 'dasboard', 'panel']],
            ];

            foreach ($synonyms as $synonym) {
                DB::table('synonyms')->insert([
                    'original_word' => $synonym['original_word'],
                    'synonyms' => json_encode($synonym['synonyms']),
                ]);
            }
        
    }
}
