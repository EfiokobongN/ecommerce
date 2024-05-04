<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
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
    public function store(Request $request)
    {
        $product = Product::find($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        Cart::instance('cart')->add($product->id,$product->name,$request->quantity,$price)->associate('App\Models\Product');
        
        return redirect()->back()->with('message', 'Item has been Added Successfully');
    }
    public function update(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->update($rowId, $request->quantity);
        return redirect()->back()->with('message', 'CartItem has been Updated Successfully');
    }

    public function delete(Request $request)
    {
        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->back()->with('message', 'CartItem has been Removed Successfully');
    }
    public function clear()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back()->with('message', 'Cart has been Cleared Successfully');
    }
}
