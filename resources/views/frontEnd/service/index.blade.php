@extends('frontEnd.master')
@section('title')
    Services
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

<!-- Start Services Area -->
<div class="services-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>SERVICES</span>
            <h2>We Provide the Best Quality <b>Services</b> <span class="overlay"></span></h2>
            <p>We are technology solutions providing company all over the world doing over 40 years. lorem ipsum dolor sit amet.</p>
        </div>

        <div class="row justify-content-center">
            @foreach($services as $row)
                <div class="col-lg-4 col-md-6">
                    <div class="services-item">
                        <div class="services-image">
                            <a href="{{route('service.details',$row->slug)}}"><img src="{{asset($row->image)}}" alt="{{$row->title}}"></a>
                        </div>
                        <div class="services-content">
                            <h3>
                                <a href="{{route('service.details',$row->slug)}}">{{$row->title}}</a>
                            </h3>
                            <p>{{\Illuminate\Support\Str::limit($row->description,60)}}</p>
                            <a href="{{route('service.details',$row->slug)}}" class="services-btn">View More</a>
                        </div>
                    </div>
                </div>
            @endforeach
                <div class="text-center">
                    <div class="col-lg-12 col-md-12 d-flex justify-content-center">
                        <div class="pagination-area">
                            {{ $services->links('frontEnd.inc.blogPaginate') }}
                        </div>
                    </div>
                </div>

        </div>
    </div>

    <div class="services-shape-1">
        <img src="assets/images/services/services-shape-1.png" alt="image">
    </div>
    <div class="services-shape-2">
        <img src="assets/images/services/services-shape-2.png" alt="image">
    </div>
</div>
<!-- End Services Area -->
@endsection
