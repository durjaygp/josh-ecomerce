@extends('frontEnd.master')
@section('title')
    Contact Us
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
                    <li>Contact</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->


    <div class="talk-area ptb-100 w-100" id="contact-form">
        <div class="container">
            <div class="row align-items-center bg-light">
                <div class="col-lg-6 col-md-12 p-5 con-rg-sc">
                    <div class="button-area position-relative">
                        <h2 class="" style="color:white;">
                            LET US ELIMINATE
                            YOUR STRUGGLES</h2><p style="font-size: 18px; color:white !important;
    color: black;"><br style="height: 5px"></p><p style="font-size: 18px;color:white !important;
    color: black;">JSB-Tech is the best tool your company has in the utility belt. JSB-Tech manages all business technology that you utilize daily. Specializing in support for Windows operating system. This includes but is not limited to hardware, software, network, and stand-alone printers, phone systems, and document management systems. Whether it is auditing your files so they do not leave the office or providing your company a security assessment, let JSB-Tech show you what Customer service is all about.</p><ul class="icon-list-items" style="font-size: 18px; color:white
    color: black;"><li class="icon-list-item"><span class="icon-list-icon"><span aria-hidden="true" class="fas fa-check"></span>&nbsp;</span><span class="icon-list-text">We are committed to providing quality IT Services</span></li><li class="icon-list-item"><span class="icon-list-icon"><span aria-hidden="true" class="fas fa-check"></span>&nbsp;</span><span class="icon-list-text">Provided by experts to help challenge critical activities</span></li><li class="icon-list-item"><span class="icon-list-icon"><span aria-hidden="true" class="fas fa-check"></span>&nbsp;JSB-Tech LLC is a company with employees that have a passion for technology and want to do a good job.</span></li></ul><ul class="icon-list-items">
                        </ul>

                        <a href="https://jsb-tech.com/about-us" class="btn default-btn mt-2"> Learn More  </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12 ps-lg-5">
                    <div class="talk-content margin-zero">
                        <span>LET'S TALK</span>
                        <h3>We Would Like To Hear From You Anytime <span class="overlay"></span></h3>

                        <form id="contactFormTwo" method="post" action="https://jsb-tech.com/contact-store">
                            <input type="hidden" name="_token" value="SAoUCpQyeE7mQXUHBdL3ZDk68lAVSQQUpBR1kwsy">                                                    <input type="hidden" name="contact_form" value="contact">
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
                                            <option selected disabled>Select Service</option>
                                            <option value="Data backup and Recovery">Data backup and Recovery</option>
                                            <option value="Email Anti-Spam Solutions">Email Anti-Spam Solutions</option>
                                            <option value="Remote Computer repair">Remote Computer repair</option>
                                            <option value="Server and Network Managment">Server and Network Managment</option>
                                            <option value="VOIP Phone Services recommnedation and contract nogotiation.">VOIP Phone Services recommnedation and contract nogotiation.</option>
                                            <option value="Ransomware Remediation">Ransomware Remediation</option>
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

                                <div class="col-lg-12 col-md-12">
                                    <div data-sitekey="6LfY_SAkAAAAAK_UZFLnxFfWj36HYisD59zAz6Ol" class="g-recaptcha"></div>
                                </div>

                                <div class="col-lg-12 col-md-12 mt-2">
                                    <button type="submit" class="default-btn">Submit<span></span></button>
                                    <div id="msgSubmitTwo" class="h3 text-center hidden"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start Overview Area -->
    <div class="overview-area pt-100 pb-75">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <h3>Call Us</h3>
                        <span>
                        <a href="tel:12096031987">12096031987</a>
                    </span>

                        <div class="overview-shape">
                            <img src="https://jsb-tech.com/public/assets/images/overview/overview-shape.png" alt="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <h3>Email Us</h3>
                        <span>
                        <a href="mailto:support@jsb-tech.com">support@jsb-tech.com</a>
                    </span>

                        <div class="overview-shape">
                            <img src="https://jsb-tech.com/public/assets/images/overview/overview-shape.png" alt="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <h3>Tech Support</h3>
                        <span>
                        <a href="tel:12096031987">12096031987</a>
                    </span>

                        <div class="overview-shape">
                            <img src="https://jsb-tech.com/public/assets/images/overview/overview-shape.png" alt="image">
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="overview-card">
                        <h3>For Deliveries and Contact only</h3>
                        <span>JSB-Tech LLC
4719 Quail Lakes Dr
Ste G #1127
Stockton, CA 95207</span>

                        <div class="overview-shape">
                            <img src="https://jsb-tech.com/public/assets/images/overview/overview-shape.png" alt="image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Overview Area -->

    <!-- Start Talk Area -->
    <!-- End Talk Area -->

    <!-- Start Map Area -->
    <div class="container ptb-100">
        <div class="map-location">
            <iframe class="mapframe" src="https://maps.google.com/maps?q=Jalan%20Raya%20Kuta%2C%20Bali&amp;t=m&amp;z=18&amp;output=embed&amp;iwloc=near" title="Jalan Raya Kuta, Bali" aria-label="Jalan Raya Kuta, Bali"></iframe>

        </div>
    </div>
@endsection
