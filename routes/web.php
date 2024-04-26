<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;

//Route::get('/', function () {
   // return view('welcome');
//});
Route::get('/', [AppController::class, 'index'])->name('app.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
