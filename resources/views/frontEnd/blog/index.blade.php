@extends('frontEnd.master')
@section('title')
    Blog
@endsection
@section('meta_tag')
    <meta name="description" content="{{setting()->description ?? ""}}">
    <meta name="keywords" content="{{setting()->keywords ?? ""}}">
    <meta property="og:title" content="{{setting()->name ?? ""}}">
    <meta property="og:type" content="Blog" />
    <meta property="og:description" content="{{setting()->description ?? ""}}" />
    <meta property="og:url" content="{{url('/')}}">

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="{{setting()->name ?? ""}}" />
    <meta name="twitter:description" content="{{setting()->description ?? ""}}" />
    <meta name="twitter:url" content="{{url('/')}}" />
    <meta name="twitter:card" content="{{asset(optional(setting())->website_logo)}}">
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
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

<!-- Start Blog Area -->
<div class="blog-area pt-100 pb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row justify-content-center">

                    @foreach($blogs as $row)
                        <div class="col-lg-6 col-md-6">
                            <div class="single-blog-card">
                                <div class="blog-image">
                                    <a href="{{route('home.blog',$row->slug)}}"><img src="{{asset($row->image)}}" alt="{{$row->name}}"></a>

                                    <div class="date">{{$row->created_at->format('d M Y')}}</div>
                                </div>
                                <div class="blog-content">
                                    <h3>
                                        <a href="{{route('home.blog',$row->slug)}}">{{$row->name}}</a>
                                    </h3>
                                    <p>{{\Illuminate\Support\Str::limit($row->description,102)}}</p>
                                    <a href="{{route('home.blog',$row->slug)}}" class="blog-btn">Read More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                {{ $blogs->links('frontEnd.inc.blogPaginate') }}
                            </div>
                        </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-12">
                @include('frontEnd.inc.blogSidebar')
            </div>
        </div>
    </div>
</div>
<!-- End Blog Area -->
@endsection
