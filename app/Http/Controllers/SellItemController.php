<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellItemController extends Controller
{
    /**
     * Show the form for creating a new item.
     */
    public function create()
    {
        return view('sell-item');
    }

    /**
     * Store a newly created item in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|in:Electronic,Automotive,Furniture,Menswear,Womenswear,Other',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'description' => 'required|string',
        ]);

        $item = new Item($request->only(['name', 'category', 'location', 'price', 'description']));
        $item->seller = Auth::user()->name; // Automatically set the seller to the authenticated user

        if ($request->hasFile('image')) {
            $item->image = $request->file('image')->store('items', 'public');
        }

        $item->save();

        return redirect()->route('dashboard')->with('status', 'Item listed successfully!');
    }

    public function myItems()
    {
        $items = Item::where('seller', Auth::user()->name)->latest()->get(); // Fetch all items where the seller is the logged-in user
        return view('my-items', compact('items')); // Pass items to the view
    }
}
