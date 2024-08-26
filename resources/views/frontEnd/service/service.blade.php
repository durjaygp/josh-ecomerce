@extends('frontEnd.master')
@section('title')
    {{ $service->title ?? ""}}
@endsection
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content text-center" data-aos="fade-center" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2 class="text-black">@yield('title')</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>Service</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Services Details Area -->
    <div class="services-details-area ptb-100">
        <div class="container">
            <div class="services-details-desc">
                <div class="article-services-image">
                    <img src="{{asset($service->image)}}" alt="image">
                </div>
                <div class="article-services-content">
                    <h3>{{ $service->title }}</h3>
                    <p>{!! $service->description !!}</p>
                    <p>{!! $service->main_content !!}</p>

                </div>

            </div>
        </div>

        <div class="services-details-shape">
            <img src="{{asset('homePage')}}/assets/images/services-details/line-shape.png" alt="image">

        </div>
    </div>
    <!-- End Services Details Area -->


@endsection
