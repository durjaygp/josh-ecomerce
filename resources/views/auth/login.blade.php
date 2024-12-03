{{-- <x-guest-layout>--}}
{{--    <!-- Session Status -->--}}
{{--    <x-auth-session-status class="mb-4" :status="session('status')" />--}}

{{--    <form method="POST" action="{{ route('login') }}">--}}
{{--        @csrf--}}

{{--        <!-- Email Address -->--}}
{{--        <div>--}}
{{--            <x-input-label for="email" :value="__('Email')" />--}}
{{--            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />--}}
{{--            <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Password -->--}}
{{--        <div class="mt-4">--}}
{{--            <x-input-label for="password" :value="__('Password')" />--}}

{{--            <x-text-input id="password" class="block w-full mt-1"--}}
{{--                            type="password"--}}
{{--                            name="password"--}}
{{--                            required autocomplete="current-password" />--}}

{{--            <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--        </div>--}}

{{--        <!-- Remember Me -->--}}
{{--        <div class="block mt-4">--}}
{{--            <label for="remember_me" class="inline-flex items-center">--}}
{{--                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">--}}
{{--                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>--}}
{{--            </label>--}}
{{--        </div>--}}

{{--        <div class="flex items-center justify-end mt-4">--}}
{{--            @if (Route::has('password.request'))--}}
{{--                <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">--}}
{{--                    {{ __('Forgot your password?') }}--}}
{{--                </a>--}}
{{--            @endif--}}

{{--            <x-primary-button class="ms-3">--}}
{{--                {{ __('Log in') }}--}}
{{--            </x-primary-button>--}}
{{--        </div>--}}
{{--    </form>--}}
{{-- </x-guest-layout>--}}


{{--@extends('frontEnd.master')--}}
{{--@section('title')--}}
{{-- Login--}}
{{--@endsection--}}
{{--@section('content')--}}
{{--    <div class="login-page-container py-5">--}}
{{--        <div class="login-page">--}}
{{--            <div class="form login-form" style="max-width: 500px;">--}}
{{--                <form class="register-form_ text-center" method="post" action="{{route('register')}}" style="display: none">--}}
{{--                    @csrf--}}
{{--                    <h2 class="form-title">Register Now</h2>--}}
{{--                    <p>CREATE YOUR ACCOUNT</p>--}}
{{--                    <div class="form-group">--}}
{{--                        <input class="form-control" type="text" name="name" placeholder="name"/>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <input class="form-control" type="text" name="email" placeholder="email address"/>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <input class="form-control" type="password" name="password" placeholder="password"/>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <input class="form-control" type="password" name="confirm_password" placeholder="confirm password"/>--}}
{{--                    </div>--}}

{{--                    <button class="btn default-btn" type="submit">Create</button>--}}
{{--                    <p class="message mt-3">Already registered? <a href="#">Sign In</a></p>--}}
{{--                </form>--}}

{{--                <form method="POST" class="text-center" action="{{route('login')}}">--}}
{{--                    @csrf--}}
{{--                    <h2 class="form-title">WELCOME BACK</h2>--}}
{{--                    <p>Please login to continue.</p>--}}
{{--                    <div class="form-group">--}}
{{--                        <input class="form-control" type="email" name="email" placeholder="email"/>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <input class="form-control" type="password" name="password" placeholder="password"/>--}}
{{--                    </div>--}}

{{--                    <button type="submit" class="btn default-btn">Login</button>--}}
{{--                    <p class="message mt-3">Not registered? <a href="{{route('register')}}">Create an account</a></p>--}}
{{--                    <p class="" style="margin: 15px 0 0;color: #b3b3b3;font-size: 12px;">Forget password? <a href="{{url('forgot-password')}}">Reset</a></p>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}


@php
    $setting = \App\Models\Setting::first();
@endphp

    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services, sass, software company">
    <meta name="description" content="Deski is a creative saas and software html template designed for saas and software Agency websites.">
    <meta property="og:site_name" content="deski">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Deski: creative saas and software html template">
    <meta name='og:image' content='images/assets/ogg.png'>
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For Window Tab Color -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#7034FF">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#7034FF">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#7034FF">
    <title>Deski-Saas & Software HTML Template</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('website')}}/images/fav-icon/icon.png">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('website')}}/css/style.css">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('website')}}/css/responsive.css">

    <!-- Fix Internet Explorer ______________________________________-->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="{{asset('website')}}/vendor/html5shiv.js"></script>
    <script src="{{asset('website')}}/vendor/respond.js"></script>
    <![endif]-->
</head>

<body>
<div class="main-page-wrapper p0">
    <!-- ===================================================
        Loading Transition
    ==================================================== -->

    <!--
    =============================================
        Sign In
    ==============================================
    -->
    <div class="user-data-page clearfix d-lg-flex">
        <div class="illustration-wrapper d-flex align-items-center justify-content-between flex-column">
            <h3 class="font-rubik">Want your best managment <br>software? <a href="{{route('register')}}">sign up</a></h3>
        </div> <!-- /.illustration-wrapper -->

        <div class="form-wrapper">
            <div class="d-flex justify-content-between">
                <div class="logo"><a href="{{route('home')}}"><img src="{{asset($setting->website_logo)}}" alt="{{$setting->name}}"></a></div>
                <a href="{{route('home')}}" class="font-rubik go-back-button">Go to home</a>
            </div>
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
                            <span class="placeholder_icon"><span class="passVicon"><img src="images/icon/view.svg" alt=""></span></span>
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
                    <div class="col-12">
                        <p class="text-center font-rubik copyright-text">{{$setting->footer}}</p>
                    </div>
                </row>
            </form>
        </div> <!-- /.form-wrapper -->
    </div> <!-- /.user-data-page -->





    <!-- Optional JavaScript _____________________________  -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="{{asset('website/vendor/jquery.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('website')}}/vendor/popper.js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('website')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- menu  -->
    <script src="{{asset('website')}}/vendor/mega-menu/assets/js/custom.js"></script>
    <!-- AOS js -->
    <script src="{{asset('website')}}/vendor/aos-next/dist/aos.js"></script>
    <!-- js count to -->
    <script src="{{asset('website')}}/vendor/jquery.appear.js"></script>
    <script src="{{asset('website')}}/vendor/jquery.countTo.js"></script>

    <!-- MixIt Up -->
    <script src="{{asset('website')}}/vendor/mixitup-3/mixitup.min.js"></script>


    <!-- Theme js -->
    <script src="{{asset('website/js/theme.js')}}"></script>
</div> <!-- /.main-page-wrapper -->
</body>
</html>
