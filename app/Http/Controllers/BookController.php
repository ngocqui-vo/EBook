<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\UserFollowBook;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(2);
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
            $imagePath = $request->file('image')->store('assets/storage', 'public');
            $book->image = $imagePath;
        }

        $book->save();

        return redirect()->route('admin.books.index');
    }

    public function edit($id) {
        $book = Book::find($id);
        $authors = Author::all();
        $categories = Category::all();
        return view('admin.book-edit', ['book'=> $book,'authors' => $authors, 'categories' => $categories]);
    }

    public function update(Request $request) {
        $book = Book::find($request->id);
        $book->title = $request->input('title');
        $book->price = $request->input('price');
        $book->description = $request->input('description');
        $book->published_date = $request->input('published_date');
        if ( $request->input('category')) {
            $book->category_id = $request->input('category');
        }
        else {
            $book->category_id = null;
        }

        if ($request->input('author')) {
            $book->author_id = $request->input('author');
        }
        else {
            $book->author_id = null;
        }

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        $book->save();
        return redirect()->route('admin.books.index');
    }

    public function delete($id) {
        $book = Book::find($id);
        $book->delete();
        return redirect()->route('admin.books.index');
    }

    public function followBook($id) {
        $user = auth()->user();
        $userFollowBook = UserFollowBook::where('user_id', $user->id)->first();

        if (!$userFollowBook) {
            $userFollowBook = UserFollowBook::create([
                'user_id' => $user->id,
                'book_id' => $id
            ]);
            $userFollowBook->save();
        }
        else {
            $userFollowBook->delete();
        }
        
        return back();
    }
}
