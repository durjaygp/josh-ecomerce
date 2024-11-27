{{--@extends('frontEnd.master')--}}
{{--@section('title')--}}
{{--    Checkout--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    <!-- Start Page Banner Area -->--}}
{{--    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>--}}
{{--        <div class="container">--}}
{{--            <div class="page-banner-content text-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">--}}
{{--                <h2 class="text-black">@yield('title')</h2>--}}
{{--                <ul>--}}
{{--                    <li>--}}
{{--                        <a href="{{route('home')}}">Home</a>--}}
{{--                    </li>--}}
{{--                    <li>Checkout</li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End Page Banner Area -->--}}

{{--    <!-- Start Checkout Area -->--}}
{{--    <div class="checkout-area ptb-100">--}}
{{--        <div class="container">--}}

{{--            <form action="{{route('checkout.store')}}" method="post">--}}
{{--                @csrf--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-7 col-md-6">--}}
{{--                        <div class="billing-details">--}}
{{--                            <h3 class="title">Billing Details</h3>--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>First Name <span class="required">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="first_name" value="{{ old('first_name', $ship->first_name?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Last Name <span class="required">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $ship->last_name?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Company Name</label>--}}
{{--                                        <input type="text" class="form-control" name="company_name" value="{{ old('company_name', $ship->company_name?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Address <span class="required">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="address" value="{{ old('address', $ship->address?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Town / City <span class="required">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="town" value="{{ old('town', $ship->town?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>State / County <span class="required">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="state" value="{{ old('state', $ship->state?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Postcode / Zip <span class="required">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="postal_code" value="{{ old('postal_code', $ship->postal_code?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Email Address <span class="required">*</span></label>--}}
{{--                                        <input type="email" class="form-control" name="email" value="{{ old('email', $ship->email?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-6 col-md-6">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <label>Phone <span class="required">*</span></label>--}}
{{--                                        <input type="text" class="form-control" name="phone" value="{{ old('phone', $ship->phone?? "") }}">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <div class="col-lg-12 col-md-12">--}}
{{--                                    <div class="form-group">--}}
{{--                                        <textarea name="details" id="notes" cols="30" rows="5" placeholder="Order Notes" class="form-control">{{ old('details', $ship->details ?? "") }}</textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-lg-5 col-md-6">--}}
{{--                        <div class="order-details">--}}
{{--                            <h3 class="title">Your Order</h3>--}}

{{--                            <div class="order-table table-responsive">--}}
{{--                                <table class="table table-bordered">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th scope="col">Product Name</th>--}}
{{--                                        <th scope="col">Total</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}

{{--                                    <tbody>--}}
{{--                                    @foreach($carts as $row)--}}
{{--                                        <tr>--}}
{{--                                            <td class="product-name">--}}
{{--                                                <a href="{{route('home.product',$row->product?->slug)}}">{{ $row->product->name }} X {{ $row->quantity }}</a>--}}
{{--                                            </td>--}}

{{--                                            <td class="product-total">--}}
{{--                                                <span class="subtotal-amount">${{ $row->product->price * $row->quantity }}</span>--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}

{{--                                    <tr>--}}
{{--                                        <td class="order-subtotal">--}}
{{--                                            <span>Cart Subtotal</span>--}}
{{--                                        </td>--}}

{{--                                        <td class="order-subtotal-price">--}}
{{--                                            @php--}}
{{--                                                $subtotal = 0;--}}
{{--                                                foreach ($carts as $item) {--}}
{{--                                                $subtotal += $item->product->price * $item->quantity;--}}
{{--                                                }--}}
{{--                                            @endphp--}}
{{--                                            <span class="order-subtotal-amount">${{ number_format($subtotal, 2) }}</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}

{{--                                    <tr>--}}
{{--                                        <td class="order-shipping">--}}
{{--                                            <span>Discount</span>--}}
{{--                                        </td>--}}

{{--                                        <td class="shipping-price">--}}

{{--                                            <span>--}}
{{--                                                @if(optional($mainCart->coupon)->type == 1) <!-- Percentage -->--}}
{{--                                                @php--}}
{{--                                                    $discount = $subtotal * (optional($mainCart->coupon)->value / 100);--}}
{{--                                                @endphp--}}
{{--                                                -${{ number_format($discount, 2) }}--}}
{{--                                                @elseif(optional($mainCart->coupon)->type == 2) <!-- Fixed discount -->--}}
{{--                                                    @php--}}
{{--                                                        $discount = optional($mainCart->coupon)->value;--}}
{{--                                                    @endphp--}}
{{--                                                    -${{ number_format($discount, 2) }}--}}
{{--                                                @else--}}
{{--                                                    $0.00--}}
{{--                                                @endif--}}
{{--                                            </span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}

{{--                                    <tr>--}}
{{--                                        <td class="total-price">--}}
{{--                                            <span>Order Total</span>--}}
{{--                                        </td>--}}

{{--                                        <td class="product-subtotal">--}}
{{--                                            <span class="subtotal-amount"> ${{ number_format($subtotal - ($discount ?? 0), 2) }}</span>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}

{{--                            <div class="payment-box">--}}
{{--                                <div class="payment-method">--}}
{{--                                    <p>--}}
{{--                                        <input type="radio" id="paypal" name="radioGroup" value="1" required>--}}
{{--                                        <label for="paypal">PayPal</label>--}}
{{--                                    </p>--}}

{{--                                    <p>--}}
{{--                                        <input type="radio" id="stripe" name="radioGroup" value="2" required>--}}
{{--                                        <label for="stripe">Stripe</label>--}}
{{--                                    </p>--}}

{{--                                    <p>--}}
{{--                                        <input type="radio" id="cash-on-delivery" name="radio-group">--}}
{{--                                        <label for="cash-on-delivery">Cash on Delivery</label>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <button type="submit" style="border: none;" class="default-btn">--}}
{{--                                    <span>Place Order</span>--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- End Checkout Area -->--}}
{{--@endsection--}}

@extends('frontEnd.master')
@section('title')
    Checkout
@endsection
@section('content')

    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content text-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2 class="text-black">@yield('title')</h2>
                <ul>
                    <li>
                        <a href="{{ route('home') }}">Home</a>
                    </li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Checkout Area -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <form action="{{ route('checkout.store') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-7 col-md-6">
                        <div class="billing-details">
                            <h3 class="title">Billing Details</h3>
                            <div class="row">
                                @foreach(['first_name', 'last_name', 'company_name', 'address', 'town', 'state', 'postal_code', 'email', 'phone'] as $field)
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <label>{{ ucfirst(str_replace('_', ' ', $field)) }} <span class="required">*</span></label>
                                            <input type="text" class="form-control" name="{{ $field }}" value="{{ old($field, $ship->$field ?? '') }}">
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="details" id="notes" cols="30" rows="5" placeholder="Order Notes" class="form-control">{{ old('details', $ship->details ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-6">
                        <div class="order-details">
                            <h3 class="title">Your Order</h3>
                            <div class="order-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">Product Name</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $subtotal = 0;
                                        foreach ($carts as $row) {
                                            $subtotal += $row['total_price'];
                                        }

                                        // Calculate discount
                                        $discount = 0;
                                        if(optional($coupon)->type == 1) { // Percentage
                                            $discount = $subtotal * (optional($coupon)->value / 100);
                                        } elseif(optional($coupon)->type == 2) { // Fixed discount
                                            $discount = optional($coupon)->value;
                                        }
                                    @endphp

                                    @foreach($carts as $row)
                                        <tr>
                                            <td class="product-name">
                                                <a href="{{ route('home.product', $row['slug']) }}">{{ $row['name'] }} X {{ $row['quantity'] }}</a>
                                            </td>
                                            <td class="product-total">
                                                <span class="subtotal-amount">${{ number_format($row['total_price'], 2) }}</span>
                                            </td>
                                        </tr>
                                    @endforeach

                                    <tr>
                                        <td class="order-subtotal">
                                            <span>Cart Subtotal</span>
                                        </td>
                                        <td class="order-subtotal-price">
                                            <span class="order-subtotal-amount">${{ number_format($subtotal, 2) }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="order-shipping">
                                            <span>Discount</span>
                                        </td>
                                        <td class="shipping-price">
                                            <span>
                                                @if($discount > 0)
                                                    -${{ number_format($discount, 2) }}
                                                @else
                                                    $0.00
                                                @endif
                                            </span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="total-price">
                                            <span>Order Total</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">${{ number_format($subtotal - $discount, 2) }}</span>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="payment-box">
                                <div class="payment-method">
                                    <p>
                                        <input type="radio" id="paypal" name="payment_method" value="paypal" required>
                                        <label for="paypal">PayPal</label>
                                    </p>
                                    <p>
                                        <input type="radio" id="stripe" name="payment_method" value="stripe" required>
                                        <label for="stripe">Stripe</label>
                                    </p>
                                </div>
                                <button type="submit" class="default-btn" style="border: none;">
                                    <span>Place Order</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Checkout Area -->
@endsection

