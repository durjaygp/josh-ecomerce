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
                    <img src="{{asset('homePage/1620302777_about.jpg')}}" alt="image" data-aos="fade-down" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="about-wrap-content" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                    <div class="about-bg-text">ABOUT US</div>
                    <span>JSB-Tech</span>
                    <h3>Your Trusted Partner For All IT Solutions <span class="overlay"></span></h3>
                    <p><br></p><div class="blockquote-con"><div class="blockquote"><p class="bold">Vet-owned information technology consultant; providing real value for your business.</p></div></div>
                    <div class="about-btn">
                        <a href="{{route('home.about')}}" class="default-btn"> Learn More </a>
                    </div>

                    <ul class="list-unstyled">
                        <li class="d-flex align-items-center mt-4">
                            <i class="fas fa-check me-2"></i>
                            We are committed to providing quality IT Services
                        </li>
                        <li class="d-flex align-items-center mt-2">
                            <i class="fas fa-check me-2"></i>
                            Provided by experts to help challenge critical activities.
                        </li>
                        <li class="d-flex align-items-center mt-2">
                            <i class="fas fa-check me-2"></i>
                            Really know the true needs and expectations of customers.
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="about-inner-box">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6">
                    <div class="single-about-card" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                        <p class="quo-ts">With over 25 years of Information Technology experience.&nbsp; JSB-Tech has been in all facets of business technology; which includes working with the Government, Education, Privately owned companies, and educational institutes. Whether you need a security assessment, managed services, or require a technology assessment, please let JSB-Tech provide the clarity you need when purchasing technology services or products.</p>
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
