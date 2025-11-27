<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Starting-page');
});

Route::get('/order-type', function () {
    return view('TypeOrder/OrderType');
})->name('ordertype'); 