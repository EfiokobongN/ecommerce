<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;

//Route::get('/', function () {
   // return view('welcome');
//});
Route::get('/', [AppController::class, 'index'])->name('app.index');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/product/{slug}', [ShopController::class, 'productDetails'])->name('product.show');

Route::get('/shop/cart', [CartController::class, 'index'])->name('product.cart');
Route::post('/cart/store', [CartController::class, 'store'])->name('product.store');

Auth::routes();

Route::middleware('auth')->group(function(){
   Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});

//Admin Route
Route::middleware(['auth','auth.admin'])->group(function(){
   Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
