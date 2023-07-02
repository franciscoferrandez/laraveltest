<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index (Request $request) {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('categories.index', compact('categories'));
    }

    public function save (Request $request) {
        $category = new Category();
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('info', 'Category saved!');
    }

    public function update (Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->name = $request->input('name');
        $category->save();

        return redirect()->route('categories.index')->with('info', 'Category updated!');
    }

    public function edit (Request $request, $id) {
        $category = Category::findOrFail($id);
        return View('categories.edit', compact('category'));
    }

    public function delete (Request $request, $id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->back()->with('info', 'Category deleted!');
    }
}
