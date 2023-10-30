<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinController;

Route::get('/get-coins', [CoinController::class, 'getCoins']);
Route::get('/coins', [CoinController::class, 'index']);
