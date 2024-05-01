<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    //
    public function index()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(6);
        return view('app.shop', compact('products'));
    }
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $customs = Product::where('slug', '!=', $slug)->inRandomOrder('id')->get()->take(6);
        return view('app.product', compact('product', 'customs'));
    }
}
