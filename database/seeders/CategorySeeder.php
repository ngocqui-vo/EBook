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
            'name' => 'Huyền huyễn',
            'description' => 'Huyền ảo, phi thực tế'
        ]);
        DB::table('categories')->insert([
            'name' => 'Kinh tế',
            'description' => 'Thông tin, kiến thức về kinh tế'
        ]);
    }
}
Schema::create('categories', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->string('description');
    $table->timestamps();
});