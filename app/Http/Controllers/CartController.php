<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //
    public function index()
    {
        $cartItems = Cart::instance('cart')->content();
        return view('app.cart', compact('cartItems'));
    }
}
