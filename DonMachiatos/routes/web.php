
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsControllers\ProductCont;
use App\Http\Controllers\CartControllers\CartCont;
use App\Http\Controllers\OrderControllers\OrderCont;
use App\Models\Carts;

Route::get('/', function () {
    return view('Starting-page');
})->name('starting.page');

Route::get('/order-type', function () {
    return view('TypeOrder/OrderType');
})->name('ordertype'); 

Route::get('/Dine-In', [ProductCont::class, 'index'])->name('dinein');

Route::get('/Takeaway', function () {
    return view('TypeOrder/TakeOut');
})->name('takeout');

Route::get('/Selection', function () {
    return view('Selection');
})->name('selection');

Route::get('/PaymentOptions', function () {
    return view('PaymentGateway/PaymentOption');
})->name('paymentoptions');

Route::get('/QrScanner', function () {
    return view('PaymentGateway/QrScanner');
})->name('qrscanner');

Route::get('/PaymentSucess', function () {
    return view('PaymentGateway/PaymentSuccess');
})->name('paymentsuccess');


Route::get('/Payment', function () {
    return view('PaymentGateway/Payment');
})->name('payment');


Route::get('/ViewCart', function () {
    $carts = Carts::all();
    return view('ViewCart', compact('carts'));
})->name('viewcart');

Route::delete('/Cart/delete/{id}', [CartCont::class, 'deleteCartItem'])->name('cart.delete');
Route::put('/Cart/update/{id}', [CartCont::class, 'updateCartItem'])->name('cart.update');

Route::get('/Products', [ProductCont::class, 'productPage'])->name('products.list');
Route::post('/Products/add', [ProductCont::class, 'addProducts'])->name('products.add');

Route::post('/Cart/add', [CartCont::class, 'AddToCart'])->name('cart.add');
Route::post('/Cart/delete-all', [CartCont::class, 'deleteAllCartItems'])->name('cart.deleteAll');
Route::get('/Cart', [CartCont::class, 'index'])->name('cart.index');
Route::get('/Checkout', [CartCont::class, 'checkOut'])->name('cart.checkout');

Route::get('/OrderOption', [OrderCont::class, 'PaymentOption'])->name('payment.success');