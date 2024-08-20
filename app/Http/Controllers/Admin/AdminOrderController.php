<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Cupon;
use App\Models\Order;
use App\Models\OrderItems;
use Illuminate\Http\Request;

class AdminOrderController extends Controller
{
    public function index(){
        $orders = Order::latest()->get();
        return view('backEnd.order.index',compact('orders'));
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        $orderItems = OrderItems::with('product')->where('order_id', $order->id)->get();

        // Calculate the subtotal
        $subTotal = $orderItems->sum(function($item) {
            return $item->product->price * $item->quantity;
        });

        // Apply any coupon if available
        $discount = 0;
        if ($order->coupon_id) {
            $coupon = Cupon::find($order->coupon_id);
            if ($coupon) {
                if ($coupon->type == 1) {
                    // Percent discount
                    $discount = ($coupon->value / 100) * $subTotal;
                } elseif ($coupon->type == 2) {
                    // Flat discount
                    $discount = $coupon->value;
                }
            }
        }

        // Calculate the total
        $total = $subTotal - $discount;

        return view('backEnd.order.invoice', compact('order', 'orderItems', 'subTotal', 'discount', 'total'));
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
