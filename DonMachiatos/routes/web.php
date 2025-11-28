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