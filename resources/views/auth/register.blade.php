@php
    $setting = setting();
@endphp
@extends('website.master')
@section('title')
    Register Now | {{ $setting->name }}
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">

            </div>
            <div class="col-md-8">
                <div class="form-wrapper">

                    <form action="{{route('register')}}" class="user-data-form mt-30" method="post" enctype="multipart/form-data">
                        @csrf
                        <h2>Create your account</h2>

                        <p class="header-info pt-30 pb-50">Already have an account?  <a href="{{route('login')}}">Login</a></p>

                        <div class="row">
                            <div class="col-12">
                                <div class="input-group-meta mb-50">
                                    <label>Full Name</label>
                                    <input type="text" placeholder="Melvin Carlson" name="name">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-meta mb-50">
                                    <label>Email</label>
                                    <input type="email" placeholder="example@mail.com" name="email">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-meta mb-50">
                                    <label>Password</label>
                                    <input type="password" placeholder="Enter Password" class="pass_log_id" name="password">
                                    <span class="placeholder_icon"><span class="passVicon"><img src="{{asset('website/images/icon/view.svg')}}" alt=""></span></span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="input-group-meta mb-15">
                                    <label>Re-type Password</label>
                                    <input type="password" placeholder="Enter Password" class="pass_log_id" name="password_confirmation">
                                    <span class="placeholder_icon"><span class="passVicon"><img src="{{asset('website/images/icon/view.svg')}}" alt=""></span></span>
                                </div>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="theme-btn-one mt-30 mb-50">Sign Up</button>
                            </div>


                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>


@endsection
