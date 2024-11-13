<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function index($productId)
    {
        $product = Item::findOrFail($productId);
        $chats = Chat::where('product_id', $productId)->with('user')->latest()->get();

        return view('chat', compact('product', 'chats'));
    }

    public function store(Request $request, $productId)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Chat::create([
            'product_id' => $productId,
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back();
    }

    public function userChats()
    {
        $chats = Chat::whereHas('product', function ($query) {
            $query->where('seller', Auth::user()->name); // Assuming `seller` is the product's seller name
        })
        ->orWhere('user_id', Auth::id())
        ->with('product') // Load related product
        ->latest()
        ->get();

        return view('user-chats', compact('chats'));
    }
}
