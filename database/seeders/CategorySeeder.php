<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Huyền huyễn',
                'description' => 'Huyền ảo, phi thực tế'
            ],
            [
                'id' => 2,
                'name' => 'Kinh tế',
                'description' => 'Thông tin, kiến thức về kinh tế'
            ],
            [
                'id' => 3,
                'name' => 'Truyện tranh',
                'description' => 'Truyện tranh...'
            ],
            [
                'id' => 4,
                'name' => 'Khoa học',
                'description' => 'Kiến thức về khoa học, đời sống.'
            ],
            [
                'id' => 5,
                'name' => 'Tiểu thuyết',
                'description' => 'Tiểu thuyết...'
            ]
        ]);
    }
}
