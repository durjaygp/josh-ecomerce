<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WebProductController extends Controller
{
    public function index(){
        $products = Product::whereStatus(1)->get();
        return view('frontEnd.product.index',compact('products'));
    }

    public function details($slug){
        $product = Product::whereSlug($slug)->first();
        $relatedProducts = Product::where('product_category_id',$product->product_category_id)->whereStatus(1)->latest()->take(4)->get();
        return view('frontEnd.product.details',compact('product','relatedProducts'));
    }


}
