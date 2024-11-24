@extends('frontEnd.master')
@section('title')
    {{ $service->title ?? ""}}
@endsection
@section('meta_tag')
    <meta name="description" content="{{$service->seo_description}}">
    <link rel="canonical" href="{{url('/')}}/details/{{$service->slug}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$service->name}}">
    <meta property="og:description" content="{{$service->seo_description}}">
    <meta property="og:tags" content="{{$service->seo_tags}}">
    <meta property="og:keywords" content="{{$service->seo_keywords}}">
    <meta property="og:url" content="{{url('/')}}/blog/{{$service->slug}}">
    <meta property="og:site_name" content="{{ setting()->name ?? ""}}">
    <meta property="og:image" content="{{asset($service->image)}}">
    <meta property="og:image:secure_url" content="{{asset($service->image)}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{$service->name}}">
    <meta name="twitter:title" content="{{$service->name}}">
    <meta name="twitter:image" content="{{asset($service->image)}}">
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
