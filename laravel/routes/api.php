<?php

use App\Http\Controllers\Orders\OrderController;
use App\Http\Controllers\RunController;
use Illuminate\Support\Facades\Route;

Route::get('/runService', [RunController::class, 'runService']);