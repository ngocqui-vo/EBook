<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('deliveries')->insert([
            [
                'cart_id' => 1,
                'name' => 'Nguyễn văn a',
                'address' => ' 111 võ văn ngân',
                'phone' => '012345669'
            ],
            [
                'cart_id' => 2,
                'name' => 'Trần thị b',
                'address' => ' 123 Phan huy ích',
                'phone' => '012345669'
            ],
            [
                'cart_id' => 3,
                'name' => 'Lê văn c',
                'address' => ' 432 Quang trung',
                'phone' => '012345669'
            ],
        ]);
    }
}
