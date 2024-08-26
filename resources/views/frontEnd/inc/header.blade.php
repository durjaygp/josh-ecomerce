@php
    $cartCount = \App\Models\Cart::where('user_id', auth()->id())->count();
    $servics = \App\Models\Service::whereStatus(1)->latest()->get();
@endphp
<div class="topbar-area">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-9 col-md-9">
                <ul class="topbar-information">
                    <li>
                        <i class="ri-phone-line"></i>
                        <span>Phone: <a href="tel:{{setting()->phone ?? ""  }}">{{setting()->phone ?? "" }}</a></span>
                    </li>
                    <li>
                        <i class="ri-mail-line"></i>
                        <span>Mail: <a href="mailto:support@jsb-tech.com">{{setting()->email ?? ""}}</a></span>
                    </li>
                    <li class="sm-none">
                        <i class="ri-map-pin-line"></i>
                        <span>Address:</span> {{setting()->address ?? ""}}
                    </li>
                </ul>
            </div>


        </div>
    </div>
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
                            <a href="{{route('home.about')}}" class="nav-link ">About</a>
                        </li>


                        <li class="nav-item">
                            <a href="{{route('home.services')}}" class="nav-link ">
                                Services
                                <i class="ri-arrow-down-s-line"></i>
                            </a>

                            <ul class="dropdown-menu">
                                @foreach($servics as $row)
                                    <li class="nav-item">
                                        <a href="{{route('service.details',$row->slug)}}" class="nav-link">{{$row->title}}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('home.faq')}}" class="nav-link ">FAQ</a>
                        </li>

                        <li class="nav-item">
                            <a href="https://learn.jsb-tech.com/" target="_blank" class="nav-link">Videos</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('home.products')}}" class="nav-link ">Products</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('home.blogs')}}" class="nav-link ">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('home.contact')}}" class="nav-link ">Contact Us</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a href="{{route('admin.index')}}" class="nav-link ">Dashboard</a>
                            </li>
                        @else
                        <li class="nav-item">
                            <a href="{{route('login')}}" class="nav-link ">Login</a>
                        </li>
                        @endauth


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
                            <a href="{{route('home.cart')}}" class="btn default-btn px-3 py-2" data-toggle="dropdown">
                                <i class="ri-shopping-cart-fill me-1" aria-hidden="true"></i> Cart <span class="ms-1 cart-count"></span>
                            </a>
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
