<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view("admin.book-list", ['books' => $books]);
    }

    public function create()
    {
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.book-create', ['authors' => $authors, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $book = new Book();
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->published_date = $request->input('published_date');
        $book->category_id = $request->input('category');
        $book->author_id = $request->input('author');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        $book->save();

        return redirect()->route('admin.books.index');
    }

    
}
