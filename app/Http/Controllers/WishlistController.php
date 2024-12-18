<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Affiche la wish list
    public function index()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->get();
        return view('wishlist.index', compact('wishlists'));
    }

    public function add(Request $request)
{
    Wishlist::firstOrCreate([
        'user_id' => Auth::id(), // ID de l'utilisateur connecté
        'sneaker_id' => $request->sneaker_id,
    ], [
        'name' => $request->name,
        'image' => $request->image,
        'price' => $request->price,
    ]);

    return back()->with('success', 'Sneaker ajoutée à votre wish list.');
}


    // Retire une sneaker de la wish list
    public function remove(Request $request)
    {
        Wishlist::where('user_id', Auth::id())
            ->where('sneaker_id', $request->sneaker_id)
            ->delete();

        return back()->with('success', 'Sneaker retirée de la wish list.');
    }
}
