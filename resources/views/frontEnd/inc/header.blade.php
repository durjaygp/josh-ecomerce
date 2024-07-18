@php
    $cartCount = \App\Models\Cart::where('user_id', auth()->id())->count();
@endphp
<div class="topbar-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-9">
                <ul class="topbar-information">
                    <li>
                        <i class="ri-phone-line"></i>
                        <span>Phone: <a href="tel:12096031987">12096031987</a></span>
                    </li>
                    <li>
                        <i class="ri-mail-line"></i>
                        <span>Mail: <a href="mailto:support@jsb-tech.com">support@jsb-tech.com</a></span>
                    </li>
                    <li class="sm-none">
                        <i class="ri-map-pin-line"></i>
                        <span>Address:</span> JSB-Tech LLC
                        4719 Quail Lakes Dr
                        Ste G #1127
                        Stockton, CA 95207
                    </li>
                </ul>
            </div>


        </div>
    </div>
</div>
<div style="position:fixed; bottom: 10px; left: 10px; z-index:99999;">
    <a href="https://support.jsb-tech.com/" target="_blank"><img src="{{asset('site')}}/remote-support-button.png" class="img-fluid" alt="support" width="80"></a>
</div>

<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="https://jsb-tech.com">
                        <img src="{{asset('site')}}/1702435059_logo.png" alt="image">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar navbar-with-black-color">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="https://jsb-tech.com">
                    <img src="{{asset('site')}}/1702435059_logo.png" alt="image">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link  active ">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="https://jsb-tech.com/about-us" class="nav-link ">About</a>
                        </li>


                        <li class="nav-item">
                            <a href="https://jsb-tech.com/services" class="nav-link ">
                                Services
                                <i class="ri-arrow-down-s-line"></i>
                            </a>

                            <ul class="dropdown-menu">
                                <li class="nav-item">
                                    <a href="https://jsb-tech.com/service/managed-it-services" class="nav-link">Managed I.T. Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://jsb-tech.com/service/security-services" class="nav-link">Security Services</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://jsb-tech.com/service/our-partners" class="nav-link">Our partners</a>
                                </li>
                                <li class="nav-item">
                                    <a href="https://jsb-tech.com/service/our-service" class="nav-link">Our Service</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="https://jsb-tech.com/faq" class="nav-link ">FAQ</a>
                        </li>

                        <li class="nav-item">
                            <a href="https://learn.jsb-tech.com/" target="_blank" class="nav-link">Videos</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('home.products')}}" class="nav-link ">Products</a>
                        </li>

                        <li class="nav-item">
                            <a href="https://jsb-tech.com/contact-us" class="nav-link ">Contact Us</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link ">Login</a>
                        </li>

                        <li class="nav-item d-flex">

                                <div class="dropdown cart_drop01 my-auto">
                                    <a href="{{route('home.cart')}}" class="btn default-btn px-3 py-2" data-toggle="dropdown">
                                        <i class="ri-shopping-cart-fill me-1" aria-hidden="true"></i> Cart <span class="ms-1 cart-count"></span>
                                    </a>
                                </div>

                        </li>


                    </ul>


                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <li class="nav-item d-flex">
                        <div class="dropdown cart_drop01 my-auto">
                            <button type="button" class="btn default-btn px-3 py-2" data-toggle="dropdown">
                                <i class="ri-shopping-cart-fill me-1" aria-hidden="true"></i> Cart <span class="ms-1">(0)</span>
                            </button>
                            <div class="dropdown-menu  p-2" style="width: 350px">
                                <div class="row total-header-section mb-1">
                                    <div class="col-lg-6 col-sm-6 col-6 d-flex">
                                        <p>
                                            <i class="ri-shopping-cart-fill me-1 my-auto" aria-hidden="true"></i>
                                            <span class="ms-1 my-auto">(0)</span>
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                                        <p><b>Total</b>: <span class="text-info-def">$0</span></p>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                                        <a href="https://jsb-tech.com/product-cart" class="btn default-btn py-2 w-100">View all</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </div>
            </div>


            <div class="container">
                <div class="option-inner">
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <i class="search-btn ri-search-line"></i>
                            <i class="close-btn ri-close-line"></i>
                            <div class="search-overlay search-popup">
                                <div class='search-box'>
                                    <form class="search-form">
                                        <input class="search-input" placeholder="Search..." type="text">

                                        <button class="search-button" type="submit">
                                            <i class="ri-search-line"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="option-item">
                            <div class="side-menu-btn">
                                <i class="ri-bar-chart-horizontal-line" data-bs-toggle="modal" data-bs-target="#sidebarModal"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
