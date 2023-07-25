<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CurrencyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/get-currency-list', [CurrencyController::class, 'index']);
Route::get('/get-currency-histyory/{slug_code}/{slug_date}', [CurrencyController::class, 'show']);

Route::get('{any?}', function () {
    return view('layouts.app');
})->where('any', '.*');
