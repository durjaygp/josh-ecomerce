<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Cache;




class OrderController extends Controller
{
    public function checkout(){
        $totalPrice = Cart::where('user_id', Auth()->user()->id)->sum('total_price');
        $carts = Cart::latest()->where('user_id', Auth()->user()->id)->get();
        $shipPrice = Cart::where('user_id', Auth()->user()->id)->sum('shipping_price');
        return view('frontEnd_old.books.checkout',compact('totalPrice','carts','shipPrice'));
    }


//    public function checkoutSave(Request $request)
//    {
//        $carts = Cart::where('user_id', Auth()->user()->id)->get();
//
//        foreach ($carts as $row) {
//            $order = new Order();
//            $order->user_id = Auth()->user()->id;
//            $order->book_id = $row->book_id;
//            $order->price = $row->total_price;
//            $order->name = $request->name;
//            $order->description = $request->description;
//            $order->total_price = $request->total_price;
//            $order->country = $request->country;
//            $order->address = $request->address;
//            $order->status = 1;
//            $order->save();
//        }
//
//        // Store form data in the cache
//        $cacheKey = 'checkout_data_' . Auth()->user()->id;
//        Cache::put($cacheKey, $request->all(), now()->addMinutes(60));
//
//        Cart::where('user_id', Auth::user()->id)->delete();
//        return redirect('https://sandbox.payfast.co.za/eng/process'); // Redirect to the payment gateway
//    }
    public function setSessionData(Request $request)
    {
        $userId = Auth()->user()->id;
        session([
            "user_{$userId}_description" => $request->description,
            "user_{$userId}_address" => $request->address,
            "user_{$userId}_country" => $request->country,
            "user_{$userId}_phone" => $request->phone,
        ]);

        return response()->json(['message' => 'Session data set successfully']);
    }
    public function checkoutSave(Request $request)
    {
        $userId = Auth()->user()->id;
        session([
            "user_{$userId}_description" => $request->description,
            "user_{$userId}_address" => $request->address,
            "user_{$userId}_country" => $request->country,
            "user_{$userId}_phone" => $request->phone,
        ]);

        return redirect('https://sandbox.payfast.co.za/eng/process');
    }

    public function handlePaymentResponse(Request $request)
    {
        $userId = Auth()->user()->id;
        $carts = Cart::where('user_id', $userId)->get();
        $totalPrice = Cart::where('user_id', $userId)->sum('total_price');

        foreach ($carts as $row) {
            $order = new Order();
            $order->user_id = $userId;
            $order->book_id = $row->book_id;
            $order->price = $row->book->price;
            $order->name = $row->book->name;
            $order->total_price = $totalPrice;

            // Retrieve session data
            $description = session("user_{$userId}_description");
            $address = session("user_{$userId}_address");
            $country = session("user_{$userId}_country");
            $phone = session("user_{$userId}_phone");

            // Use session data in the order
            $order->description = $description;
            $order->country = $country;
            $order->address = $address;
            $order->phone = $phone;

            $order->status = 0;
            $order->save();
        }

        // Clear session data after using it
        session()->forget([
            "user_{$userId}_description",
            "user_{$userId}_address",
            "user_{$userId}_country",
            "user_{$userId}_phone",
        ]);

        Cart::where('user_id', $userId)->delete();

        return redirect(route('dashboard'))->with('success', 'Payment Recorded');
    }





}
