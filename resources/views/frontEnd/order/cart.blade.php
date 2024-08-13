@extends('frontEnd.master')
@section('title')
    Cart
@endsection
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-5 jarallax" data-jarallax='{"speed": 0.3}' style="background-image: url({{ asset('homePage/assets/images/page-banner/banner-bg-5.jpg') }});">
        <div class="container">
            <div class="page-banner-content" data-aos="fade-right" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2>Cart</h2>
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
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
                    @foreach($carts as $row)
                        <tr>
                            <td class="product-thumbnail">
                                <a href="#"><img src="{{ asset($row->product->image) }}" alt="item"></a>
                            </td>
                            <td class="product-name">
                                <a href="products-details.html">{{ $row->product->name }}</a>
                            </td>
                            <td class="product-price"><span class="unit-amount">${{ $row->product->price }}</span></td>
                            <td class="product-quantity">
                                <div class="input-counter">
                                    <a href="{{ route('cart.cartOneRemove', $row->id) }}"><span class="minus-btn"><i class='ri-subtract-line'></i></span></a>
                                    <input type="text" value="{{ $row->quantity }}">
                                    <a href="{{ route('cart.cartAdd', $row->id) }}"><span class="plus-btn"><i class='ri-add-line'></i></span></a>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span class="subtotal-amount">${{ $row->product->price * $row->quantity }}</span>
                                <a href="{{ route('cart.remove', $row->id) }}" class="remove" onclick="return confirm('Are you sure you want to remove this item from the cart?');">
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
                        <div class="col-lg-7 col-sm-7 col-md-7">
                            @if($mainCart->coupon_id == null)
                            <form action="{{route('coupon-apply')}}" method="post">
                                @csrf
                                <div class="shopping-coupon-code">
                                    <input type="text" class="form-control" placeholder="Enter coupon code" name="code" id="code">
                                    <button type="submit" class="default-btn">Apply Coupon</button>
                                </div>
                            </form>
                            @else
                                <div class="shopping-coupon-code">
                                    <a href="{{ route('remove-coupon') }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove the Coupon?');">
                                        <i class="ri-close-circle-line"></i>
                                        Remove Coupon
                                    </a>

                                </div>
                            @endif
                        </div>
                        <div class="col-lg-5 col-sm-5 col-md-5">
                            <a href="cart.html" class="default-btn">Update Cart</a>
                        </div>
                    </div>
                </div>

            <div class="cart-totals">
                <h3>Cart Totals</h3>

                <ul>
                    <li class="d-flex justify-content-between align-items-center">Subtotal
                        <span>
                            @php
                                $subtotal = 0;
                                foreach ($carts as $item) {
                                    $subtotal += $item->product->price * $item->quantity;
                                }
                            @endphp
                            ${{ number_format($subtotal, 2) }}
                        </span>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">Discount
                        <span>
                            @if(optional($mainCart->coupon)->type == 1) <!-- Percentage -->
                                @php
                                    $discount = $subtotal * (optional($mainCart->coupon)->value / 100);
                                @endphp
                                -${{ number_format($discount, 2) }}
                                @elseif(optional($mainCart->coupon)->type == 2) <!-- Fixed discount -->
                                @php
                                    $discount = optional($mainCart->coupon)->value;
                                @endphp
                                -${{ number_format($discount, 2) }}
                                @else
                                    $0.00
                                @endif
                        </span>
                    </li>

                    <li class="d-flex justify-content-between align-items-center">Total
                        <span>
                        ${{ number_format($subtotal - ($discount ?? 0), 2) }}
                    </span>
                    </li>
                </ul>


                <a href="{{route('home.checkout')}}" class="default-btn">Proceed to Checkout</a>
            </div>
        </div>
    </div>
    <!-- End Cart Area -->
@endsection
