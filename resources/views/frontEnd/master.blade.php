<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, follow" />
    @yield('meta_tag')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset(optional(setting())->fav_icon)}}" />


    <link rel="canonical" href="https://jsb-tech.com/">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <link rel="stylesheet" href="{{asset('/')}}iziToast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/aos.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/animate.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/meanmenu.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/remixicon.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/odometer.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/magnific-popup.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/fancybox.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/nice-select.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/navbar.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/footer.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/dark.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/responsive.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/image-uploader.min.css">
    <link rel="stylesheet" href="{{asset('homePage')}}/fancybox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script>
        var SITE_URL = "https:\/\/jsb-tech.com"
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QCJ76SN2K4"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-QCJ76SN2K4');
    </script>

    <style>
        .main-hero-content{
            background: #00000028 !important;
            padding: 10px !important;
        }
    </style>
</head>
<body>
<!-- Header Section -->
@include('frontEnd.inc.header')

<!-- Content Section -->
<main>
  @yield('content')
</main>

@include('frontEnd.inc.footer')
<!-- End Footer Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="ri-arrow-up-s-line"></i>
</div>
<script src="{{asset('homePage')}}/assets/js/jquery.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/jquery.meanmenu.js"></script>
<script src="{{asset('homePage')}}/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/jquery.appear.js"></script>
<script src="{{asset('homePage')}}/assets/js/odometer.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/fancybox.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/tweenmax.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/ScrollMagic.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/animation.gsap.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/debug.addIndicators.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/mixitup.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/nice-select.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/tilt.jquery.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/parallax.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/form-validator.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/contact-form-script.js"></script>
<script src="{{asset('homePage')}}/assets/js/aos.js"></script>
<script src="{{asset('homePage')}}/assets/js/wow.min.js"></script>
<script src="{{asset('homePage')}}/assets/js/main.js"></script>
<script src="{{asset('homePage')}}/image-uploader.min.js"></script>
<script src="{{asset('homePage')}}/fancybox.min.js"></script>
<script src="{{asset('/')}}iziToast/dist/js/iziToast.min.js"></script>



@if($errors->any())
    @foreach($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position:'topRight',
                message: '{{$error}}',
            });
        </script>
    @endforeach
@endif


@if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position:'topRight',
            message: '{{session()->get('success')}}',
        });

    </script>
@endif

@if(session()->get('error'))
    <script>
        iziToast.error({
            title: '',
            position:'topRight',
            message: '{{session()->get('error')}}',
        });
    </script>
@endif

<script src="{{asset('homePage/custom.js')}}"></script>
@yield('script')
</body>
</html>
