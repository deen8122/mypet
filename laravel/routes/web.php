<?php

use App\Http\Controllers\Orders\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders', [OrderController::class,'index']);