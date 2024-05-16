<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carts')->insert([
            [
                'id' => 1,
                'user_id' => '1',
            ],
            [
                'id' => 2,
                'user_id' => '1',
            ],
            [
                'id' => 3,
                'user_id' => '2',
            ]
        ]);
    }
}
