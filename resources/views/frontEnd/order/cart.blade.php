@extends('frontEnd.master')
@section('title')
    Cart
@endsection
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content text-center" data-aos="fade-center" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2 class="text-black">@yield('title')</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Cart Area -->
    <div class="cart-area ptb-100">
        <div class="container">
            <div class="cart-table table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td class="product-thumbnail">
                                <a href="{{ route('home.product', $item['slug']) }}"><img src="{{ asset($item['image']) }}" alt="item"></a>
                            </td>
                            <td class="product-name">
                                <a href="{{ route('home.product', $item['slug']) }}">{{ $item['name'] }}</a>
                            </td>
                            <td class="product-price"><span class="unit-amount">$ {{ number_format($item['price'], 2) }}</span></td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <a href="{{ route('cart.cartOneRemove', $item['product_id']) }}"><span class="minus-btn"><i class='ri-subtract-line'></i></span></a>
                                    <input type="text" value="{{ $item['quantity'] }}">
                                    <a href="{{ route('cart.cartAdd', $item['product_id']) }}"><span class="plus-btn"><i class='ri-add-line'></i></span></a>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="subtotal-amount">${{ number_format($item['total_price'], 2) }}</span>
                                <a href="{{ route('cart.remove', $item['product_id']) }}" class="remove" onclick="return confirm('Are you sure you want to remove this item from the cart?');">
                                    <i class="ri-close-circle-line"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="cart-buttons">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-md-6">
                        @if(session()->has('coupon'))
                            <div class="shopping-coupon-code">
                                <a href="{{ route('remove-coupon') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove the Coupon?');">
                                    <i class="ri-close-circle-line"></i>
                                    Remove Coupon
                                </a>
                            </div>
                        @else
                            <form action="{{ route('coupon-apply') }}" method="post">
                                @csrf
                                <div class="shopping-coupon-code">
                                    <input type="text" class="form-control" placeholder="Enter coupon code" name="code">
                                    <button type="submit" class="default-btn">Apply Coupon</button>
                                </div>
                            </form>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="cart-totals">
                            <h3>Cart Totals</h3>
                            <ul>
                                <li class="d-flex justify-content-between align-items-center">Subtotal
                                    <span>$ {{ number_format($subtotal, 2) }}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">Discount
                                    <span>- ${{ number_format($discount, 2) }}</span>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">Total
                                    <span>${{ number_format($total, 2) }}</span>
                                </li>
                            </ul>
                            <a href="{{ route('home.checkout') }}" class="default-btn">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart Area -->
@endsection
