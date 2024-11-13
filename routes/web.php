<?php

use App\Http\Controllers\SellItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;
use App\Models\Item;

// Home Route
Route::get('/', function () {
    return view('home', ['title' => 'Home Page', 'items' => Item::all()]);
})->name('home');

// Item Route
Route::get('/item/{id}', function($id) {
    $item = Item::find($id);
    return view('item', ['title' => 'Single Post', 'item' => $item]);
});

// Dashboard Route (Protected by auth middleware)
Route::get('/dashboard', function () {
    return view('dashboard', ['title' => 'Home Page', 'items' => Item::all()]);
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Wishlist Route
Route::get('/wishlist', function () {
    return view('wishlist');
})->name('wishlist');

// Sell Item Routes
Route::middleware('auth')->group(function () {
    Route::get('/sell-item', [SellItemController::class, 'create'])->name('sell-item'); // Form to sell item
    Route::post('/sell-item', [SellItemController::class, 'store'])->name('items.store'); // Store the item
});

Route::middleware(['auth'])->group(function () {
    Route::get('/chat/{productId}', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/{productId}', [ChatController::class, 'store'])->name('chat.store');
});

Route::middleware('auth')->group(function () {
    Route::get('/user-chats', [ChatController::class, 'userChats'])->name('user.chats');
});

require __DIR__.'/auth.php';
