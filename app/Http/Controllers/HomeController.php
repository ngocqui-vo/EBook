<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Models\Review;
class HomeController extends Controller
{
    public function index() {
       $bookModel= new Book();
       $books = $bookModel->getAllBooks();
        return view('home', compact('books'));
    }
    public function search(Request $request) {
        // truy van sql
        $keyword = $request->input('keyword');
        $books = Book::where('title', 'like', "%$keyword%")->get();
        // $books = Book::all();
        return view('search', ['books' => $books]);
    }
    public function details($id) {
        $bookModel = new Book();
        $book = $bookModel->getBookById($id);
        $reviews = $book->reviews;
        $rating = 0;
        foreach($reviews as $review) {
            $rating = $rating + $review->rating;
        }
        if ($reviews->count())
            $rating = $rating / $reviews->count();
        else 
            $rating = 0;
        return view('details', ['book' => $book, 'rating' => $rating]);
    }
    // public function review(Request $request)
    // {
    //     $reviewModel = new Review();
    //     $productId = $request->product_id;
    //     $rating = $request->rating;
    //     $content = $request->content;
    //     $user = $reviewModel->getUserName(session('user_name'),$productId);
    //     if ($user) {
    //         return response()->json(['auth' => false]);
    //     }
    //      else
    //       {
    //         if (session('user_id') != null) {
    //             $reviewModel->store($rating, $content, $productId);
    //         } else {
    //             return view('auth.login');
    //         }
    //         return response()->json(['success' => true]);
    //     }
    // }
    public function review(Request $request)
    {
        Review::create($request->all());
        return back();
    }
}
