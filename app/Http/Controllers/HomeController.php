<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
       
        return view('home');
    }
    public function search(Request $request) {
        // truy van sql
        $keyword = $request->input('keyword');
        $books = Book::where('title', 'like', "%$keyword%")->get();
        // $books = Book::all();
        return view('search', ['books' => $books]);
    }
}
