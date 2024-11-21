@php
$setting = setting();
@endphp
@extends('website.master')
@section('title')
{{ $setting->name }}
@endsection
@section('content')

    <div class="hero-banner-two">
        <div class="container">
            <div class="row align-items-start justify-content-between">
                <div class="col-lg-6 order-lg-last">
                    <div class="illustration-holder">
                        <img src="{{asset('website')}}/images/assets/ils-01.png" alt="" class="illustration_01">
                        <img src="{{asset('website')}}/images/assets/ils-01.1.png" alt="" class="shapes shape-one">
                        <img src="{{asset('website')}}/images/assets/ils-01.2.png" alt="" class="shapes shape-two">
                        <img src="{{asset('website')}}/images/assets/ils-01.3.png" alt="" class="shapes shape-three">
                    </div>
                </div>

                <div class="col-xl-5 col-lg-6 order-lg-first">
                    <div class="hero-text-wrapper md-mt-50">
                        <h1>
									<span>
										Great ticketing
										<img src="{{asset('website')}}/images/shape/line-shape-1.svg" alt="" class="cs-screen">
									</span>
                            system for your customer.
                        </h1>
                        <p class="sub-text">For hassale free event, we are here to help you by creating online ticket.</p>
                        <form action="#">
                            <input type="email" placeholder="Enter your email">
                            <button>Get Started</button>
                        </form>
                    </div> <!-- /.hero-text-wrapper -->
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.hero-banner-two -->

    <div class="feature-blog-one blog-page-bg">
        <div class="shapes shape-one"></div>
        <div class="shapes shape-two"></div>
        <div class="shapes shape-three"></div>
        <div class="container">
            <!-- Title Section -->
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="text-center mb-4">
                        <h2>
                        <span>
                            Services
                            <img src="{{asset('website')}}/images/shape/line-shape-2.svg" alt="">
                        </span>
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Blog Posts Section -->
            <div class="row">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                    <div class="post-meta">
                        <img src="{{asset('website')}}/images/blog/media_01.png" alt="" class="image-meta">
                        <div class="tag">Technology</div>
                        <h3><a href="blog-details-v1.html" class="title">A Discount Cartridge Is Better Ever.</a></h3>
                        <a href="blog-details-v1.html" class="read-more d-flex justify-content-between align-items-center">
                            <span>Read More</span>
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="50">
                    <div class="post-meta">
                        <img src="{{asset('website')}}/images/blog/media_02.png" alt="" class="image-meta">
                        <div class="tag">Software</div>
                        <h3><a href="blog-details-v1.html" class="title">Quis Nostr Exercitation Ullamco Laboris nisi ut Aliquip exea.</a></h3>
                        <a href="blog-details-v1.html" class="read-more d-flex justify-content-between align-items-center">
                            <span>Read More</span>
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                    <div class="post-meta">
                        <img src="{{asset('website')}}/images/blog/media_03.png" alt="" class="image-meta">
                        <div class="tag">Blog</div>
                        <h3><a href="blog-details-v1.html" class="title">Excepteur sint occaat cupidatat proidet nisi sunt in culpa ,</a></h3>
                        <a href="blog-details-v1.html" class="read-more d-flex justify-content-between align-items-center">
                            <span>Read More</span>
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!--  Fancy Feature  -->
    <div class="fancy-feature-four mt-20">
        <div class="bg-wrapper">
            <img src="{{asset('website')}}/images/shape/18.svg" alt="" class="shapes shape-right">
            <img src="{{asset('website')}}/images/shape/19.svg" alt="" class="shapes shape-left">
            <div class="container">
                <div class="title-style-two text-center mb-100 md-mb-50">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9 col-md-10 m-auto">
                            <h2>Services
                                <span>your business. <img src="{{asset('website')}}/images/shape/line-shape-2.svg" alt=""></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200">
                            <div class="post-meta">
                                <img src="{{asset('website')}}/images/blog/media_01.png" alt="" class="image-meta">
                                <div class="tag">Technology</div>
                                <h3><a href="blog-details-v1.html" class="title">A Discount Cartridge Is Better Ever.</a></h3>
                                <a href="blog-details-v1.html" class="read-more d-flex justify-content-between align-items-center">
                                    <span>Read More</span>
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div> <!-- /.post-meta -->
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="50">
                            <div class="post-meta">
                                <img src="{{asset('website')}}/images/blog/media_02.png" alt="" class="image-meta">
                                <div class="tag">Software</div>
                                <h3><a href="blog-details-v1.html" class="title">Quis Nostr Exercitation Ullamco Laboris nisi ut Aliquip exea.</a></h3>
                                <a href="blog-details-v1.html" class="read-more d-flex justify-content-between align-items-center">
                                    <span>Read More</span>
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div> <!-- /.post-meta -->
                        </div>
                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                            <div class="post-meta">
                                <img src="{{asset('website')}}/images/blog/media_03.png" alt="" class="image-meta">
                                <div class="tag">Blog</div>
                                <h3><a href="blog-details-v1.html" class="title">Excepteur sint occaat cupidatat proidet nisi sunt in culpa ,</a></h3>
                                <a href="blog-details-v1.html" class="read-more d-flex justify-content-between align-items-center">
                                    <span>Read More</span>
                                    <i class="flaticon-right-arrow"></i>
                                </a>
                            </div> <!-- /.post-meta -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.fancy-feature-four -->


    <!--  Fancy Feature  -->
    <div class="fancy-feature-four mt-20">
        <div class="bg-wrapper">
            <img src="{{asset('website')}}/images/shape/18.svg" alt="" class="shapes shape-right">
            <img src="{{asset('website')}}/images/shape/19.svg" alt="" class="shapes shape-left">
            <div class="container">
                <div class="title-style-two text-center mb-100 md-mb-50">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9 col-md-10 m-auto">
                            <p>What we do</p>
                            <h2>Use deski to drive growth at
                                <span>your business. <img src="{{asset('website')}}/images/shape/line-shape-2.svg" alt=""></span>
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="inner-content">
                    <img src="{{asset('website')}}/images/shape/20.svg" alt="" class="shapes shape-one">
                    <img src="{{asset('website')}}/images/shape/21.svg" alt="" class="shapes shape-two">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200">
                            <div class="block-style-five">
                                <div class="icon"><img src="{{asset('website')}}/images/icon/20.svg" alt=""></div>
                                <h6 class="title"><span>Smart popups</span></h6>
                                <p>Create customized popups and show the right message at the right time. lorem dummy.</p>
                            </div> <!-- /.block-style-five -->
                        </div>
                        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                            <div class="block-style-five">
                                <div class="icon"><img src="{{asset('website')}}/images/icon/21.svg" alt=""></div>
                                <h6 class="title"><span>Embeded Forms</span></h6>
                                <p>Collect website leads with embedded forms and integrate easily.</p>
                            </div> <!-- /.block-style-five -->
                        </div>
                        <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                            <div class="block-style-five">
                                <div class="icon"><img src="{{asset('website')}}/images/icon/22.svg" alt=""></div>
                                <h6 class="title"><span>Autoresponder</span></h6>
                                <p>Send welcome email to your new subscribers  with a code.</p>
                            </div> <!-- /.block-style-five -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.fancy-feature-four -->



    <!--
    =============================================
        Fancy Text block Six
    ==============================================
    -->
    <div class="fancy-text-block-six mt-250 md-mt-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1200">
                    <div class="title-style-three mb-35">
                        <p>GET STARTED IN MINUTES</p>
                        <h2>
                            <span>3 Main Reaosn to <img src="{{asset('website')}}/images/shape/line-shape-3.svg" alt=""></span>
                            Choose us.
                        </h2>
                    </div>

                    <!-- Accordion Style Two -->
                    <div id="accordion" class="accordion-style-two pr-5">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link">
                                        Register and create your first support portal
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show">
                                <div class="card-body">
                                    <p>It only takes 5 minutes. Set-up is smooth & simple, with fully customisable page design to reflect your brand lorem dummy.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link">
                                        Manage your dashbaord easily
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse">
                                <div class="card-body">
                                    <p>It only takes 5 minutes. Set-up is smooth & simple, with fully customisable page design to reflect your brand lorem dummy.</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn btn-link">
                                        Start giving support
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse">
                                <div class="card-body">
                                    <p>It only takes 5 minutes. Set-up is smooth & simple, with fully customisable page design to reflect your brand lorem dummy.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="img-meta-container" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="100">
            <img src="{{asset('website')}}/images/assets/feature-img-08.png" alt="">
            <img src="{{asset('website')}}/images/shape/22.svg" alt="" class="shapes shape-one">
            <img src="{{asset('website')}}/images/shape/23.svg" alt="" class="shapes shape-two">
            <img src="{{asset('website')}}/images/shape/24.svg" alt="" class="shapes shape-three">
            <img src="{{asset('website')}}/images/shape/25.svg" alt="" class="shapes shape-four">
            <img src="{{asset('website')}}/images/shape/26.svg" alt="" class="shapes shape-five">
            <img src="{{asset('website')}}/images/shape/27.svg" alt="" class="shapes shape-six">
            <img src="{{asset('website')}}/images/shape/28.svg" alt="" class="shapes shape-seven">
        </div>
    </div> <!-- /.fancy-text-block-six -->



    <!--
    =====================================================
        Counter With Icon One
    =====================================================
    -->
    <div class="counter-with-icon-one pt-200 md-pt-80">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-6" data-aos="fade-up" data-aos-duration="1200">
                    <div class="counter-box-three">
                        <div class="icon"><img src="{{asset('website')}}/images/icon/23.svg" alt=""></div>
                        <h2 class="number"><span class="timer" data-from="0" data-to="13" data-speed="1500" data-refresh-interval="5">0</span>m</h2>
                        <p class="font-rubik">Ticket Sold</p>
                    </div> <!-- /.counter-box-three -->
                </div>
                <div class="col-lg-4 col-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                    <div class="counter-box-three">
                        <div class="icon"><img src="{{asset('website')}}/images/icon/24.svg" alt=""></div>
                        <h2 class="number"><span class="timer" data-from="0" data-to="30000" data-speed="1200" data-refresh-interval="5">0</span></h2>
                        <p class="font-rubik">Event organisers</p>
                    </div> <!-- /.counter-box-three -->
                </div>
                <div class="col-lg-4 col-6" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200">
                    <div class="counter-box-three">
                        <div class="icon"><img src="{{asset('website')}}/images/icon/25.svg" alt=""></div>
                        <h2 class="number"><span class="timer" data-from="0" data-to="134" data-speed="1200" data-refresh-interval="5">0</span></h2>
                        <p class="font-rubik">Countries</p>
                    </div> <!-- /.counter-box-three -->
                </div>
            </div>
        </div>
    </div> <!-- /.counter-with-icon-one -->




    <!--
    =============================================
        Fancy Text block Seven
    ==============================================
    -->
    <div class="fancy-text-block-seven mt-150 md-mt-100">
        <div class="bg-wrapper">
            <img src="{{asset('website')}}/images/shape/29.svg" alt="" class="shapes shape-one">
            <img src="{{asset('website')}}/images/shape/30.svg" alt="" class="shapes shape-two">
            <img src="{{asset('website')}}/images/shape/31.svg" alt="" class="shapes shape-three">
            <img src="{{asset('website')}}/images/shape/32.svg" alt="" class="shapes shape-four">
            <img src="{{asset('website')}}/images/shape/33.svg" alt="" class="shapes shape-five">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-sm-10 m-auto" data-aos="fade-right" data-aos-duration="1200">
                        <div class="img-holder">
                            <img src="{{asset('website')}}/images/media/img_19.png" alt="">
                            <img src="{{asset('website')}}/images/shape/34.svg" alt="" class="shapes shape-six">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 ml-auto" data-aos="fade-left" data-aos-duration="1200">
                        <div class="quote-wrapper pt-60">
                            <img src="{{asset('website')}}/images/icon/26.svg" alt="" class="icon">
                            <blockquote class="font-rubik">
                                Deski combines excellent live chat, ticketing and automation that allow us to provide quality.
                            </blockquote>
                            <h6>Zubayer Hasan <span>CEO & Founder deksi</span></h6>
                            <a href="about-us(cs).html" class="theme-btn-two mt-45 md-mt-30">Learn More</a>
                        </div> <!-- /.quote-wrapper -->
                    </div>
                </div>
            </div>
        </div> <!-- /.bg-wrapper -->
    </div> <!-- /.fancy-text-block-seven -->



    <!--
    =====================================================
        Fancy Text block Eight
    =====================================================
    -->
    <div class="fancy-text-block-eight pt-150 pb-200 md-pt-100 md-pb-150">
        <div class="container">
            <div class="title-style-two text-center mb-150 md-mb-70">
                <div class="row">
                    <div class="col-xl-8 col-lg-9 col-md-10 m-auto">
                        <p>Features</p>
                        <h2>Use deski to drive growth at
                            <span>your business. <img src="{{asset('website')}}/images/shape/line-shape-2.svg" alt=""></span>
                        </h2>
                    </div>
                </div>
            </div>

            <div class="block-style-six pb-150 md-pb-70">
                <div class="row">
                    <div class="col-lg-5" data-aos="fade-right" data-aos-duration="1200">
                        <div class="text-details pt-35 md-pb-50">
                            <img src="{{asset('website')}}/images/icon/27.svg" alt="" class="icon">
                            <h3 class="title font-gilroy-bold">Make communication Fast & efficient.</h3>
                            <p class="text-meta">Our chatbots and live chat capture more ipsum of your best leads and convert them while they’re hot dummy text.</p>
                            <div class="quote-wrapper">
                                <div class="quote-icon d-flex align-items-center justify-content-center"><img src="{{asset('website')}}/images/icon/28.svg" alt=""></div>
                                <blockquote>“Our team really feels great to use deski apps specially their quality”</blockquote>
                                <div class="name"><strong>Micle Duke,</strong> Product Manager <br>Uber Inc.</div>
                            </div> <!-- /.quote-wrapper -->
                        </div> <!-- /.text-details -->
                    </div>

                    <div class="col-lg-7 col-md-9 m-auto" data-aos="fade-left" data-aos-duration="1200">
                        <div class="illustration-holder illustration-one">
                            <img src="{{asset('website')}}/images/assets/feature-img-09.png" alt="" class="ml-auto">
                            <div class="shapes shape-one"></div>
                            <div class="shapes shape-two"></div>
                            <div class="shapes shape-three"></div>
                            <div class="shapes shape-four"></div>
                            <div class="shapes shape-five"></div>
                            <img src="{{asset('website')}}/images/shape/35.svg" alt="" class="shapes shape-six">
                            <img src="{{asset('website')}}/images/shape/36.svg" alt="" class="shapes shape-seven">
                        </div>
                    </div>
                </div>
            </div> <!-- /.block-style-six -->

            <div class="block-style-six pt-150 md-pt-40">
                <div class="row">
                    <div class="col-lg-5 order-lg-last" data-aos="fade-left" data-aos-duration="1200">
                        <div class="text-details pt-35 md-pb-50">
                            <img src="{{asset('website')}}/images/icon/29.svg" alt="" class="icon">
                            <h3 class="title font-gilroy-bold">Friendly user interface & easy to use.</h3>
                            <p class="text-meta">Deski stand with friendly interface with lots of features that help our team and csutomer to collbarate easily.</p>
                            <div class="quote-wrapper">
                                <div class="quote-icon d-flex align-items-center justify-content-center"><img src="{{asset('website')}}/images/icon/28.svg" alt=""></div>
                                <blockquote>“Our team really feels great to use deski apps specially their quality”</blockquote>
                                <div class="name"><strong>Micle Duke,</strong> Product Manager <br>Uber Inc.</div>
                            </div> <!-- /.quote-wrapper -->
                        </div> <!-- /.text-details -->
                    </div>

                    <div class="col-lg-7 col-md-9 m-auto order-lg-first" data-aos="fade-right" data-aos-duration="1200">
                        <div class="illustration-holder illustration-two">
                            <img src="{{asset('website')}}/images/assets/feature-img-10.png" alt="" class="mr-auto">
                            <div class="shapes shape-one"></div>
                            <div class="shapes shape-two"></div>
                            <div class="shapes shape-three"></div>
                            <div class="shapes shape-four"></div>
                            <img src="{{asset('website')}}/images/shape/40.svg" alt="" class="shapes shape-five">
                            <img src="{{asset('website')}}/images/shape/41.svg" alt="" class="shapes shape-six">
                        </div>
                    </div>
                </div>
            </div> <!-- /.block-style-six -->
        </div>
    </div> <!-- /.fancy-text-block-eight -->


    <!--
    =====================================================
        Useable Tools
    =====================================================
    -->
    <div class="useable-tools-section-two bg-shape mb-200 md-mb-90">
        <div class="bg-wrapper">
            <div class="shapes shape-one"></div>
            <div class="shapes shape-two"></div>
            <div class="shapes shape-three"></div>
            <div class="shapes shape-four"></div>
            <div class="container">
                <div class="title-style-two text-center mb-70 md-mb-10">
                    <div class="row">
                        <div class="col-lg-10 col-md-11 m-auto">
                            <p>Integrates with your tools</p>
                            <h2>Connect deski with the software you
                                <span>use every<img src="{{asset('website')}}/images/shape/line-shape-2.svg" alt=""></span>
                                day.
                            </h2>
                        </div>
                    </div>
                </div> <!-- /.title-style-two -->

                <div class="icon-wrapper">
                    <ul class="clearfix">
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/09.png" alt="">
                            </div>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/10.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/11.png" alt="">
                            </div>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/12.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/13.png" alt="">
                            </div>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/14.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/15.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/16.png" alt="">
                            </div>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/17.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/18.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/19.png" alt="">
                            </div>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/20.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/21.png" alt="">
                            </div>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/22.png" alt="">
                            </div>
                        </li>
                        <li>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/23.png" alt="">
                            </div>
                            <div class="icon-box d-flex align-items-center justify-content-center">
                                <img src="{{asset('website')}}/images/logo/24.png" alt="">
                            </div>
                        </li>
                    </ul>
                </div> <!-- /.icon-wrapper -->
            </div> <!-- /.container -->
        </div> <!-- /.bg-wrapper -->
    </div> <!-- /.useable-tools-section-two -->


    <!--
    =====================================================
        Client Feedback Slider One
    =====================================================
    -->
    <div class="client-feedback-slider-one pt-50 pb-170 md-pb-80">
        <div class="shapes-holder">
            <img src="{{asset('website')}}/images/shape/39.svg" alt="">
            <img src="{{asset('website')}}/images/shape/42.svg" alt="" class="shapes shape-one">
            <img src="{{asset('website')}}/images/media/img_21.png" alt="" class="cp-img-one">
            <img src="{{asset('website')}}/images/media/img_22.png" alt="" class="cp-img-two">
            <img src="{{asset('website')}}/images/media/img_23.png" alt="" class="cp-img-three">
            <img src="{{asset('website')}}/images/media/img_24.png" alt="" class="cp-img-four">
            <div class="title-style-two">
                <h2>What’s <br>Our Client Say <br>About Us.</h2>
            </div>
        </div> <!-- /.shapes-holder -->
        <div class="container">
            <div class="row">
                <div class="col-lg-6 ml-auto">
                    <div class="feedback-meta">
                        <div class="watermark font-gilroy-bold">Feedback</div>
                        <img src="{{asset('website')}}/images/icon/30.svg" alt="" class="icon">
                        <div class="clientSliderOne">
                            <div class="item">
                                <p class="font-rubik">Having a home based business is a wonderful asset to your life. The problem still stands it comes timeadvertise your business for a cheap cost. I know you have looked answer everywhere.</p>
                                <div class="d-lg-flex align-items-center">
                                    <img src="{{asset('website')}}/images/media/img_20.png" alt="" class="c_img">
                                    <div class="info">
                                        <strong>Rashed kabir</strong> <span>Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <p class="font-rubik">Having a home based business is a wonderful asset to your life. The problem still stands it comes timeadvertise your business for a cheap cost. I know you have looked answer everywhere.</p>
                                <div class="d-lg-flex align-items-center">
                                    <img src="{{asset('website')}}/images/media/img_20.png" alt="" class="c_img">
                                    <div class="info">
                                        <strong>Zubayer Hasan</strong> <span>Designer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="d-flex slider-arrow mt-40">
                            <li class="prev_c"><i class="flaticon-right-arrow"></i></li>
                            <li class="next_c"><i class="flaticon-right-arrow"></i></li>
                        </ul>
                    </div> <!-- /.feedback-meta -->
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /.client-feedback-slider-one -->

@endsection
