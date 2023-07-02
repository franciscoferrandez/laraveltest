<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index (Request $request) {
        $books = Book::with('category')->orderBy('created_at', 'desc')->get();
        return view('books.index', compact('books'));
    }

    public function save (Request $request) {
        $book = new Book();
        $book->isbn = $request->input('isbn');
        $book->title = $request->input('title');
        $book->category_id = $request->input('category_id') ?: null;
        $book->save();

        return redirect()->route('books.index')->with('info', 'Book saved!');
    }

    public function update (Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->isbn = $request->input('isbn');
        $book->title = $request->input('title');
        $book->category_id = $request->input('category_id') ?: null;
        $book->save();

        return redirect()->route('books.index')->with('info', 'Book updated!');
    }

    public function create (Request $request) {
        return View('books.create', $this->getRelations());
    }

    public function edit (Request $request, $id) {
        $book = Book::findOrFail($id);
        return View('books.edit', array_merge($this->getRelations(), compact('book')));
    }

    public function delete (Request $request, $id) {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->back()->with('info', 'Book deleted!');
    }


    //************* utility functions

    private function getRelations() {
        $categories = Category::all();
        return compact('categories');
    }
}
