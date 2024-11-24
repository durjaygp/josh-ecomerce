<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Digital marketing agency, Digital marketing company, Digital marketing services, sass, software company">
    <meta name="description" content="Deski is a creative saas and software html template designed for saas and software Agency websites.">
    <meta property="og:site_name" content="deski">
    <meta property="og:url" content="https://heloshape.com/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Deski: creative saas and software html template">
    <meta name='og:image' content='images/assets/ogg.png'>
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- For Resposive Device -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- For Window Tab Color -->
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#fd6a5e">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#fd6a5e">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#fd6a5e">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset('website')}}/images/fav-icon/icon.png">
    <!-- Main style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('website')}}/css/style.css">
    <!-- responsive style sheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('website')}}/css/responsive.css">

    <!-- Fix Internet Explorer ______________________________________-->
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="{{asset('website')}}/vendor/html5shiv.js"></script>
    <script src="{{asset('website')}}/vendor/respond.js"></script>
    <![endif]-->
</head>

<body>
<div class="main-page-wrapper">
    <!-- ===================================================
        Loading Transition
    ==================================================== -->
{{--    <section>--}}
{{--        <div id="preloader">--}}
{{--            <div id="ctn-preloader" class="ctn-preloader">--}}
{{--                <div class="animation-preloader">--}}
{{--                    <div class="spinner"></div>--}}
{{--                    <div class="txt-loading">--}}
{{--								<span data-text-preloader="D" class="letters-loading">--}}
{{--									D--}}
{{--								</span>--}}
{{--                        <span data-text-preloader="E" class="letters-loading">--}}
{{--									E--}}
{{--								</span>--}}
{{--                        <span data-text-preloader="S" class="letters-loading">--}}
{{--									S--}}
{{--								</span>--}}
{{--                        <span data-text-preloader="K" class="letters-loading">--}}
{{--									K--}}
{{--								</span>--}}
{{--                        <span data-text-preloader="I" class="letters-loading">--}}
{{--									I--}}
{{--								</span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}


    <!-- ==== Theme Main Menu == -->
        @include('website.inc.header')
    <!-- /.theme-main-menu -->


        @yield('content')

   @include('website.inc.footer')
    <!-- Optional JavaScript _____________________________  -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="{{asset('website')}}/vendor/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Popper js -->
    <script src="{{asset('website')}}/vendor/popper.js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="{{asset('website')}}/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- menu  -->
    <script src="{{asset('website')}}/vendor/mega-menu/assets/js/custom.js"></script>
    <!-- AOS js -->
    <script src="{{asset('website')}}/vendor/aos-next/dist/aos.js"></script>
    <!-- js count to -->
    <script src="{{asset('website')}}/vendor/jquery.appear.js"></script>
    <script src="{{asset('website')}}/vendor/jquery.countTo.js"></script>
    <!-- Slick Slider -->
    <script src="{{asset('website')}}/vendor/slick/slick.min.js"></script>
    <!-- Theme js -->
    <script src="{{asset('website')}}/js/theme.js"></script>

</div>
</body>
</html>
