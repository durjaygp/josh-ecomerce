@extends('website.master')
@section('title')
    Checkout
@endsection
@section('content')

    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10 m-auto">
                    <h2 class="font-rubik">Checkout</h2>
                </div>
            </div>
        </div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>


        @endforeach
    @endif
    <!--  CheckOut Page -->
    <div class="checkout-section pb-100 lg-pt-180 sm-pb-50">
        <div class="container">
            <form action="{{ route('checkout.store') }}" method="get" class="checkout-form">
                @csrf
                <div class="row">
                    @if(auth()->check())
                        @php
                            $user = auth()->user();
                            $ship = \App\Models\Shiping::where('user_id',$user->id)->first();
                        @endphp
                    <div class="col-xl-6 col-lg-7">
                        <h2 class="main-title">Billing Details</h2>
                        <div class="user-profile-data">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="First Name*" name="first_name" class="single-input-wrapper" required value="{{$ship->first_name ?? ""}}">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Last Name*" name="last_name" class="single-input-wrapper" required value="{{$ship->last_name ?? ""}}">
                                </div>
                                <div class="col-12">
                                    <input type="text" placeholder="Company Name" name="company_name" class="single-input-wrapper" value="{{$ship->company_name ?? ""}}">
                                </div>
                                <div class="col-12">
                                    <input type="text" name="address" placeholder="Street Address*" class="single-input-wrapper" required value="{{$ship->address ?? ""}}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Town/City*" name="town" class="single-input-wrapper" required value="{{$ship->town ?? ""}}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="State*" name="state" class="single-input-wrapper" value="{{$ship->state ?? ""}}">
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" placeholder="Zip Code*" name="postal_code" class="single-input-wrapper" required value="{{$ship->postal_code ?? ""}}">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email Address*" name="email" class="single-input-wrapper" required value="{{$ship->email ?? ""}}">
                                </div>
                                <div class="col-lg-6">
                                    <input type="number" placeholder="Phone Number*" name="phone" class="single-input-wrapper" required value="{{$ship->phone ?? ""}}">
                                </div>
                                <div class="col-12">
                                    <div class="other-note-area">
                                        <p>Order Note (Optional)</p>
                                        <textarea name="details"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="col-xl-6 col-lg-7">
                            <h2 class="main-title">Billing Details</h2>
                            <div class="user-profile-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="First Name*" name="first_name" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="text" placeholder="Last Name*" name="last_name" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-12">
                                        <input type="text" placeholder="Company Name" name="company_name" class="single-input-wrapper">
                                    </div>
                                    <div class="col-12">
                                        <input type="text" name="address" placeholder="Street Address*" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="Town/City*" name="town" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="State*" name="state" class="single-input-wrapper">
                                    </div>
                                    <div class="col-lg-4">
                                        <input type="text" placeholder="Zip Code*" name="postal_code" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="email" placeholder="Email Address*" name="email" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-lg-6">
                                        <input type="password" placeholder="Password*" name="password" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <input type="number" placeholder="Phone Number*" name="phone" class="single-input-wrapper" required>
                                    </div>
                                    <div class="col-12">
                                        <div class="other-note-area">
                                            <p>Order Note (Optional)</p>
                                            <textarea name="details"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-xxl-4 col-lg-5 ml-auto">
                        <div class="order-confirm-sheet md-mt-60">
                            <h2 class="main-title">Order Details</h2>
                            <div class="order-review">
                                <table class="product-review">
                                    <tbody>
                                    @foreach($carts as $row)
                                        <tr>
                                            <th>
                                                <span><a href="{{ route('home.product', $row['slug']) }}">{{ $row['name'] }} X {{ $row['quantity'] }}</a></span>
                                            </th>
                                            <td><span>$ {{ number_format($row['total_price'], 2) }}</span></td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <th>
                                            <span> Discount </span>
                                        </th>
                                        <td><span>
                                            @if($discount > 0)
                                                    -${{ number_format($discount, 2) }}
                                                @else
                                                    $0.00
                                                @endif
                                        </span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><span>Total</span></th>
                                        <td><span>${{ number_format($subtotal - $discount, 2) }}</span></td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="payment-option">
                                    <ul class="payment-list style-none">
                                        <li>
                                            <input type="radio" name="radioGroup" id="paypal" value="1" class="payment-radio-button" required>
                                            <label for="paypal">PayPal</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="radioGroup" value="2"  id="credit-card" class="payment-radio-button" required>
                                            <label for="credit-card">Stripe</label>
                                        </li>
                                        <li class="credit-card-form">
                                            <div class="row" id="payment-form">
                                                <div class="col-md-12">
                                                    <div class="form-row">

                                                        <div id="card-element" class="form-control">
                                                            <!-- A Stripe Element will be inserted here. -->
                                                        </div>
                                                        <!-- Used to display form errors. -->
                                                        <div id="card-errors" role="alert" class="text-danger mt-2"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <button type="submit" class="theme-btn-seven w-100">Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('style')
    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('script')
    <script type="text/javascript">
        // Create a Stripe client.
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');

        // Create an instance of Elements.
        var elements = stripe.elements();

        // Create an instance of the card Element.
        var card = elements.create('card');

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        // Toggle Stripe card form visibility and validation
        document.querySelectorAll('.payment-radio-button').forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                const stripeForm = document.querySelector('.credit-card-form');
                const isStripeSelected = document.getElementById('credit-card').checked;

                if (isStripeSelected) {
                    stripeForm.style.display = 'block';
                    card.mount('#card-element'); // Ensure the card element is mounted
                } else {
                    stripeForm.style.display = 'none';
                    card.unmount(); // Unmount card element to avoid unnecessary validations
                }
            });
        });

        // Handle form submission.
        var checkoutForm = document.querySelector('.checkout-form');
        checkoutForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const isStripeSelected = document.getElementById('credit-card').checked;

            if (isStripeSelected) {
                // Create the Stripe token.
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.token);
                    }
                });
            } else {
                // Submit the form directly for PayPal
                checkoutForm.submit();
            }
        });

        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
            var form = document.querySelector('.checkout-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);

            // Submit the form
            form.submit();
        }
    </script>

    {{--    <script type="text/javascript">--}}
{{--        // Create a Stripe client.--}}
{{--        var stripe = Stripe('{{ env('STRIPE_KEY') }}');--}}

{{--        // Create an instance of Elements.--}}
{{--        var elements = stripe.elements();--}}

{{--        // Create an instance of the card Element.--}}
{{--        var card = elements.create('card');--}}

{{--        // Add an instance of the card Element into the `card-element` <div>.--}}
{{--        card.mount('#card-element');--}}

{{--        // Handle real-time validation errors from the card Element.--}}
{{--        card.on('change', function(event) {--}}
{{--            var displayError = document.getElementById('card-errors');--}}
{{--            if (event.error) {--}}
{{--                displayError.textContent = event.error.message;--}}
{{--            } else {--}}
{{--                displayError.textContent = '';--}}
{{--            }--}}
{{--        });--}}

{{--        // Handle form submission.--}}
{{--        var checkoutForm = document.querySelector('.checkout-form');--}}
{{--        checkoutForm.addEventListener('submit', function(event) {--}}
{{--            event.preventDefault();--}}

{{--            // Create the Stripe token.--}}
{{--            stripe.createToken(card).then(function(result) {--}}
{{--                if (result.error) {--}}
{{--                    // Inform the user if there was an error.--}}
{{--                    var errorElement = document.getElementById('card-errors');--}}
{{--                    errorElement.textContent = result.error.message;--}}
{{--                } else {--}}
{{--                    // Send the token to your server.--}}
{{--                    stripeTokenHandler(result.token);--}}
{{--                }--}}
{{--            });--}}
{{--        });--}}

{{--        // Submit the form with the token ID.--}}
{{--        function stripeTokenHandler(token) {--}}
{{--            var form = document.querySelector('.checkout-form');--}}
{{--            var hiddenInput = document.createElement('input');--}}
{{--            hiddenInput.setAttribute('type', 'hidden');--}}
{{--            hiddenInput.setAttribute('name', 'stripeToken');--}}
{{--            hiddenInput.setAttribute('value', token.id);--}}
{{--            form.appendChild(hiddenInput);--}}

{{--            // Submit the form--}}
{{--            form.submit();--}}
{{--        }--}}
{{--    </script>--}}

@endsection
