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
                    <a href="{{route('home')}}">
                        <img src="{{asset(setting()->website_logo ?? "")}}" alt="{{setting()->name ?? ""}}">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar navbar-with-black-color">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand" href="{{route('home')}}">
                    <img src="{{asset(setting()->website_logo ?? "")}}" alt="{{setting()->name ?? ""}}">
                </a>

                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.about') }}" class="nav-link {{ request()->routeIs('home.about') ? 'active' : '' }}">About</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.services') }}" class="nav-link {{ request()->routeIs('home.services') ? 'active' : '' }}">
                                Services
                                <i class="ri-arrow-down-s-line"></i>
                            </a>

                            <ul class="dropdown-menu">
                                @foreach($servics as $row)
                                    <li class="nav-item">
                                        <a href="{{ route('service.details', $row->slug) }}" class="nav-link {{ request()->is('service/'.$row->slug) ? 'active' : '' }}">{{ $row->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.faq') }}" class="nav-link {{ request()->routeIs('home.faq') ? 'active' : '' }}">FAQ</a>
                        </li>

                        <li class="nav-item">
                            <a href="https://learn.jsb-tech.com/" target="_blank" class="nav-link">Videos</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.products') }}" class="nav-link {{ request()->routeIs('home.products') ? 'active' : '' }}">Products</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.blogs') }}" class="nav-link {{ request()->routeIs('home.blogs') ? 'active' : '' }}">Blog</a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('home.contact') }}" class="nav-link {{ request()->routeIs('home.contact') ? 'active' : '' }}">Contact Us</a>
                        </li>

                        @auth
                            @if(auth()->user()->role_id == 2)
                                <li class="nav-item">
                                    <a href="{{ route('admin.index') }}" class="nav-link">
                                        Admin Panel
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->routeIs('admin.index') ? 'active' : '' }}">Admin Panel</a>
                                        </li>

                                        <li class="nav-item">
                                            <a href="{{ route('user-support.index') }}" class="nav-link">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link">
                                        My Account
                                        <i class="ri-arrow-down-s-line"></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item">
                                            <a href="{{ route('my-orders') }}" class="nav-link">Dashboard</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('my-orders') }}" class="nav-link">My Orders</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('user-support.index') }}" class="nav-link">Supports</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('logout') }}" class="nav-link">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            @endif

                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}">Login</a>
                            </li>
                        @endauth

                        <li class="nav-item d-flex">
                            <div class="dropdown cart_drop01 my-auto">
                                <a href="{{ route('home.cart') }}" class="btn default-btn px-3 py-2 {{ request()->routeIs('home.cart') ? 'active' : '' }}" data-toggle="dropdown">
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
