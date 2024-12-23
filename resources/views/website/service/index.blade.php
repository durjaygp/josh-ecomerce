@extends('website.master')
@section('title')
    Products
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
    @php
        $homepage = \App\Models\HomepageSetting::find(1);
    @endphp

    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10 m-auto">
                    <h2 class="font-rubik">{{$homepage->service_section_title}}</h2>
                    <p class="pt-10">{{$homepage->service_section_paragraph}}</p>
                </div>
            </div>
        </div>
    </div>




    <div class="feature-blog-one blog-page-bg">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="title-style-two mb-3" style="font-weight: bold;">{{$homepage->service_section_header}}</h2>
            </div>

            <!-- Services Section -->
            <div class="row">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                        <div class="post-meta">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="image-meta">
                            <h3>
                                <a href="{{ route('service.details', $service->slug) }}" class="title">
                                    {{ $service->title }}
                                </a>
                            </h3>
                            <p>{{ Str::limit($service->description, 100) }}</p>
                            <a href="{{ route('service.details', $service->slug) }}" class="read-more d-flex justify-content-between align-items-center">
                                <span>Read More</span>
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center">
                <div class="text-center mt-4">
                    <div class="page-pagination-one pt-15">
                        <ul class="d-flex align-items-center">
                            {{-- Previous Page Link --}}
                            @if ($services->onFirstPage())
                                <li class="disabled"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>
                            @else
                                <li><a href="{{ $services->previousPageUrl() }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                            @endif

                            {{-- Pagination Elements --}}
                            @foreach ($services->getUrlRange(1, $services->lastPage()) as $page => $url)
                                @if ($page == $services->currentPage())
                                    <li><a href="#" class="active">{{ $page }}</a></li>
                                @elseif ($page == 1 || $page == $services->lastPage() || abs($page - $services->currentPage()) < 2)
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @elseif ($loop->first || $loop->last)
                                    <li> &nbsp; ... &nbsp;</li>
                                @endif
                            @endforeach

                            {{-- Next Page Link --}}
                            @if ($services->hasMorePages())
                                <li><a href="{{ $services->nextPageUrl() }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            @else
                                <li class="disabled"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                            @endif
                        </ul>
                    </div>
                </div>

            </div>

        </div>
    </div>


@endsection
