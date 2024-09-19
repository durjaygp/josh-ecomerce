@extends('frontEnd.master')
@section('title')
    About Us
@endsection
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content text-center" data-aos="fade-center" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2 class="text-black">@yield('title')</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}" class="text-black">Home</a>
                    </li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

<!-- Start About Area -->
<div class="about-area border-none pt-100 pb-75">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12">
                <div class="about-wrap-image" data-tilt>
                    <img src="{{asset($about->image)}}" alt="image" data-aos="fade-down" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-wrap-content" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                    <div class="about-bg-text">ABOUT US</div>
                    <span>{{$about->header}}</span>
                    <h3>{{$about->title}} <span class="overlay"></span></h3>
                    <p><br></p><div class="blockquote-con"><div class="blockquote"><p class="bold">{!! $about->description !!}</p></div></div>
                    <div class="about-btn">
                        <a href="{{route('home.products')}}" class="default-btn"> Learn More </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="about-inner-box">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8">
                    <div class="single-about-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                        <p class="quo-ts">

                            {!! $about->main_content !!}
                        </p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="about-circle-shape">
        <img src="{{asset('homePage/about-circle.png')}}" alt="image">
    </div>
</div>
<!-- End About Area -->
@endsection
