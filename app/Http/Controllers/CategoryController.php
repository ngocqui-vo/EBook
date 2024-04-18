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
        return view('admin.category-create');
    }

    public function add(Request $request) {
        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('category-edit', ['category'=> $category]);
    }

    public function update(Request $request) {
        $category = Category::find($request->id);
        $category->update(['name' => $request->name]);
        $category->save();
        return redirect()->route('admin.categories.index');
    }
}
