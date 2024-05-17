<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cart_items')->insert([
            [
                'cart_id' => 1,
                'book_part_id' => 1,
                'quantity' => 2,
                'created_at' => now()
            ],
            [
                'cart_id' => 1,
                'book_part_id' => 2,
                'quantity' => 3,
                'created_at' => now()
            ],
            [
                'cart_id' => 2,
                'book_part_id' => 5,
                'quantity' => 5,
                'created_at' => now()
            ],
            [
                'cart_id' => 3,
                'book_part_id' => 9,
                'quantity' => 1,
                'created_at' => now()
            ],
        ]);
    }
}
