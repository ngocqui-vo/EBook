<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
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

    public function categories() {
        $categories = Category::all();
        return view('categories', ['categories'=> $categories]);
    }

    public function categoryDetail($id) {
        $category = Category::find($id);
        if ($category) {
            return view('category-detail', ['category'=> $category]);
        }
        return 'not found';
    }

    public function authors() {
        $authors = Author::all();
        return view('authors', ['authors'=> $authors]);
    }

    public function authorDetail($id) {
        $author = Author::find($id);
        if ($author) {
            return view('author-detail', ['author'=> $author]);
        }
        return 'not found';
    }
}
