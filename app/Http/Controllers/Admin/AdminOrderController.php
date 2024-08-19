<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->get();
        return view('backEnd.order.index',compact('orders'));
    }

    public function invoice($id){
        $order = Order::find($id);
        $orderItems = OrderItems::where('order_id',$order->id)->get();
        return view('backEnd.order.invoice',compact('order','orderItems'));
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
