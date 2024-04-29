<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

//Route::get('/', function () {
   // return view('welcome');
//});
Route::get('/', [AppController::class, 'index'])->name('app.index');

Auth::routes();

Route::middleware('auth')->group(function(){
   Route::get('/my-account', [UserController::class, 'index'])->name('user.index');
});

//Admin Route
Route::middleware(['auth','auth.admin'])->group(function(){
   Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});
