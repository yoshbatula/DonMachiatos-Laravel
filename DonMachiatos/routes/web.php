<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Starting-page');
});

Route::get('/order-type', function () {
    return view('TypeOrder/OrderType');
})->name('ordertype'); 

Route::get('/Dine-In', function () {
    return view('TypeOrder/Dine_In');
})->name('dinein');

Route::get('/Takeaway', function () {
    return view('TypeOrder/TakeOut');
})->name('takeout');

Route::get('/PaymentOptions', function () {
    return view('PaymentGateway/PaymentOption');
})->name('paymentoptions');

Route::get('/QrScanner', function () {
    return view('PaymentGateway/QrScanner');
})->name('qrscanner');

Route::get('/PaymentSucess', function () {
    return view('PaymentGateway/PaymentSuccess');
})->name('paymentsuccess');