@extends('website.master')
@section('title')
    Cart
@endsection
@section('content')

<!-- Cart Page-->
<div class="cart-section pt-200 pb-100 lg-pt-180 sm-pb-50">
    <div class="container">
        <div class="cart-list-form">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>QTY</th>
                        <th>Total</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                        <td class="product-thumbnails">
                            <a href="{{ route('home.product', $item['slug']) }}" class="product-img"><img src="{{ asset($item['image']) }}" alt="" class="img-fluid"></a>
                        </td>

                        <td class="product-info">
                            <a href="{{ route('home.product', $item['slug']) }}" class="product-name">{{ $item['name'] }}</a>
                        </td>
                        <td class="price"><span>$ {{ number_format($item['price'], 2) }}</span></td>
                        <td class="quantity">
                            <ul class="order-box style-none">
                                <li><a href="{{ route('cart.cartOneRemove', $item['product_id']) }}" class="btn value-decrease">-</a></li>
                                <li><input type="number" value="{{ $item['quantity'] }}" disabled class="product-value val"></li>
                                <li><a href="{{ route('cart.cartAdd', $item['product_id']) }}" class="btn value-increase">+ </a></li>
                            </ul>
                        </td>
                        <td class="price total-price"><span>$ {{ number_format($item['total_price'], 2) }}</span></td>
                        <td><a href="{{ route('cart.remove', $item['product_id']) }}" class="remove-product" onclick="return confirm('Are you sure you want to remove this item from the cart?');">x</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-responsive -->

            <div class="d-sm-flex justify-content-between cart-footer">
                @if(session()->has('coupon'))
                    <div class="coupon-section d-flex flex-column" >
                        <div class="coupon-form d-lg-flex align-items-center">
                            @csrf
                            <a href="{{ route('remove-coupon') }}" type="submit" class="theme-btn-two md-mt-20 sm-mb-20"
                               onclick="return confirm('Are you sure you want to remove the Coupon?');">
                              Remove Coupon
                            </a>
                        </div>
                    </div>
                @else
                    <div class="coupon-section d-flex flex-column" >
                        <form action="{{ route('coupon-apply') }}" method="post">
                            <div class="coupon-form d-lg-flex align-items-center">
                            @csrf
                                <input type="text" placeholder="Enter your code" name="code">
                                <button type="submit" class="theme-btn-seven md-mt-20 sm-mb-20">Apply Coupon</button>
                            </div>
                        </form>
                    </div>
                @endif


                <div class="cart-total-section d-flex flex-column sm-pt-40">
                    <table class="cart-total-table">
                        <tbody>
                        <tr>
                            <th>Subtotal</th>
                            <td>$ {{ number_format($subtotal, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>- ${{ number_format($discount, 2) }}</td>
                        </tr>
                        <tr>
                            <th>Total</th>
                            <td>${{ number_format($total, 2) }}</td>
                        </tr>
                        </tbody>
                    </table> <!-- /.cart-total-table -->
                    <a href="{{ route('home.checkout') }}" class="theme-btn-seven checkout-process mt-30">Checkout</a>
                </div>
            </div> <!-- /.cart-footer -->
        </div>
    </div> <!-- /.container -->
</div> <!-- /.cart-section -->

@endsection
