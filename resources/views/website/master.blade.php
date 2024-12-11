@php
$setting = setting();
@endphp
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#fd6a5e">
    <meta name="msapplication-navbutton-color" content="#fd6a5e">
    <meta name="apple-mobile-web-app-status-bar-style" content="#fd6a5e">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" sizes="56x56" href="{{asset($setting->fav_icon)}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('website/css/responsive.css')}}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('/')}}iziToast/dist/css/iziToast.min.css">
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <script src="{{asset('website')}}/vendor/html5shiv.js"></script>
    <script src="{{asset('website')}}/vendor/respond.js"></script>
    <![endif]-->
</head>

<body>
<div class="main-page-wrapper">


    <!-- ==== Theme Main Menu == -->
        @include('website.inc.header')
    <!-- /.theme-main-menu -->


        @yield('content')

   @include('website.inc.footer')
    <!-- Optional JavaScript _____________________________  -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- jQuery -->
    <script src="{{asset('homePage')}}/assets/js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Popper js -->
    <script src="{{asset('website/vendor/popper.js/popper.min.js')}}"></script>
    <script src="{{asset('website/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('website/vendor/mega-menu/assets/js/custom.js')}}"></script>
    <script src="{{asset('website/vendor/aos-next/dist/aos.js')}}"></script>
    <script src="{{asset('website/vendor/jquery.appear.js')}}"></script>
    <script src="{{asset('website/vendor/jquery.countTo.js')}}"></script>
    <script src="{{asset('website/vendor/slick/slick.min.js')}}"></script>
    <script src="{{asset('website/js/theme.js')}}"></script>
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
</div>
</body>
</html>
