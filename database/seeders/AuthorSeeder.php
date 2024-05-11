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
            'name' => 'Lưu Từ Hân',
            'bio' => 'Lưu Từ Hân'
        ]);
        DB::table('authors')->insert([
            'name' => 'Áo Nhĩ Lương Khảo Tầm Ngư Bảo',
            'bio' => 'Áo Nhĩ Lương Khảo Tầm Ngư Bảo'
        ]);
        DB::table('authors')->insert([
            'name' => 'Jeffrey Archer',
            'bio' => 'Jeffrey Archer'
        ]);
        DB::table('authors')->insert([
            'name' => 'Paulo Coelho',
            'bio' => 'Paulo Coelho'
        ]);
        DB::table('authors')->insert([
            'name' => 'Fujiko F. Fujio',
            'bio' => 'Fujiko F. Fujio'
        ]);
        DB::table('authors')->insert([
            'name' => 'Akira Toriyama',
            'bio' => 'Akira Toriyama'
        ]);
    }
}
