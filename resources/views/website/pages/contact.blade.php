@extends('website.master')
@section('title')
    Contact Us
@endsection
@section('content')
    <!--
    =============================================
         Hero
    ==============================================
    -->
    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-11 m-auto">
                    <div class="page-title">Contact us</div>
                    <h2 class="font-rubik">Feel free to contact us or just say hi!</h2>
                </div>
            </div>
        </div>


    </div> <!-- /.fancy-hero-one -->



    <!--
    =============================================
        Contact Us Light
    ==============================================
    -->
    <div class="contact-us-light pt-140 pb-200 md-pt-90 md-pb-80">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 col-sm-6">
                    <div class="address-info">
                        <div class="icon"><img src="{{asset('website')}}/images/icon/15.svg" alt=""></div>
                        <div class="title">Location</div>
                        @php
                            $servies = App\Models\Service::where('status',1)->get();
                            $setting = setting();
                        @endphp
                        <p class="font-rubik">{{$setting->address}}</p>
                    </div> <!-- /.address-info -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="address-info">
                        <div class="icon"><img src="{{asset('website')}}/images/icon/16.svg" alt=""></div>
                        <div class="title">Contact</div>
                        <p class="font-rubik">{{$setting->email}} <br>{{$setting->phone}}</p>
                    </div> <!-- /.address-info -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="address-info">
                        <div class="icon"><img src="{{asset('website')}}/images/icon/17.svg" alt=""></div>
                        <div class="title">Social Media</div>
                        <p class="font-rubik">Follow on social media</p>
                        <ul class="d-flex justify-content-center">
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> <!-- /.address-info -->
                </div>
            </div>

            <div class="form-style-light">
                <form id="contact-form" action="{{route('contact.save')}}"  method="post" data-toggle="validator">
                    @csrf
                    <div class="messages"></div>
                    <div class="row controls">
                        <div class="col-md-6">
                            <div class="input-group-meta form-group mb-35">
                                <label>Name</label>
                                <input type="text" placeholder="Michel" name="name" required="required" data-error="Name is required.">
                                <span class="placeholder_icon valid-sign"><img src="{{asset('website')}}/images/icon/18.svg" alt=""></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-group-meta form-group mb-35">
                                <label>Your Email</label>
                                <input type="email" placeholder="gobapubo@jogi.net" name="email" required="required" data-error="Valid email is required.">
                                <span class="placeholder_icon valid-sign"><img src="{{asset('website')}}/images/icon/18.svg" alt=""></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group-meta form-group mb-35">
                                <label>Your Phone</label>
                                <input type="number" placeholder="Phone number" name="phone" required="required" data-error="Valid Phone is required.">
                                <span class="placeholder_icon valid-sign"><img src="{{asset('website')}}/images/icon/18.svg" alt=""></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group-meta form-group mb-35">
                                <label>Please select service</label>
                                <select name="service" class="form-control" required data-error="Please select service" data-error="Valid Service is required.">
                                    <option value="">Select Service</option>
                                    @foreach ($servies as $row)
                                        <option value="{{$row->title}}">{{$row->title}}</option>
                                    @endforeach
                                </select>
                                <span class="placeholder_icon valid-sign"><img src="{{asset('website')}}/images/icon/18.svg" alt=""></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group-meta form-group lg mb-35">
                                <label>Your Message</label>
                                <textarea placeholder="Write your message here..." name="description" required="required" data-error="Please,leave us a message."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-12 mb-3 ">
                            <label for="mathgroup">Please solve the following math function: {{ app('mathcaptcha')->label() }}</label>
                            {!! app('mathcaptcha')->input(['class' => 'form-control', 'id' => 'mathgroup']) !!}
                            @if ($errors->has('mathcaptcha'))
                                <span class="help-block">
                                <strong>{{ $errors->first('mathcaptcha') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-12"><button class="theme-btn-one btn-lg">Send Message</button></div>
                    </div>
                </form>
            </div> <!-- /.form-style-light -->
        </div>
    </div> <!-- /.contact-us-light -->
@endsection
