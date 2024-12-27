@php
    $services = \App\Models\Service::whereStatus(1)->latest()->take(5)->get();
    $products = \App\Models\Product::whereStatus(1)->latest()->take(5)->get();
    $setting = setting();
    $social = \App\Models\SocialMediaLinks::first();
@endphp


<!--
=====================================================
    Footer
=====================================================
-->
<footer class="theme-footer-two pt-150 md-pt-80">
    <div class="top-footer">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-2 col-12 footer-about-widget">
                    <a href="{{route('home')}}" class="logo"><img src="{{asset($setting->website_logo)}}" alt="{{ $setting->name }}"></a>
                </div> <!-- /.about-widget -->
                <div class="col-md-4 footer-list">
                    <h5 class="footer-title">Products</h5>
                    <ul>
                        @foreach($products as $row)
                            <li><a href="{{route('home.product',$row->slug)}}">{{$row->name}}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- /.footer-list -->
                <div class="col-md-4 footer-list">
                    <h5 class="footer-title">Services</h5>
                    <ul>
                        @foreach($services as $row)
                            <li><a href="{{ route('service.details', $row->slug) }}">{{$row->title}}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- /.footer-list -->
                <div class="col-md-2 address-list">
                    <h5 class="footer-title">Address</h5>
                    <ul class="info">
                        <li><a href="#">{{$setting->address}}</a></li>
                        <li><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></li>
                        <li><a href="tel:{{$setting->phone}}" class="mobile-num">{{$setting->phone}}</a></li>
                    </ul>
                    <ul class="social-icon d-flex">
                        @if(!empty($social->facebook))
                            <li><a href="{{ $social->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        @endif
                        @if(!empty($social->twitter))
                            <li><a href="{{ $social->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        @endif
                        @if(!empty($social->whatsapp))
                            <li><a href="{{ $social->whatsapp }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        @endif
                        @if(!empty($social->youtube))
                            <li><a href="{{ $social->youtube }}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        @endif
                        @if(!empty($social->instagram))
                            <li><a href="{{ $social->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        @endif
                        @if(!empty($social->tiktok))
                            <li><a href="{{ $social->tiktok }}" target="_blank">
                                    <img src="{{asset('tiktok.png')}}" alt="">
                                </a></li>
                        @endif
                        @if(!empty($social->telegram))
                            <li><a href="{{ $social->telegram }}" target="_blank"><i class="fa fa-telegram"></i></a></li>
                        @endif
                        @if(!empty($social->snapchat))
                            <li><a href="{{ $social->snapchat }}" target="_blank"><i class="fa fa-snapchat"></i></a></li>
                        @endif
                        @if(!empty($social->pinterest))
                            <li><a href="{{ $social->pinterest }}" target="_blank"><i class="fa fa-pinterest"></i></a></li>
                        @endif
                    </ul>

                </div> <!-- /.footer-list -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </div> <!-- /.top-footer -->

    <div class="container">
        <div class="bottom-footer-content">
            <div class="d-flex align-items-center justify-content-center">
                <p>{{$setting->footer ?? ""}}</p>
            </div>
        </div> <!-- /.bottom-footer -->
    </div>
</footer> <!-- /.theme-footer-two -->


<!-- Scroll Top Button -->
<button class="scroll-top">
    <i class="fa fa-angle-up" aria-hidden="true"></i>
</button>



