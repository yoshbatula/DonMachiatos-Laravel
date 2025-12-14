<?php 
namespace DonMachiatos\app\Http\Controllers\CheckoutController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\Payment;
class CheckoutController extends Controller {

    public function PaymentOption() {
        
        try {

        }catch(\Exception $e) {
            return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
        }
    }
}