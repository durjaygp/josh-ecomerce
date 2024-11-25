@extends('website.master')
@section('title','404')
@section('content')

        <div class="container">
            <div class="text-center">
                <h1>404</h1>
                <h2>Oops! That page can’t be found</h2>
                <div class="text">Sorry, but the page you are looking for does not existing</div>
                <a href="{{route('home')}}" class="theme-btn btn-style-one"><span class="txt">Go to home page</span></a>
            </div>
        </div>
@endsection
