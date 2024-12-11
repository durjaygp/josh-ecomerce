<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WebProductController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('search');
        $sort = $request->get('sort');

        // Start building the query
        $products = Product::whereStatus(1);

        // Apply search filter if provided
        if (!empty($query)) {
            $products->where('name', 'LIKE', "%{$query}%");
        }

        // Apply sorting based on the selected option
        switch ($sort) {
            case 'popularity':
                $products->orderBy('price', 'desc'); // Adjust according to your data
                break;
            case 'latest':
                $products->latest();
                break;
            case 'price_low_high':
                $products->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $products->orderBy('price', 'desc');
                break;
            default:
                $products->latest();
                break;
        }

        // Paginate the results
        $products = $products->paginate(12);

        // Check if the request is an AJAX request
        if ($request->ajax()) {
            // Return only the product grid view for AJAX requests
            return view('frontEnd.inc.productGrid', compact('products'))->render();
        }

        // Return the full view for initial load
        return view('website.product.index', compact('products'));
    }


    public function details($slug){
        $product = Product::whereSlug($slug)->first();
        $relatedProducts = Product::where('product_category_id',$product->product_category_id)->whereStatus(1)->latest()->take(3)->get();
        return view('website.product.details',compact('product','relatedProducts'));
    }


    public function search(Request $request)
    {
        $query = $request->get('search');
        $sort = $request->get('sort');

        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->whereStatus(1);

        // Apply sorting based on the selected option
        switch ($sort) {
            case 'popularity':
                $products->orderBy('price', 'desc'); // Adjust according to your data
                break;
            case 'latest':
                $products->latest();
                break;
            case 'price_low_high':
                $products->orderBy('price', 'asc');
                break;
            case 'price_high_low':
                $products->orderBy('price', 'desc');
                break;
            default:
                $products->latest();
                break;
        }

        $products = $products->paginate(12);

        if ($request->ajax()) {
            // Return only the product grid view for AJAX requests
            return view('frontEnd.inc.productGrid', compact('products'))->render();
        }

        return view('frontEnd.product.index', compact('products'));
    }


//    public function search(Request $request)
//    {
//        $query = $request->get('search');
//        $sort = $request->get('sort');
//
//        $products = Product::where('name', 'LIKE', "%{$query}%")
//            ->whereStatus(1);
//
//        // Apply sorting based on the selected option
//        switch ($sort) {
//            case 'popularity':
////                $products->orderBy('popularity', 'desc'); // Example, adjust according to your data
//                $products->orderBy('price', 'desc'); // Example, adjust according to your data
//                break;
//            case 'latest':
//                $products->latest();
//                break;
//            case 'price_low_high':
//                $products->orderBy('price', 'asc');
//                break;
//            case 'price_high_low':
//                $products->orderBy('price', 'desc');
//                break;
//            default:
//                // Default sorting, you can define this based on your needs
//                $products->latest();
//                break;
//        }
//
//        $products = $products->paginate(12);
//
//        if ($request->ajax()) {
//            return view('frontEnd.inc.productGrid', compact('products'))->render();
//        }
//
//        return view('frontEnd.product.index', compact('products'));
//    }




}
