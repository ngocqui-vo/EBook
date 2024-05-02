<?php

namespace App\Http\Controllers;

use App\Models\BookPart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $part_id = $request->input('book_part_id');
        $part = BookPart::find($part_id);

        if ($part) {
            $cart = session()->get('cart');
            if (isset($cart[$part_id])) {
                // Nếu sản phẩm đã có trong giỏ hàng, tăng số lượng
                $cart[$part_id]['quantity']++;
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, thêm mới vào giỏ hàng
                $cart[$part_id] = [
                    'book_title' => $part->book->title,
                    'book_image' => $part->book->image,
                    'price' => $part->book->price,
                    'part_number' => $part->part_number,
                    'part_title' => $part->part_title,
                    'quantity' => 1 // Số lượng mặc định khi thêm vào giỏ hàng
                ];
            }
            session()->put('cart', $cart);
            return $cart;
        }
        return 'fail to add item to cart';
    }

    public function cartDetail() {
        $cart = session()->get('cart');
        return view('cart', ['cart' => $cart ? $cart : []]);
        // return $cart;
    }

}
