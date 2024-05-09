<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
        // $carts = Cart::whereMonth('created_at', 5)->get();

        // $totalprice = 0;
        // foreach ($carts as $cart) {
        //     $totalprice += $cart->totalPrice();
        // }
        // $results = DB::table('cart_items')
        //     ->join('book_parts', 'cart_items.book_part_id', '=', 'book_parts.id')
        //     ->join('books', 'book_parts.book_id', '=', 'books.id')
        //     ->select('book_parts.part_title as partname', DB::raw('COUNT(book_parts.part_title) as count'))
        //     ->groupBy('book_parts.part_title')
        //     ->get();
        $selectedMonth = $request->input('date');

        // nếu người dùng ko chọn tháng, năm thì mặc định sẽ lấy tháng,năm hiện tại
        if ($selectedMonth) {  
            // $date = Carbon::createFromFormat('Y-m', $selectedMonth . '-01');
            $month = explode('-', $selectedMonth)[1];
            $year = explode('-', $selectedMonth)[0];
        }
        else {
            $date = Carbon::now();
            $month = $date->format('m');
            $year = $date->format('Y');
        }
        
        $cartItems = CartItem::whereMonth('created_at', $month)->
                            whereYear('created_at', $year)->get();
        
        $arr = [];
        foreach ($cartItems as $item) {
            if (isset($arr[$item->book_part_id])) {
                
                $arr[$item->book_part_id]->quantity += $item->quantity;
            }
            else {
                $arr[$item->book_part_id] = $item;
                
            }
        }
       
        
        return view('admin.statistics', ['arr' => $arr, 'month' => $month, 'year' => $year]);
    }
}
