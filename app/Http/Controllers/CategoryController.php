<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('admin.home', ['categories'=> $categories]);
    }

    public function create() {
        return view('admin.create');
    }
    public function add(Request $request) {
        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }
}
