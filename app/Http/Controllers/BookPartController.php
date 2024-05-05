<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookPart;
use App\Models\UserFollowBook;
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

    public function edit($id) {
        $bookpart = BookPart::findOrFail($id);
        return view('admin.bookpart-edit', ['bookpart'=> $bookpart]);
    }

    public function update(Request $request) {
        $bookpart = BookPart::findOrFail($request->id);
        $bookpart->part_number = $request->part_number;
        $bookpart->part_title = $request->part_title;
        $bookpart->save();
        return redirect()->route('admin.books.edit', ['id'=> $bookpart->book_id]);
    }

    public function delete($id) {
        $bookpart = BookPart::findOrFail($id);
        $book_id = $bookpart->book_id;
        $bookpart->delete();
        return redirect()->route('admin.books.edit', ['id'=> $book_id]);
    }

    
}
