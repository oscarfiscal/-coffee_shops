<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellProductController;
use Illuminate\Support\Facades\Route;

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


Route::resource('/products', ProductController::class);
Route::get('/stock', [SellProductController::class, 'showView'])->name('stock');