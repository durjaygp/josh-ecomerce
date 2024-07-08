<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    public function index(){
        $carts = Cart::latest()->where('user_id', Auth()->user()->id)->get();
        $totalPrice = Cart::where('user_id', Auth()->user()->id)->sum('total_price');
        $shipPrice = Cart::where('user_id', Auth()->user()->id)->sum('shipping_price');
        return view('frontEnd_old.books.cart',compact('carts','totalPrice','shipPrice'));
    }
    public function cartToSave(Request $request)
    {
        if (Auth::check()) {
            $cartChk = Cart::where('user_id', Auth::user()->id)
                ->where('book_id', $request->book_id)
                ->first();

            if ($cartChk) {
                return redirect(route('home.cart'))->with('warning', 'This book is already in your cart');
            } else {
                $cart = new Cart();
                $cart->user_id = Auth::user()->id;
                $cart->book_id = $request->book_id;
                $cart->total_price = $request->total_price;
                $cart->book_name = $request->book_name;

                // Check if the checkbox is selected
                if ($request->has('select_print_price')) {
                    $cart->shipping_price = $request->shipping_price;
                } else {
                    // Set a default shipping_price or leave it out depending on your logic
                    // $cart->shipping_price = $defaultShippingPrice;
                }

                $cart->save();
                return redirect(route('home.cart'))->with('success', 'Book added to Cart Successfully');
            }
        } else {
            return redirect()->route('login')->with('warning', 'Please login first');
        }
    }

    public function remove($id){
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back()->with('success','Removed Successfully');
    }

}
