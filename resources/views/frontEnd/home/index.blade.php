@php
 $setting = setting();
@endphp
@extends('frontEnd.master')
@section('title')
{{ $setting->name ?? "Home" }}
@endsection
@section('meta_tag')
    <meta name="description" content="{{$setting->description ?? ""}}">
    <meta name="keywords" content="{{$setting->keywords ?? ""}}">
    <meta property="og:title" content="{{$setting->name ?? ""}}">
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{$setting->description ?? ""}}" />
    <meta property="og:url" content="{{url('/')}}">

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="{{$setting->name ?? ""}}" />
    <meta name="twitter:description" content="{{$setting->description ?? ""}}" />
    <meta name="twitter:url" content="{{url('/')}}" />
    <meta name="twitter:card" content="{{asset(optional($setting)->website_logo)}}">
@endsection

@section('content')

    <!-- Start Main Slides Area -->
    <div class="main-slides-area">
        <div class="home-slides owl-carousel owl-theme">
            @foreach($sliders as $row)
            <div class="main-slides-item">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-md-12">
                            <div class="main-slides-content">
                                <span data-aos="fade-right" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">{{$row->upper_subtitle}}</span>
                                <h2 class="text-white mb-5" data-aos="fade-right" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">
                                    {{$row->title}} <span class="overlay"></span></h2>
                                <p data-aos="fade-right" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">
                                    {{$row->description}}</p>

                                <div class="slides-btn" data-aos="fade-right" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">
                                    <a href="{{route('register')}}" class="default-btn mb-5">Get Started</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-5 col-md-12" data-aos="fade-down" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">
                            <div class="main-slides-image" data-tilt>
                                <img src="{{asset($row->image)}}" alt="{{$row->title}}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <!-- End Main Slides Area -->

    <!-- Start Services Area -->
    <div class="services-area bg-with-14042C-color ptb-100">
        <div class="container">
            <div class="section-title">
                <span>OUR SERVICES</span>
                <h2>Solutions & Focus Areas <span class="overlay"></span></h2>
                <p>JSB-Tech LLC provides technology solutions and services to make your business run more efficiently and business-ready.</p>
            </div>

            <div class="overflow-hidden row justify-content-center" style="height:515px">
                @foreach($services as $row)
                    <div class="col-lg-4 col-md-6 h-100">
                        <div class="services-item h-100">
                            <div class="services-image">
                                <a href="{{route('service.details',$row->slug)}}">
                                    <img src="{{asset($row->image)}}" alt="{{$row->title}}"></a>
                            </div>
                            <div class="services-content">
                                <h3>
                                    <a href="{{route('service.details',$row->slug)}}">{{$row->title}}</a>
                                </h3>
                                <p>{!! \Illuminate\Support\Str::limit($row->description,60) !!}</p>
                                <a href="{{route('service.details',$row->slug)}}" class="services-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5 services-all-btn">
                <a href="{{route('home.services')}}" class="default-btn">Explore All Services</a>
            </div>
        </div>

        <div class="services-shape-1">
            <img src="{{asset('homePage')}}/assets/images/services/services-shape-1.png" alt="image">
        </div>
        <div class="services-shape-2">
            <img src="{{asset('homePage')}}/assets/images/services/services-shape-2.png" alt="image">
        </div>
    </div>
    <!-- End Services Area -->

    <!-- Start Projects Area -->

    <!-- End Projects Area -->

    <!-- Start Pricing Area -->

    <!-- End Pricing Area -->

    <!-- Start Testimonials Area -->
    <div class="testimonials-area ptb-100">
        <div class="container-fluid">
            <div class="section-title">
                <span>TESTIMONIALS</span>
                <h2>What <b>Our Clients</b> Say About Us <span class="overlay"></span></h2>
            </div>

            <div class="testimonials-slides owl-carousel owl-theme">
                @foreach($reviews as $review)
                    <div class="single-testimonials-card" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                        <p>{{ $review->review }}</p>

                        <div class="info-item-box">
                            <img src="{{ $review->image ? asset($review->image) : 'default_image_path' }}" class="rounded-circle" alt="{{ $review->subject }}">
                            <h4>{{ $review->name }}, <span>{{ $review->subject }}</span></h4>
                            <ul class="rating-list">
                                @for ($i = 1; $i <= 5; $i++)
                                    <li>
                                        <i class="{{ $i <= $review->rating ? 'ri-star-fill' : 'ri-star-line' }}"></i>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Testimonials Area -->


    <!-- Start Skill Area -->
    <div class="skill-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="skill-content">
                        <span>{{$about->header}}</span>
                        <h3>{{$about->title}} <span class="overlay"></span></h3>
                    </div>

                    <p>{!! $about->description !!}</p>

                    <div class="skill-bar-btn" data-aos="fade-up" data-aos-delay="90" data-aos-duration="900" data-aos-once="true">
                        <a href="{{route('home.about')}}" class="default-btn">Explore More</a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="skill-image" data-aos="fade-left" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                        <img src="{{asset($about->image)}}" alt="{{$about->title}}" data-tilt>

                        <div class="skill-shape-1">
                            <img src="{{asset('homePage')}}/assets/images/skill/skill-shape-1.png" alt="image">
                        </div>
                        <div class="skill-shape-2">
                            <img src="{{asset('homePage')}}/assets/images/skill/skill-shape-2.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="skill-bg-shape">
            <img src="{{asset('homePage')}}/assets/images/skill/skill-bg-shape.png" alt="image">
        </div>
    </div>
    <!-- End Skill Area -->

    <!-- Start Blog Area -->
    <div class="blog-area pt-100 pb-75">
        <div class="container">
            <div class="section-title">
                <span>ARTICLE</span>
                <h2>Read Our Blog To Get All Recent Tech <b>News</b> <span class="overlay"></span></h2>
            </div>

            <div class="blog-slides owl-carousel owl-theme">
                @foreach($latestBlogs as $row)
                    <div class="blog-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="blog-image">
                                    <a href="{{route('home.blog',$row->slug)}}"><img src="{{asset($row->image)}}" alt="{{$row->name}}"></a>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog-content">
                                    <div class="date">{{$row->created_at->format('d M Y')}}</div>
                                    <h3>
                                        <a href="{{route('home.blog',$row->slug)}}">{{$row->name}}</a>
                                    </h3>
                                    <p>{{\Illuminate\Support\Str::limit($row->description,110)}}</p>
                                    <a href="{{route('home.blog',$row->slug)}}" class="blog-btn">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="blog-shape-1">
            <img src="{{asset('homePage')}}/assets/images/blog/blog-shape-1.png" alt="image">
        </div>
    </div>
    <!-- End Blog Area -->

    <div class="talk-area ptb-100 w-100" id="contact-form">
        <div class="container">
            <div class="row align-items-center bg-light">
                <div class="p-5 col-lg-6 col-md-12 con-rg-sc">
                    <div class="button-area position-relative">
                        <h2 class="" style="color:white;">
                            LET US ELIMINATE
                            YOUR STRUGGLES</h2><p style="font-size: 18px; color:white !important;
    color: black;"><br style="height: 5px"></p><p style="font-size: 18px;color:white !important;
    color: black;">JSB-Tech is the best tool your company has in the utility belt. JSB-Tech manages all business technology that you utilize daily. Specializing in support for Windows operating system. This includes but is not limited to hardware, software, network, and stand-alone printers, phone systems, and document management systems. Whether it is auditing your files so they do not leave the office or providing your company a security assessment, let JSB-Tech show you what Customer service is all about.</p><ul class="icon-list-items" style="font-size: 18px; color:white
    color: black;"><li class="icon-list-item"><span class="icon-list-icon"><span aria-hidden="true" class="fas fa-check"></span>&nbsp;</span><span class="icon-list-text">We are committed to providing quality IT Services</span></li><li class="icon-list-item"><span class="icon-list-icon"><span aria-hidden="true" class="fas fa-check"></span>&nbsp;</span><span class="icon-list-text">Provided by experts to help challenge critical activities</span></li><li class="icon-list-item"><span class="icon-list-icon"><span aria-hidden="true" class="fas fa-check"></span>&nbsp;JSB-Tech LLC is a company with employees that have a passion for technology and want to do a good job.</span></li></ul><ul class="icon-list-items">
                        </ul>

                        <a href="{{route('home.about')}}" class="mt-2 btn default-btn"> Learn More  </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 ps-lg-5">
                    <div class="talk-content margin-zero">
                        <span>LET'S TALK</span>
                        <h3>We Would Like To Hear From You Anytime <span class="overlay"></span></h3>

                        <form id="contactFormTwo" method="post" action="{{route('contact.save')}}">
                            @csrf

                                                                    <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" required data-error="Please enter your name" placeholder="Your name">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" required data-error="Please enter your email" placeholder="Your email address">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">

                                        <select name="service" class="form-control" required data-error="Please select service">
                                            <option value="">Select Service</option>
                                            @php
                                                $servies = App\Models\Service::where('status',1)->get();
                                            @endphp
                                            @foreach ($servies as $row)
                                                <option value="{{$row->title}}">{{$row->title}}</option>
                                            @endforeach
                                        </select>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="number" name="phone" class="form-control" required data-error="Please enter your phone" placeholder="Your Phone">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" cols="30" rows="6" required data-error="Please enter your message" placeholder="Your message..."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>

                                <!-- Honeypot field -->
                                <div style="display: none;">
                                    <label for="honeypot">Leave this field blank</label>
                                    <input type="text" name="honeypot" id="honeypot" value="">
                                </div>



                                <div class="mt-2 col-lg-12 col-md-12">
                                    <button type="submit" class="default-btn">Submit<span></span></button>
                                    <div id="msgSubmitTwo" class="hidden text-center h3"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
