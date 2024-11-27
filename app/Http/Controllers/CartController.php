<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Cupon;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // Show the cart items
    public function index()
    {
        // Retrieve cart data from the session
        $cart = session()->get('cart', [
            'items' => [],
            'total_quantity' => 0,
        ]);

        $items = [];
        $subtotal = 0;

        // Loop through each cart item and fetch product details
        foreach ($cart['items'] as $cartItem) {
            $product = Product::find($cartItem['product_id']);
            if ($product) {
                $totalPrice = $product->price * $cartItem['quantity'];
                $items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $cartItem['quantity'],
                    'total_price' => $totalPrice,
                    'image' => $product->image,
                    'slug' => $product->slug,
                ];
                $subtotal += $totalPrice;
            }
        }

        // Fetch applied coupon from the session (if any)
        $coupon = session()->get('coupon');
        $discount = 0;

        if ($coupon) {
            // Retrieve the full coupon details from the database
            $cp = Cupon::where('code', $coupon['code'])->first();

            if ($cp) {
                if ($cp->type == 1) { // Percentage-based discount
                    $discount = $subtotal * ($cp->value / 100);
                } elseif ($cp->type == 2) { // Flat discount
                    $discount = min($subtotal, $cp->value); // Ensure discount does not exceed subtotal
                }
            }
        }

        // Calculate the total after applying the discount
        $total = max(0, $subtotal - $discount); // Ensure total is not negative

        // Pass data to the view
        return view('frontEnd.order.cart', [
            'items' => $items,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'total' => $total,
            'total_quantity' => $cart['total_quantity'],
        ]);
    }



    // Get cart count
    public function cartCount()
    {
        $cart = session()->get('cart', [
            'items' => [],
            'total_quantity' => 0,
        ]);

        $cartCount = $cart['total_quantity'];

        return response()->json(['cart' => $cartCount]);
    }

    // Remove an item from the cart
    public function removeCart($productId)
    {
        $cart = session()->get('cart', [
            'items' => [],
            'total_quantity' => 0,
        ]);

        // Filter out the item
        $cart['items'] = array_filter($cart['items'], function ($item) use ($productId) {
            return $item['product_id'] != $productId;
        });

        // Recalculate total quantity
        $cart['total_quantity'] = array_sum(array_column($cart['items'], 'quantity'));

        // Save back to session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart Updated Successfully');
    }

    // Increase the quantity of a cart item
    public function cartAdd($productId)
    {
        $cart = session()->get('cart', [
            'items' => [],
            'total_quantity' => 0,
        ]);

        foreach ($cart['items'] as &$item) {
            if ($item['product_id'] == $productId) {
                $item['quantity'] += 1;
                break;
            }
        }

        // Recalculate total quantity
        $cart['total_quantity'] = array_sum(array_column($cart['items'], 'quantity'));

        // Save back to session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart Updated Successfully');
    }

    // Decrease the quantity of a cart item
    public function cartOneRemove($productId)
    {
        $cart = session()->get('cart', [
            'items' => [],
            'total_quantity' => 0,
        ]);

        foreach ($cart['items'] as &$item) {
            if ($item['product_id'] == $productId) {
                if ($item['quantity'] == 1) {
                    $this->removeCart($productId);
                    return redirect()->back()->with('success', 'Cart Updated Successfully');
                } else {
                    $item['quantity'] -= 1;
                }
                break;
            }
        }

        // Recalculate total quantity
        $cart['total_quantity'] = array_sum(array_column($cart['items'], 'quantity'));

        // Save back to session
        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cart Updated Successfully');
    }

    // Add an item to the cart
    public function store(Request $request)
    {
        try {
            $cart = session()->get('cart', [
                'items' => [],
                'total_quantity' => 0,
            ]);

            $productId = $request->product_id;
            $quantity = $request->quantity;

            // Check if the product already exists in the cart
            $existingItemKey = array_search($productId, array_column($cart['items'], 'product_id'));

            if ($existingItemKey !== false) {
                // Update the quantity if the product exists
                $cart['items'][$existingItemKey]['quantity'] += $quantity;
            } else {
                // Add a new product
                $cart['items'][] = [
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ];
            }

            // Recalculate total quantity
            $cart['total_quantity'] = array_sum(array_column($cart['items'], 'quantity'));

            // Save back to session
            session()->put('cart', $cart);

            return response()->json(['success' => 'Product added to cart successfully!', 'cart' => $cart]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

//    public function index()
//    {
//        $user = auth()->user()->id;
//        $carts = CartItems::where('user_id',$user)->get();
//        $mainCart = Cart::where('user_id',$user)->first();
//       return view('frontEnd.order.cart',compact('carts','mainCart'));
//    }
//    public function cartCount()
//    {
//        if (auth()->check()) {
//            $cartCount = Cart::where('user_id', auth()->id())->count(); // or however you're counting cart items
//        } else {
//            $cartCount = 0; // For guests, return 0 or a custom value
//        }
//
//        return response()->json(['cart' => $cartCount]);
//    }
//    public function removeCart($id){
//        $cart = CartItems::find($id);
//        $cart->delete();
//        return redirect()->back()->with('success', 'Cart Updated Successfully');
//    }
//
//    public function cartAdd($id){
//        $cart = CartItems::find($id);
//        $cart->update([
//            'quantity' => $cart->quantity + 1,
//        ]);
//        return redirect()->back()->with('success', 'Cart Updated Successfully');
//    }
//
//    public function cartOneRemove($id){
//        $cart = CartItems::find($id);
//        if ($cart->quantity == 1){
//            $this->removeCart($id);
//        }else{
//            $cart->update([
//                'quantity' => $cart->quantity - 1,
//            ]);
//        }
//        return redirect()->back()->with('success', 'Cart Updated Successfully');
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     */
//    public function create()
//    {
//        //
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     */
//    public function store(Request $request)
//    {
//        try {
//            if (auth()->check()) {
//                $user = auth()->user()->id;
//                $product = Product::findOrFail($request->product_id);
//
//                $cart = Cart::firstOrCreate([
//                    'user_id' => $user,
//                    'status' => 1,
//                ]);
//
//                $existingCartItem = CartItems::where('cart_id', $cart->id)->where('product_id', $product->id)->first();
//
//                if ($existingCartItem) {
//                    $existingCartItem->update([
//                        'quantity' => $existingCartItem->quantity + $request->quantity,
//                    ]);
//                    $cartItem = $existingCartItem; // Set cartItem to existingCartItem
//                } else {
//                    $cartItem = CartItems::create([
//                        'cart_id' => $cart->id,
//                        'user_id' => $user,
//                        'product_id' => $product->id,
//                        'quantity' => $request->quantity,
//                    ]);
//                }
//
//                return response()->json(['success' => 'Product added to cart successfully!', 'cartItem' => $cartItem]);
//            } else {
//                return response()->json(['error' => 'Please login first.'], 401);
//            }
//        } catch (\Exception $e) {
//            return response()->json(['error' => $e->getMessage()], 500);
//        }
//    }


//                $existingProduct = Cart::where('user_id', $user)->where('product_id', $product->id)->first();
//
//                if ($existingProduct) {
//                    // Update the existing cart item
//                    $existingProduct->update([
//                        'quantity' => $existingProduct->quantity + $request->quantity,
//                    ]);
//                    $cart = $existingProduct;
//                } else {
//                    // Create a new cart item
//                    $cart = Cart::create([
//                        'user_id' => $user,
//                        'product_id' => $product->id,
//                        'quantity' => $request->quantity,
//                    ]);
//                }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
