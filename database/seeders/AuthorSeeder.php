<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert([
            [
                'id' => 1,
                'name' => 'Lưu Từ Hân',
                'bio' => 'Lưu Từ Hân'
            ],
            [
                'id' => 2,
                'name' => 'Áo Nhĩ Lương Khảo Tầm Ngư Bảo',
                'bio' => 'Áo Nhĩ Lương Khảo Tầm Ngư Bảo'
            ],
            [
                'id' => 3,
                'name' => 'Jeffrey Archer',
                'bio' => 'Jeffrey Archer'
            ],
            [
                'id' => 4,
                'name' => 'Paulo Coelho',
                'bio' => 'Paulo Coelho'
            ],
            [
                'id' => 5,
                'name' => 'Fujiko F. Fujio',
                'bio' => 'Fujiko F. Fujio'
            ],
            [
                'id' => 6,
                'name' => 'Akira Toriyama',
                'bio' => 'Akira Toriyama'
            ]
        ]);
    }
}
