@php
    $services = \App\Models\Service::whereStatus(1)->latest()->take(5)->get();
    $products = \App\Models\Product::whereStatus(1)->latest()->take(5)->get();
    $setting = setting();
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
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
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



