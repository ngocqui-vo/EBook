<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\UserFollowBook;
use Illuminate\Http\Request;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $bookModel = new Book();
        $books = $bookModel->getAllBooks();
        return view('home', compact('books'));
    }
    public function search(Request $request)
    {
        // truy van sql
        $keyword = $request->input('keyword');
        $books = Book::where('title', 'like', "%$keyword%")->get();
        // $books = Book::all();
        return view('search', ['books' => $books]);
    }

    public function bookDetail($id)
    {
        $book = Book::find($id);
        if ($book) {
            $reviews = $book->reviews;
            $rating = 0;
            foreach ($reviews as $review) {
                $rating = $rating + $review->rating;
            }

            if ($reviews->count()) {
                $rating = $rating / $reviews->count();
            }
            else {
                $rating = 0;
            }
            
            $book->view_count++;
            $book->save();

            $user = auth()->user();
            $userFollowBook = UserFollowBook::where([
                'user_id' => $user->id,
                'book_id' => $book->id
            ])->first();

            return view('book-detail', [
                'book' => $book, 
                'rating' => $rating,
                'userFollowBook' => $userFollowBook
            ]);
        }
        return 'not found';
    }



    public function categories()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }

    public function categoryDetail($id)
    {
        $category = Category::find($id);
        if ($category) {
            return view('category-detail', ['category' => $category]);
        }
        return 'not found';
    }

    public function authors()
    {
        $authors = Author::all();
        return view('authors', ['authors' => $authors]);
    }

    public function authorDetail($id)
    {
        $author = Author::find($id);
        if ($author) {
            return view('author-detail', ['author' => $author]);
        }
        return 'not found';
    }



    public function review(Request $request)
    {
        Review::create($request->all());
        return back();
    }
}
