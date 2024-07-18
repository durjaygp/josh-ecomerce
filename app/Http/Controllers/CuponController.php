<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\Cupon;
use Carbon\Carbon;

class CuponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupons = Cupon::latest()->get();
        return view('backEnd.coupons.index',compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backEnd.coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required',
            'value'=>'required',
            'type'=>'required',
            'expiry_date'=>'required',
            'status'=>'required',
        ]);
        $data = $request->all();
        Cupon::create($data);
        return redirect()->back()->with('success','Coupon Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cupon $cupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $coupon = Cupon::find($id);
        return view('backEnd.coupons.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'code'=>'required',
            'value'=>'required',
            'type'=>'required',
            'expiry_date'=>'required',
            'status'=>'required',
        ]);
        $data = $request->all();
        $coupon = Cupon::find($id);
        $coupon->update($data);
        return redirect()->back()->with('success','Coupon Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $coupon = Cupon::find($id);
        $coupon->delete();
        return redirect()->back()->with('success','Coupon Deleted Successfully');
    }

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('code');

        // Find the coupon by code
        $coupon = Cupon::where('code', $couponCode)->first();

        // Check if the coupon is expired
        if ($coupon->expiry_date && Carbon::parse($coupon->expiry_date)->isPast()) {
            return redirect()->back()->with('error','Coupon has expired.');
//            return response()->json(['error' => 'Coupon has expired.']);
        }
        // Active and Deactivated
        if ($coupon->status == 2) {
            return redirect()->back()->with('error','Coupon has Deactivated.');
//            return response()->json(['error' => 'Coupon has Deactivated.']);
        }

        if ($coupon) {
            // Assuming user is authenticated and cart belongs to the user
            $cart = Cart::where('user_id',auth()->user()->id)->first();
            // Apply the coupon to the cart
            $cart->coupon_id = $coupon->id;
            $cart->save();
        }else {
            return redirect()->back()->with('error','Invalid coupon code.');
//            return response()->json(['error' => 'Invalid coupon code.']);
        }

        return redirect()->back()->with('success','Coupon applied successfully.');
//        return response()->json(['success' => 'Coupon applied successfully.', 'discount' => $coupon->value]);
    }


    public function removeCoupon()
    {
        $cart = Cart::where('user_id',auth()->user()->id)->first();
        // Apply the coupon to the cart
        $cart->coupon_id = null;
        $cart->save();
        return redirect()->back()->with('success','Coupon Removed successfully.');
    }


}
