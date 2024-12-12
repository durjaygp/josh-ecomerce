@extends('website.master')
@section('title')
    {{ $service->title ?? ""}}
@endsection
@section('meta_tag')
    <meta name="description" content="{{$service->seo_description}}">
    <link rel="canonical" href="{{url('/')}}/service/{{$service->slug}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$service->title}}">
    <meta property="og:description" content="{{$service->seo_description}}">
    <meta property="og:tags" content="{{$service->seo_tags}}">
    <meta property="og:keywords" content="{{$service->seo_keywords}}">
    <meta property="og:url" content="{{url('/')}}/service/{{$service->slug}}">
    <meta property="og:site_name" content="{{ setting()->name ?? ""}}">
    <meta property="og:image" content="{{asset($service->image)}}">
    <meta property="og:image:secure_url" content="{{asset($service->image)}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{$service->name}}">
    <meta name="twitter:title" content="{{$service->name}}">
    <meta name="twitter:image" content="{{asset($service->image)}}">
@endsection
@section('content')
    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 m-auto">
                    <h2 class="font-rubik">{{$service->title}}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-page-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 feature-blog-one width-lg blog-details-post-v1">
                    <div class="post-meta">
                        <img src="{{asset($service->image)}}" alt="{{$service->name}}" class="image-meta">
                        <div class="tag">{{$service->created_at->format('M d, Y')}}</div>
                        <h3 class="title">{{$service->name}}</h3>
                        <p>{!! $service->description !!}</p>
                        <p style="margin-bottom: 200px;">{!! $service->main_content !!}</p>
                    </div>


                </div>
            </div>
        </div>
    </div>


@endsection

