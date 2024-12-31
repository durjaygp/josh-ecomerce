@php
    $setting = setting();
@endphp
@extends('website.master')
@section('title')
    Login | {{ $setting->name }}
@endsection
@section('content')
    <div class="container">
    <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="form-wrapper">

                    <form action="{{route('login')}}" class="user-data-form mt-80 md-mt-40" method="POST">
                        <h2>Hi buddy, welcome <br> Back!</h2>
                        <p class="header-info pt-30 pb-50">Still don't have an account? <a href="{{route('register')}}">Sign up</a></p>

                        <row class="row">
                            @csrf
                            <div class="col-12">
                                <div class="input-group-meta mb-80 sm-mb-70">
                                    <label>Email</label>
                                    <input type="email" name="email" placeholder="example@mail.com">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-meta mb-15">
                                    <label>Password</label>
                                    <input type="password" name="password" placeholder="Enter Password" class="pass_log_id">
                                    <span class="placeholder_icon"><span class="passVicon"><img src="{{asset('website/images/icon/view.svg')}}" alt=""></span></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="agreement-checkbox d-flex justify-content-between align-items-center">
                                    <div>
                                        <input type="checkbox" id="remember">
                                        <label for="remember">Keep me logged in</label>
                                    </div>
                                    <a href="{{route('password.email')}}">Forget Password?</a>
                                </div> <!-- /.agreement-checkbox -->
                            </div>
                            <div class="col-12">
                                <button type="submit" class="theme-btn-one mt-50 mb-50">Login</button>
                            </div>
                        </row>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>


@endsection
