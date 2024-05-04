<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    //
    public function index(Request $request)
    {
        // not in use
        $page = $request->query('page');
        if(!$page)
        $page = 1;
        $size = $request->query('size');
        if(!$size)
        $size = 6;
        $order = $request->query('order');
        if(!$order)
        $order = 1;
        $o_column = "";
        $o_order = "";
        switch($order)
        {
            case 1:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
            case 2:
                $o_column = "created_at";
                $o_order = "ASC";
                break;
            case 3:
                $o_column = "regular_price";
                $o_order = "DESC";
                break;
            case 4:
                $o_column = "regular_price";
                $o_order = "ASC";
                break;
            default:
                $o_column = "created_at";
                $o_order = "DESC";
                break;
        }
        // not use ends
        $brands = Brand::orderBy("name", 'ASC')->get();
        $q_brands = $request->query('brands');
        $products = Product::where(function($query) use($q_brands){
            $query->whereIn('brand_id',explode(',',$q_brands))->orWhereRaw("'".$q_brands."'= ''");
        })->orderBy('created_at','DESC')->orderBy($o_column,$o_order)->paginate(6);
        return view('app.shop', compact('products', 'size', 'page','order', 'brands', 'q_brands'));
    }
    public function productDetails($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $customs = Product::where('slug', '!=', $slug)->inRandomOrder('id')->get()->take(6);
        return view('app.product', compact('product', 'customs'));
    }
}
