@extends('user.master')
@section('title')
    Dashobard
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-center mb-7">
                                    <div class="rounded-circle overflow-hidden me-6">
                                        <img src="{{asset('back')}}/assets/images/profile/user-1.jpg" alt="" width="40" height="40">
                                    </div>
                                    <h5 class="fw-semibold mb-0 fs-5">Welcome back {{auth()->user()->name}}!</h5>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="welcome-bg-img mb-n7 text-end">
                                    <img src="{{asset('back')}}/assets/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
@endsection
