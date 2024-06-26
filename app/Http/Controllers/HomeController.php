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
        $books = Book::take(4)->get();
        return view('home', compact('books'));
    }
    public function search(Request $request)
    {
        // truy van sql
        $keyword = $request->input('keyword');
        $books = Book::where('title', 'like', "%$keyword%")->paginate(4);

        if ($books->count() > 0) {
            return view('search', ['books' => $books]);
        } else {
            echo "<script>alert('Không có sách nào có tên này!!');</script>";
            return redirect()->route('home.index');
        }    
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
            } else {
                $rating = 0;
            }

            $book->view_count++;
            $book->save();

            $user = auth()->user();
            if ($user) {
                $userFollowBook = UserFollowBook::where([
                    'user_id' => $user->id,
                    'book_id' => $book->id
                ])->first();
            }


            return view('book-detail', [
                'book' => $book,
                'rating' => $rating,
                'userFollowBook' => isset($userFollowBook) ? $userFollowBook : null
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
        echo "<script>alert('Không có danh mục này!!');</script>";
        return redirect()->route('home.index');
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
        echo "<script>alert('Không có tác giả này!!');</script>";
        return redirect()->route('home.index');
    }



    public function review(Request $request)
    {
        Review::create($request->all());
        return back();
    }
}
