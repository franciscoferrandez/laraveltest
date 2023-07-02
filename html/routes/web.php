<?php

use App\Http\Controllers\AuthController;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::get('/books',[App\Http\Controllers\BookController::class, 'index'])->name('books.index');
    Route::get('books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');
    Route::post('book', [App\Http\Controllers\BookController::class, 'save'])->name('books.save');
    Route::delete('book/{id}', [App\Http\Controllers\BookController::class, 'delete'])->name('books.delete');
    Route::get('book/{id}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');
    Route::put('book/{id}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');

    Route::get('/categories',[App\Http\Controllers\CategoryController::class, 'index'])->name('categories.index');
    Route::get('categories/create', function () {return view('categories.create');})->name('categories.create');
    Route::post('category', [App\Http\Controllers\CategoryController::class, 'save'])->name('categories.save');
    Route::delete('category/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('categories.delete');
    Route::get('category/{id}/edit', [App\Http\Controllers\CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('category/{id}', [App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
