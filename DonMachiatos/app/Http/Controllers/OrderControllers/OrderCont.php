<?php 
namespace DonMachiatos\app\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Order;
use App\Models\Payment;
class CheckoutController extends Controller {

    public function PaymentOption() {
        
        try {
            if (Carts::count() === 0) {
                return redirect()->route('dinein')->with('error', 'Your cart is empty. Please add items before proceeding to checkout.');
            }
            $orders = new Order();
            $orders->CartID = Carts::pluck('CartID')->first();
            $orders->TotalAmount = Carts::sum(function($cart) { 
                return $cart->productPrice * $cart->productQuantity; 
            });
            $orders->PaymentMethod = 'CASHIER';
            $orders->OrderDate = now();
            $orders->OrderNumber = mt_rand(100000, 999999);
            $orders->save();

            $carts = Carts::truncate();

            return redirect()->route('paymentsuccess')->with('success', 'Order placed successfully!');
        }catch(\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
}