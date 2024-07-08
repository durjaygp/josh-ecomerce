<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->where('status',0)->get();
        return view('backEnd.order.index',compact('orders'));
    }
    public function pendingOrder(){
        $orders = Order::latest()->where('status',1)->get();
        return view('backEnd.payment.index',compact('orders'));
    }
    public function cartDelete($id){
        $cart = Order::find($id);
        $cart->delete();
        return redirect()->back()->with('success','Deleted Successfully');
    }

    public function orderStatus($id){
        $order = Order::find($id);
        $order->status = 0;
        $order->save();
        return redirect()->back()->with('success','Approved Successfully');
    }
}
