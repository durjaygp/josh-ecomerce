<!DOCTYPE html>
<html lang="en">
<head>
    <!--  Title -->
    <title>@yield('title')</title>
    <!--  Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--  Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{asset(optional(setting())->fav_icon)}}" />
    <!-- Owl Carousel -->
    @yield('style')
    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css">
    <!-- Core Css -->
    <link  id="themeColors"  rel="stylesheet" href="{{asset('back')}}/assets/css/style.min.css" />
    <link rel="stylesheet" href="{{asset('/')}}iziToast/dist/css/iziToast.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<!-- Preloader -->
<div class="preloader">
    <img src="{{asset(optional(setting())->fav_icon)}}" alt="loader" class="lds-ripple img-fluid" />
</div>
<!-- Preloader -->
<div class="preloader">
    <img src="{{asset(optional(setting())->fav_icon)}}" alt="loader" class="lds-ripple img-fluid" />
</div>
<!-- Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('backEnd.inc.sidebar')
    <!-- Sidebar End -->
    <!-- Main wrapper -->
    <div class="body-wrapper">
        <!-- Header Start -->
        @include('backEnd.inc.header')
        <!-- Header End -->
      @yield('content')
        <!-- container-fluid over -->
    </div>
    <div class="dark-transparent sidebartoggler"></div>
</div>

<!-- Import Js Files -->
<script src="{{asset('back')}}/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="{{asset('back')}}/assets/libs/simplebar/dist/simplebar.min.js"></script>
<script src="{{asset('back')}}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- core files -->
<script src="{{asset('back')}}/assets/js/app.min.js"></script>
<script src="{{asset('back')}}/assets/js/app.init.js"></script>
<script src="{{asset('back')}}/assets/js/app-style-switcher.js"></script>
<script src="{{asset('back')}}/assets/js/sidebarmenu.js"></script>
<script src="{{asset('back')}}/assets/js/custom.js"></script>
<script src="{{asset('back')}}/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{asset('back')}}/assets/js/dashboard2.js"></script>
<script src="{{asset('back')}}/assets/js/apps/contact.js"></script>
<script src="{{asset('/')}}iziToast/dist/js/iziToast.min.js"></script>
<script src="{{asset('back')}}/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('back')}}/assets/js/datatable/datatable-basic.init.js"></script>
@yield('script')

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

@if(session()->get('warning'))
    <script>
        iziToast.warning({
            title: '',
            position:'topRight',
            message: '{{session()->get('warning')}}',
        });
    </script>
@endif

</body>
</html>
