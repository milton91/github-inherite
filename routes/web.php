<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Item;

// LAVALEL PROPRIETARY
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('home', ['title' => 'Home Page', 'items' => Item::all()]);
});

Route::get('/item', function () {
    return view('item', ['title' => 'Item Page'] );
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/category/{id}', function($id){
    $category = Category::find($id);
    return view('category', ['title' => 'Category', 'category' => $category]);
});

require __DIR__.'/auth.php';
