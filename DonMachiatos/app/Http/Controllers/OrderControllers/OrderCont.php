<?php 
namespace App\Http\Controllers\OrderControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Payment;

    class OrderCont extends Controller {

        public function PaymentOption() {
            
            try {
                
                if (Carts::count() === 0) {
                    return redirect()->route('dinein')->with('error', 'Your cart is empty. Please add items before proceeding to checkout.');
                }
                
                $cartItems = Carts::all();
                
                $totalAmount = $total = $cartItems->sum(function($item) {
                    return $item->productPrice * $item->productQuantity;
                });
                
                $orders = new Order();
                $orders->CartID = $cartItems->first()->CartID;
                $orders->TotalAmount = $totalAmount;
                $orders->PaymentMethod = 'CASHIER';
                $orders->OrderDate = now();
                $orders->OrderNumber = mt_rand(100000, 999999);
                $orders->save();

                Carts::query()->delete();

                return redirect()->route('paymentsuccess')->with('order', $orders);
                
            } catch(\Exception $e) {
                return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
            }
        }
    }