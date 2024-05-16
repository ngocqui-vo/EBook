<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'nguyen van a',
            'email' => 'nguyenvana@gmail.com',
            'password' => Hash::make('123')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'tran truong an',
            'email' => 'trantruongan@gmail.com',
            'password' => Hash::make('123')
        ]);
    }
}
