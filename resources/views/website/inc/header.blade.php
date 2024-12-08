@php
    $cartCount = \App\Models\Cart::where('user_id', auth()->id())->count();
    $servics = \App\Models\Service::whereStatus(1)->latest()->get();
    $setting = setting();
@endphp

<div class="theme-main-menu sticky-menu theme-menu-two">
    <div class="d-flex align-items-center justify-content-center">
        <div class="logo"><a href="{{route('home')}}"><img src="{{asset($setting->website_logo)}}" alt="{{$setting->name ?? ""}}"></a></div>

        <nav id="mega-menu-holder" class="navbar navbar-expand-lg">
            <div  class="nav-container">
                <button class="navbar-toggler">
                    <span></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <div class="d-lg-flex justify-content-between align-items-center">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown position-static {{ request()->routeIs('home') ? 'active' : '' }}">
                                <a href="{{ route('home') }}" class="nav-link">Home</a>
                            </li>
                            <li class="nav-item dropdown position-static {{ request()->routeIs('home.about') ? 'active' : '' }}">
                                <a href="{{ route('home.about') }}" class="nav-link">About</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle {{ request()->routeIs('home.services') ? 'active' : '' }}" href="{{ route('home.services') }}" data-toggle="dropdown">Services</a>
                                <ul class="dropdown-menu">
                                    @foreach($servics as $row)
                                        <li class="nav-item">
                                            <a href="{{ route('service.details', $row->slug) }}" class="dropdown-item {{ request()->is('service/'.$row->slug) ? 'active' : '' }}">{{ $row->title }}</a>
                                        </li>
                                    @endforeach
                                </ul> <!-- /.dropdown-menu -->
                            </li>

                            <li class="nav-item dropdown position-static {{ request()->routeIs('home.faq') ? 'active' : '' }}">
                                <a href="{{ route('home.faq') }}" class="nav-link ">FAQ</a>
                            </li>


                            <li class="nav-item dropdown position-static">
                                <a href="https://learn.jsb-tech.com/" target="_blank" class="nav-link">Videos</a>
                            </li>

                            <li class="nav-item dropdown position-static {{ request()->routeIs('home.products') ? 'active' : '' }}">
                                <a href="{{ route('home.products') }}" class="nav-link">Products</a>
                            </li>

                            <li class="nav-item dropdown position-static {{ request()->routeIs('home.blogs') ? 'active' : '' }}">
                                <a href="{{ route('home.blogs') }}" class="nav-link ">Blog</a>
                            </li>

                            <li class="nav-item dropdown position-static {{ request()->routeIs('home.contact') ? 'active' : '' }}">
                                <a href="{{ route('home.contact') }}" class="nav-link">Contact Us</a>
                            </li>


                        </ul>

                        <ul class="right-widget">
                            <li class="d-sm-flex">


                                <ul class="user-login-button d-flex align-items-center justify-content-center">
                                    @auth
                                        @if(auth()->user()->role_id == 2)
                                            <li>
                                                <a href="{{route('admin.index')}}" class="signIn-action">Admin Panel</a>
                                            </li>
                                        @else
                                            <li>
                                                <a href="{{route('dashboard')}}" class="signIn-action">Dashboard</a>
                                            </li>
                                        @endif
                                    @else
                                        <li>
                                            <a href="{{route('login')}}" class="signIn-action">Login</a>
                                        </li>
                                    @endauth

                                    <li>
                                        <a href="{{route('home.cart')}}" class="signUp-action"> Cart <span class="ms-1 cart-count"></span></a>
                                    </li>
                                </ul>

                            </li>
                        </ul>



                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>
