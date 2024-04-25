<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookPart;
use Illuminate\Http\Request;

class BookPartController extends Controller
{
    public function create($id) {
        $book = Book::findOrFail($id);
        return view('admin.bookpart-create', ['book' => $book]);
    }

    public function store(Request $request) {
        BookPart::create($request->all());
        return redirect()->route('admin.books.edit', ['id' => $request->book_id]);
    }
}
