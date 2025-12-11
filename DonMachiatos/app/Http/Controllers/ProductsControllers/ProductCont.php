<?php

namespace App\Http\Controllers\ProductsControllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Carts;

class ProductCont extends Controller {
    public function index() {
        $products = Products::all();
        $carts = Carts::all();

        // Calculate total price
        $total = $carts->sum(function($cart) {
            return $cart->productPrice * $cart->productQuantity;
        });
        return view('TypeOrder/Dine_In', compact('products', 'carts', 'total'));
    }

    public function productPage() {
        $products = Products::all();
        return view('Products', compact('products'));
    }

    public function addProducts(Request $request) {

        $validated = $request->validate([
            'ProductName' => 'required|string|max:255',
            'ProductDescription' => 'required|string',
            'ProductPrice' => 'required|numeric',
            'StockQuantity' => 'required|integer',
            'ProductImage' => 'nullable|file|mimes:jpeg,jpg,png,gif,svg|max:10240',
            'productType' => 'nullable|string|max:255',
        ]);

        try {
            $products = new Products();
            $products->ProductName = $request->input('ProductName');
            $products->ProductDescription = $request->input('ProductDescription');
            $products->ProductPrice = $request->input('ProductPrice');
            $products->StockQuantity = $request->input('StockQuantity');
            

            if ($request->hasFile('ProductImage')) {
                $image = $request->file('ProductImage');
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/products'), $imageName);
                $products->ProductImage = $imageName;
            }
            
            $saved = $products->save();
            
            if ($saved) {
                return redirect()->route('products.list')->with('success', 'Product added successfully!');
            } else {
                return back()->with('error', 'Failed to save product')->withInput();
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
}
