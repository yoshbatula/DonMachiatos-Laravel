<?php

namespace App\Http\Controllers\CartControllers;
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
            'productID' => 'required|integer',
            'productQuantity' => 'required|integer|min:1',
            'productPrice' => 'required|numeric',
            'productImage' => 'nullable|string|max:255',
            'productName' => 'required|string|max:255',
            'productMood' => 'nullable|string|max:255',
            'productSize' => 'nullable|string|max:255',
            'productSugar' => 'nullable|string|max:255',
        ]);

        try {
            
            $existingCart = Carts::where('productID', $validated['productID'])
                ->where('productMood', $validated['productMood'])
                ->where('productSize', $validated['productSize'])
                ->where('productSugar', $validated['productSugar'])
                ->first();

            if ($existingCart) {
                
                $existingCart->productQuantity += $validated['productQuantity'];
                $existingCart->save();
            } else {
                
                $Carts = new Carts();
                $Carts->productID = $validated['productID'];
                $Carts->productQuantity = $validated['productQuantity'];
                $Carts->productPrice = $validated['productPrice'];
                $Carts->productImage = $validated['productImage'];
                $Carts->productName = $validated['productName'];
                $Carts->productMood = $validated['productMood'];
                $Carts->productSize = $validated['productSize'];
                $Carts->productSugar = $validated['productSugar'];
                $Carts->save();
            }
            
            return redirect()->route('dinein')->with('success', 'Product added to cart!');
        } catch(\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }

    public function deleteAllCartItems() {
        try {
            $count = Carts::count();
            
            if ($count === 0) {
                return redirect()->route('dinein')->with('error', 'Cart is already empty!');
            }
            
            Carts::truncate();
            return redirect()->route('dinein')->with('success', 'All cart items deleted successfully!');
        } catch(\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
}