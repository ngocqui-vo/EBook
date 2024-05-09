<?php

namespace App\Http\Controllers;

use App\Models\BookPart;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Delivery;
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
                    'part_id' => $part_id,
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

    public function cartDetail()
    {
        $cart = session()->get('cart');
        return view('cart', ['cart' => $cart ? $cart : []]);

    }

    public function removeCartItem(Request $request)
    {
        $part_id = $request->input('book_part_id');
        $cart = session()->get('cart', []);

        if (isset($cart[$part_id])) {
            unset($cart[$part_id]); // Xóa sản phẩm khỏi giỏ hàng
            session()->put('cart', $cart);

            $total_quantity = 0;
            $total_price = 0;

            $cart = session()->get('cart');
            foreach ($cart as $item) {
                $total_quantity += $item['quantity'];
                $total_price += $item['price'];
            }


            return response()->json([
                'success' => 'Đã xóa sản phẩm khỏi giỏ hàng',
                'total_quantity' => $total_quantity,
                'total_price' => $total_price
            ], 200);
        }

        return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
    }

    public function orderConfirm()
    {
        $total_price = 0;

        $cart = session()->get('cart');

        if (!$cart) {
            return 'giỏ hàng chưa có sản phẩm';
        }

        foreach ($cart as $item) {
            $total_price += $item['price'];
        }
        return view('buy', ['total_price' => $total_price]);
    }

    public function payment(Request $request) {
        $cartSession = session()->get('cart');
        $currentUser = auth()->user();
        $cart = Cart::create(['user_id' => $currentUser->id]);
        $cart->save();

        Delivery::create([
            'cart_id' => $cart->id,
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address')

        ])->save();
        foreach($cartSession as $item) {
            $cartItem = CartItem::create([
                    'cart_id' => $cart->id,
                    'book_part_id' => $item['part_id'],
                    'quantity' => $item['quantity']
                ]);
            $cartItem->save();
        }
        session()->forget('cart');
        return view('buy-success');

    }

    public function orderDetail($id) {
        $cart = Cart::find($id);
        $delivery = $cart->deliveries->first();
        return view('order-detail', ['cart' => $cart, 'delivery' => $delivery]);
    }
}
