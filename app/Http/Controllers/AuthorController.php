<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function index() {
        $authors = Author::all();
        return view("admin.author-list", ['authors'=>$authors]);
    }

    public function create() {
        return view('admin.author-create');
    }

    public function store(Request $request) {
        Author::create($request->all());
        return redirect()->route('admin.authors.index');
    }
}
