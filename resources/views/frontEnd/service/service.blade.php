@extends('frontEnd.master')
@section('title')
    {{ $service->name ?? ""}}
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
                    <img src="assets/images/services-details/services-details-1.jpg" alt="image">
                </div>
                <div class="article-services-content">
                    <h3>Software Development</h3>
                    <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum steter clita kasd gubergren no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat sed diam voluptua.</p>

                    <ul class="list">
                        <li>
                            <h4>What You Will Get Under This Service</h4>
                        </li>
                        <li><i class="ri-checkbox-circle-line"></i> Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut</li>
                        <li><i class="ri-checkbox-circle-line"></i> Dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt.</li>
                        <li><i class="ri-checkbox-circle-line"></i> Consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt.</li>
                        <li><i class="ri-checkbox-circle-line"></i> Sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat.</li>
                        <li><i class="ri-checkbox-circle-line"></i> Sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat.</li>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-sm-6">
                        <div class="article-services-middle-image">
                            <img src="assets/images/services-details/services-details-2.jpg" alt="image">
                        </div>
                    </div>
                    <div class="col-lg-5 col-sm-6">
                        <div class="article-services-middle-image">
                            <img src="assets/images/services-details/services-details-3.jpg" alt="image">
                        </div>
                    </div>
                </div>
                <div class="article-services-content">
                    <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum steter clita kasd gubergren no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat sed diam voluptua.</p>
                </div>
                <div class="article-services-quote">
                    <i class="ri-double-quotes-l"></i>
                    <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat sed diam voluptua.</p>

                    <div class="quote-shape">
                        <img src="assets/images/services-details/circle-shape.png" alt="image">
                    </div>
                </div>
                <div class="article-services-content">
                    <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum steter clita kasd gubergren no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                    <p>Lorem ipsum dolor sit amet consetetur sadipscing elitr sed diam nonumy eirmod tempor invidunt ut labore dolore magna aliquyam erat sed diam voluptua.</p>
                </div>
            </div>
        </div>

        <div class="services-details-shape">
            <img src="assets/images/services-details/line-shape.png" alt="image">
        </div>
    </div>
    <!-- End Services Details Area -->


@endsection
