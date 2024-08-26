@php
$services = \App\Models\Service::whereStatus(1)->latest()->get();
@endphp
<footer class="footer-area with-black-background margin-zero pt-100">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                    <div class="widget-logo">
                        <a href="index.html"><img src="{{asset('site')}}/1702435059_logo.png" alt="image"></a>
                    </div>
                    <div class="cta-text">
                        <h3 class="mb-2">Find us</h3>
                        <p>
                            {{setting()->name ?? ""}}<br />
                            {{setting()->address ?? ""}}
                        </p>
                    </div>

                    <ul class="widget-social d-flex" style="flex-direction: column">
                        <li>
                            <a class="d-flex" href="tel:{{setting()->phone ?? ""}}" target="_blank">
                                <i class="me-2 ri-phone-fill"></i>
                                <p> {{setting()->phone ?? ""}}</p>
                            </a>
                        </li>
                        <li class="mt-2">
                            <a class="d-flex" href="mailto:{{setting()->email ?? ""}}" target="_blank">
                                <i class="me-2 ri-mail-fill"></i>
                                <p>{{setting()->email ?? ""}}</p>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget ps-5" data-aos="fade-up" data-aos-delay="60" data-aos-duration="600" data-aos-once="true">
                    <h3>Links</h3>

                    <ul class="quick-links">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li><a href="{{route('home.about')}}">About Us</a></li>
                        <li><a href="{{route('home.faq')}}">FAQ</a></li>
                        <li><a href="{{route('home.services')}}">Services</a></li>
                        <li><a href="{{route('home.contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget ps-5" data-aos="fade-up" data-aos-delay="70" data-aos-duration="700" data-aos-once="true">
                    <h3>Pages</h3>

                    <ul class="quick-links">
                        @foreach($services as $row)
                            <li><a href="{{route('service.details',$row->slug)}}">{{$row->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-footer-widget" data-aos="fade-up" data-aos-delay="80" data-aos-duration="800" data-aos-once="true">
                    <h3>Subscribe Newsletter</h3>

                    <form class="newsletter-form" data-bs-toggle="validator">
                        <input type="email" class="input-newsletter" placeholder="Enter your email" name="EMAIL" required autocomplete="off">

                        <button type="submit" class="default-btn">Subscribe</button>
                        <div id="validator-newsletter" class="form-result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
                <p>
                    {{setting()->footer ?? ""}}
                </p>
            </div>
        </div>
    </div>
    <div class="footer-shape-1">
        <img src="{{asset('homePage')}}assets/images/footer/footer-shape-1.png" alt="image">
    </div>
    <div class="footer-shape-2">
        <img src="{{asset('homePage')}}assets/images/footer/footer-shape-2.png" alt="image">
    </div>
    <div class="footer-shape-3">
        <img src="{{asset('homePage')}}assets/images/footer/footer-shape-3.png" alt="image">
    </div>
</footer>
