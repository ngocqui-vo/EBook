<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Seed extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = new UserSeeder();
        $author = new AuthorSeeder();
        $category = new CategorySeeder();
        $book = new BookSeeder();
        $bookpart = new BookPartSeeder();
        $cart = new CartSeeder();
        $cartItem = new CartItemSeeder();
        $delivery = new DeliverySeeder();


        $user->run();
        $author->run();
        $category->run();
        $book->run();
        $bookpart->run();

        $cart->run();
        $cartItem->run();
        $delivery->run();
    }
}
