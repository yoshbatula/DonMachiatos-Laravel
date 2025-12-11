<?php

namespace DonMachiatos\App\Http\Controllers\CartControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
class CartCont extends Controller {

    public function index() {
        $carts = Carts::all();
        return view('Cart', compact('carts'));
    }

    // Method to add a prodcut to the cart
    public function AddToCart(Request $request) {
        $validated = $request->validate([
            
        ]);
    }
}