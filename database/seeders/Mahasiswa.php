<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mahasiswa extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
           [
                'name' => 'Ahmad Ali',
                'email' => 'ahmadali@gmail.com',
                'prodi' => 'D4 Teknik Elektronika', 
                'nrp' => '20210001',
                'tahun_masuk' => 2021,
                'password' => bcrypt('password1'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Abdul Rachman',
                'email' => 'AbdulRachman@gmail.com',
                'prodi' => 'D3 Teknik Telekomunikasi', 
                'nrp' => '20210002',
                'tahun_masuk' => 2020,
                'password' => bcrypt('password2'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agus Makmur',
                'email' => 'AgusMakmur@gmail.com',
                'prodi' => 'D3 Teknik Elektro Industri', 
                'nrp' => '20210003',
                'tahun_masuk' => 2022,
                'password' => bcrypt('password3'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alex Ivan Tanoyo',
                'email' => 'AlexIvan@gmail.com',
                'prodi' => 'D4 Teknik Elektronika',  
                'nrp' => '20210004',
                'tahun_masuk' => 2020,
                'password' => bcrypt('password4'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alvin Gozali',
                'email' => 'AlvinGozali@gmail.com',
                'prodi' => 'D3 Teknik Elektro Industri',  
                'nrp' => '20210005',
                'tahun_masuk' => 2023,
                'password' => bcrypt('password5'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Bambang Sugianto',
                'email' => 'Bambang@gmail.com',
                'prodi' => 'D4 Teknik Elektro Industri',  
                'nrp' => '20210006',
                'tahun_masuk' => 2024,
                'password' => bcrypt('password6'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'David Kristian',
                'email' => 'David@gmail.com',
                'prodi' => 'D4 Teknologi Rekayasa Internet',  
                'nrp' => '20210007',
                'tahun_masuk' => 2025,
                'password' => bcrypt('password7'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Eddy Pramono',
                'email' => 'Eddy@gmail.com',
                'prodi' => 'D4 Teknik Telekomunikasi', 
                'nrp' => '20210008',
                'tahun_masuk' => 2023,
                'password' => bcrypt('password8'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fahmi Idris',
                'email' => 'Fahmi@gmail.com',
                'prodi' => 'D4 Teknik Telekomunikasi', 
                'nrp' => '20210009',
                'tahun_masuk' => 2020,
                'password' => bcrypt('password9'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Fransisous Iwo',
                'email' => 'Fransisous@gmail.com',
                'prodi' => 'D4 Teknik Elektro Industri',  
                'nrp' => '20210010',
                'tahun_masuk' => 2025,
                'password' => bcrypt('password10'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Selamet Dunia Akhirat',
                'email' => 'Selamet@gmail.com',
                'prodi' => 'D4 Teknologi Rekayasa Internet',  
                'nrp' => '20210011',
                'tahun_masuk' => 2022,
                'password' => bcrypt('password11'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Darminto Hartono',
                'email' => 'Darminto@gmail.com',
                'prodi' => 'D4 Teknik Telekomunikasi',  
                'nrp' => '20210012',
                'tahun_masuk' => 2023,
                'password' => bcrypt('password12'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ibrahim',
                'email' => 'Ibrahim@gmail.com',
                'prodi' => 'D4 Teknik Elektronika',  
                'nrp' => '20210013',
                'tahun_masuk' => 2022,
                'password' => bcrypt('password13'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mira Setiawan',
                'email' => 'Mira@gmail.com',
                'prodi' => 'D3 Teknik Telekomunikasi',  
                'nrp' => '20210014',
                'tahun_masuk' => 2024,
                'password' => bcrypt('password14'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Novita Sari',
                'email' => 'Novita5@gmail.com',
                'prodi' => 'D4 Teknologi Rekayasa Internet',  
                'nrp' => '20210015',
                'tahun_masuk' => 2025,
                'password' => bcrypt('password15'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
