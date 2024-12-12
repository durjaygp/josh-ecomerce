@extends('website.master')
@section('title')
    Cart
@endsection
@section('content')



    <!--
			=============================================
				CheckOut Page
			==============================================
			-->
    <div class="checkout-section pt-200 pb-100 lg-pt-180 sm-pb-50">
        <div class="container">
            <div class="checkout-toggle-area mb-80 md-mb-60">
                <div class="card">
                    <p class="card-header">Already have an account? <button class="d-inline-block collapsed">Click here to login.</button></p>
                    <form action="#" id="login-form" class="collapse">
                        <p>Please enter your details below.</p>
                        <div class="row">
                            <div class="col-md-6"><input type="text" placeholder="User name or email"></div>
                            <div class="col-md-6"><input type="password" placeholder="Password"></div>
                        </div>

                        <button class="theme-btn-seven">Login</button>
                        <a href="#" class="lost-passw">Lost your Password?</a>
                    </form>
                </div>

                <div class="card">
                    <p class="card-header">Have a promo code? <button class="d-inline-block collapsed">Click to enter your code.</button></p>
                    <form action="#" id="promo-code" class="collapse">
                        <p>Please enter your promo code below.</p>
                        <input type="text" placeholder="Coupon code">
                        <button class="theme-btn-seven">Apply coupon</button>
                    </form>
                </div>
            </div> <!-- /.checkout-toggle-area -->
            <form action="#" class="checkout-form">
                <div class="row">
                    <div class="col-xl-6 col-lg-7">
                        <h2 class="main-title">Billign Details</h2>
                        <div class="user-profile-data">
                            <div class="row">
                                <div class="col-lg-6"><input type="text" placeholder="First Name*" class="single-input-wrapper"></div>
                                <div class="col-lg-6"><input type="text" placeholder="Last Name*" class="single-input-wrapper"></div>
                                <div class="col-12"><input type="text" placeholder="Company Name*" class="single-input-wrapper"></div>
                                <div class="col-12">
                                    <input type="text" placeholder="Company Name*" class="single-input-wrapper">
                                </div>
                                <div class="col-12"><input type="text" placeholder="Street Address*" class="single-input-wrapper"></div>
                                <div class="col-lg-4"><input type="text" placeholder="Town/City*" class="single-input-wrapper"></div>
                                <div class="col-lg-4"><input type="text" placeholder="State*" class="single-input-wrapper"></div>
                                <div class="col-lg-4"><input type="text" placeholder="Zip Code*" class="single-input-wrapper"></div>
                                <div class="col-lg-6"><input type="email" placeholder="Email Address*" class="single-input-wrapper"></div>
                                <div class="col-lg-6"><input type="number" placeholder="Phone Number*" class="single-input-wrapper"></div>
                                <div class="col-12">
                                    <ul class="checkbox-list style-none">
                                        <li>
                                            <input type="checkbox" id="new-account">
                                            <label for="new-account">Create Account?</label>
                                        </li>
                                        <li>
                                            <input type="checkbox" id="shipping">
                                            <label for="shipping">Ship to Different Address?</label>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-12">
                                    <div class="other-note-area">
                                        <p>Order Note (Optional)</p>
                                        <textarea></textarea>
                                    </div> <!-- /.other-note-area -->
                                </div>
                            </div> <!-- /.row -->
                        </div> <!-- /.user-profile-data -->
                    </div> <!-- /.col- -->

                    <div class="col-xxl-4 col-lg-5 ml-auto">
                        <div class="order-confirm-sheet md-mt-60">
                            <h2 class="main-title">Order Details</h2>
                            <div class="order-review">
                                <table class="product-review">
                                    <tbody>
                                    <tr>
                                        <th>
                                            <span>Bluthooth Speaker</span>
                                        </th>
                                        <td><span>$123.78</span></td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <span>Subtotal</span>
                                        </th>
                                        <td><span>$123.78</span></td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <span>Shipping</span>
                                        </th>
                                        <td><span>$5.00</span></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th><span>Total</span></th>
                                        <td><span>$128.00</span></td>
                                    </tr>
                                    </tfoot>
                                </table> <!-- /.product-review -->
                                <div class="payment-option">
                                    <ul class="payment-list style-none">
                                        <li>
                                            <input type="radio" name="paymenttype" value="directbank" checked="checked" class="payment-radio-button">
                                            <label>Direct Bank Transfer</label>
                                            <p>Make your payment directly into our account. Plase use your Order ID as payment reference.</p>
                                        </li>
                                        <li>
                                            <input type="radio" name="paymenttype" value="paypal" class="payment-radio-button">
                                            <label>PayPal</label>
                                        </li>
                                        <li>
                                            <input type="radio" name="paymenttype" value="creditCard" id="credit-card" class="payment-radio-button">
                                            <label>Credit Card</label>
                                        </li>
                                        <li class="credit-card-form">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h6>Card number</h6>
                                                    <input type="number">
                                                </div>
                                                <div class="col-8">
                                                    <h6>Expiry date</h6>
                                                    <div class="d-flex align-items-center">
                                                        <input type="number" placeholder="MM">
                                                        <span>/</span>
                                                        <input type="number" placeholder="YY">
                                                    </div>
                                                </div>
                                                <div class="col-4 ml-auto">
                                                    <h6>CVV</h6>
                                                    <input type="number">
                                                </div>
                                            </div>
                                        </li>
                                    </ul> <!-- /.payment-list -->
                                </div> <!-- /.payment-option -->
                                <p class="policy-text">Your personal data will be use for your order, support your experience through this website & for other purpose described in our privacy policy</p>
                                <div class="agreement-checkbox">
                                    <input type="checkbox" id="agreement">
                                    <label for="agreement">I have read and agree to the website terms and conditions*</label>
                                </div> <!-- /.agreement-checkbox -->

                                <button class="theme-btn-seven w-100">Place Order</button>
                            </div> <!-- /.order-review -->
                        </div> <!-- /.order-confirm-sheet -->
                    </div>
                </div> <!-- /.row -->
            </form> <!-- /.checkout-form -->
        </div> <!-- /.container -->
    </div> <!-- /.checkout-section -->


@endsection
