@php
$setting = setting();
@endphp
@extends('website.master')
@section('title')
{{ $setting->name }}
@endsection
@section('content')

    @if($homepage->hero_section_status === "1")
        <div class="hero-banner-two">
            <div class="container">
                <div class="row align-items-start justify-content-between">
                    <div class="col-lg-6 order-lg-last">
                        <div class="illustration-holder">
                            <img src="{{asset($homepage->hero_section_image)}}" alt="" class="img-fluid illustration_01">
                        </div>
                    </div>

                    <div class="col-xl-5 col-lg-6 order-lg-first">
                        <div class="hero-text-wrapper md-mt-50">
                            @php
                                $heroTitleWords = explode(' ', $homepage->hero_section_title, 3);
                                $firstTwoWords = implode(' ', array_slice($heroTitleWords, 0, 2));
                                $remainingWords = isset($heroTitleWords[2]) ? substr($homepage->hero_section_title, strlen($firstTwoWords)) : '';
                            @endphp

                            <h1>
                            <span>
                                {{ $firstTwoWords }} <!-- First 2 words -->
                                <br>
                                <img src="{{asset('website/images/shape/line-shape-1.svg')}}" alt="" class="cs-screen">
                            </span>
                                {{ trim($remainingWords) }}
                            </h1>
                            <p class="sub-text">{{$homepage->hero_section_paragraph}}</p>
                            <a href="{{$homepage->hero_section_button_link}}" class="theme-btn-five">{{$homepage->hero_section_button_text}}</a>
                        </div> <!-- /.hero-text-wrapper -->
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.hero-banner-two -->
    @else

    @endif


    @if($homepage->about_section_status === "1")
    <div class="fancy-text-block-eight pt-150 pb-100 mt-20">
        <div class="container">
            <div class="title-style-two text-center md-mb-70">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 col-md-10 m-auto">
                        <h2>
                            {{$homepage->about_section_title}}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="block-style-six">
                <div class="row">
                    <div class="col-lg-5 aos-init aos-animate" data-aos="fade-right" data-aos-duration="1200">
                        <div class="text-details pt-35 md-pb-50">
                            <img src="{{asset('website/images/icon/27.svg')}}" alt=" {{$homepage->about_section_title}} {{$homepage->about_section_header}}" class="icon">
                            <h3 class="title font-gilroy-bold">{{$homepage->about_section_header}}</h3>
                            <p class="text-meta">{{$homepage->about_section_paragraph}}
                            </p>
                            <a href="{{$homepage->about_section_link}}" class="theme-btn-one">Read more</a>
                        </div> <!-- /.text-details -->
                    </div>

                    <div class="col-lg-7 col-md-9 m-auto aos-init aos-animate" data-aos="fade-left" data-aos-duration="1200">
                        <div class="illustration-holder illustration-one">
                            <img src="{{asset($homepage->about_section_image)}}" alt=" {{$homepage->about_section_title}} {{$homepage->about_section_header}}"  class="ml-auto">
                        </div>
                    </div>
                </div>
            </div> <!-- /.block-style-six -->

        </div>
    </div>
    @else

    @endif


    @if($homepage->service_section_status === "1")
    <div class="feature-blog-one blog-page-bg">
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <div class="container">
            <div class="text-center mb-4">
                <p class="mb-3">{{$homepage->service_section_title}}</p>
                <h2 class="title-style-two mb-3" style="font-weight: bold;">{{$homepage->service_section_header}}</h2>
                <p>
                    {{$homepage->service_section_paragraph}}
                </p>
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
                    <a href="{{$homepage->service_section_link}}"
                       style="background: var(--red-light);
                               width: 184px;
                               height: 50px;
                               border-radius: 5px;
                               text-align: center;
                               color: #fff;
                               font-size: 17px;
                               font-weight: 500;
                               transition: all 0.3s ease-in-out;
                               display: inline-flex;
                               justify-content: center;
                               align-items: center;"
                    > Explore All Services</a>
                </div>

            </div>

        </div>
    </div>
    @endif


    @if($homepage->review_section_status === "1")
    <!-- Client Feedback  -->
    <div class="client-feedback-slider-six mt-150 md-mt-120" id="feedback">
        <div class="inner-container mb-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <img src="{{asset('website/images/icon/100.svg')}}" alt="" class="m-auto">
                        <div class="title-style-seven text-center mt-20">
                            <h2>{{$homepage->review_section_header}}</h2>
                            <p>{{$homepage->review_section_paragraph}}</p>
                        </div> <!-- /.title-style-six -->
                    </div>
                </div>
            </div>

            <div class="container mt-2" style="margin-top: 20px;">
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($reviews as $row)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body">
                                    <h6 class="card-subtitle text-primary mb-2">{{ $row->subject }}</h6>
                                    <p class="card-text">
                                        {{ \Illuminate\Support\Str::limit($row->review, 141) }}
                                    </p>
                                    @if(strlen($row->review) > 141)
                                        <!-- Button to trigger modal -->
                                        <button class="btn btn-link text-primary p-0" data-bs-toggle="modal" data-bs-target="#reviewModal{{ $row->id }}">
                                            Read More
                                        </button>
                                    @endif
                                </div>
                                <div class="card-footer bg-transparent text-end">
                                    <div class="d-flex align-items-center">
                                        <img src="https://via.placeholder.com/50" alt="{{ $row->name }}" class="rounded-circle me-3" width="50" height="50">
                                        <div class="ml-1">
                                            <h5 class="card-title mb-0">{{ $row->name }}</h5>
                                            <small>Rating: <span class="text-warning">{{ str_repeat('★', $row->rating) }}</span></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for full review -->
                        <div class="modal fade" id="reviewModal{{ $row->id }}" tabindex="-1" aria-labelledby="reviewModalLabel{{ $row->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reviewModalLabel{{ $row->id }}">{{ $row->subject }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {!! $row->review !!}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div> <!-- /.inner-container -->
    </div>
    <!-- client-feedback -->
    @endif


    @if($homepage->faq_section_status === "1")
    <!-- Faq Classic -->
    <div class="faq-classic pt-225 md-pt-120">
        <div class="container">
            <div class="title-style-two text-center md-mb-70 mt-70 mb-70">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 col-md-10 m-auto">
                        <h2>
                            {{$homepage->faq_section_title}}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="title-style-one">
                        <h6 class="font-rubik">{{$homepage->faq_section_header}}</h6>
                        <h2>{{$homepage->faq_section_paragraph}}</h2>
                    </div> <!-- /.title-style-one -->
                    <a href="{{$homepage->faq_section_link}}" class="theme-btn-one mt-50 md-mt-30">Go to Faq</a>
                </div>
                <div class="col-lg-6">
                    <!-- ================== FAQ Panel ================ -->
                    <div id="accordion" class="md-mt-60">
                        @foreach($faqs as $index => $row)
                            <div class="card">
                                <div class="card-header" id="heading{{$row->id}}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse{{$row->id}}" aria-expanded="true" aria-controls="collapse{{$row->id}}">
                                            {{$row->question}}
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse{{$row->id}}" class="collapse @if($index == 0) show @endif" aria-labelledby="heading{{$row->id}}" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        <p>{!! $row->answer !!}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div> <!-- /.col- -->
            </div>
        </div>
    </div> <!-- /.faq-classic -->
    @endif

    @if($homepage->blog_section_status === "1")
    {{--    Latest Blog--}}
    <div class="feature-blog-one blog-page-bg">
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="title-style-two mb-3" style="font-weight: bold;">{{$homepage->blog_section_title}}</h2>
            </div>

            <!-- Services Section -->
            <div class="row">
                @foreach($latestBlogs as $service)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                        <div class="post-meta">
                            <img src="{{ asset($service->image) }}" alt="{{ $service->title }}" class="image-meta">
                            <h3>
                                <a href="{{ route('home.blog', $service->slug) }}" class="title">
                                    {{ $service->name }}
                                </a>
                            </h3>
                            <p>{{ Str::limit($service->description, 100) }}</p>
                            <a href="{{ route('home.blog', $service->slug) }}" class="read-more d-flex justify-content-between align-items-center">
                                <span>Read More</span>
                                <i class="flaticon-right-arrow"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="text-center">
                <div class="text-center mt-4">
                    <a href="{{$homepage->blog_section_link}}"
                       style="background: var(--red-light);
                               width: 184px;
                               height: 50px;
                               border-radius: 5px;
                               text-align: center;
                               color: #fff;
                               font-size: 17px;
                               font-weight: 500;
                               transition: all 0.3s ease-in-out;
                               display: inline-flex;
                               justify-content: center;
                               align-items: center;"
                    > Explore All Blogs</a>
                </div>

            </div>

        </div>
    </div>
    @endif


@endsection
