<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('meta_tag')
    <link rel="shortcut icon" type="image/png" href="{{asset($website->fav_icon)}}" />
    <link rel="stylesheet" href="{{asset('homePage')}}/assets/css/tailwind.css">
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.10/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="{{asset('/')}}iziToast/dist/css/iziToast.min.css">
    <link rel="stylesheet" href="{{asset('homePage/clock.css')}}">

</head>

<body class="" style="">
<!-- background -->
<img src="{{asset('homePage')}}/assets/images/bg.jpg" alt="" class="fixed inset-0 object-cover w-screen h-screen -z-50">
<!-- Ads -->
<div class="container max-w-5xl p-4 mx-auto" style="height:4.5rem"></div>

<!-- Main Page -->
<div class="border-t border-dashed border-slate-400">

    @include('frontEnd.inc.header')

    <!-- Main content Start -->
    @yield('content')
    <!-- Main content End -->

    <!-- Footer -->
    @include('frontEnd.inc.footer')

</div>



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
<script src="{{asset('homePage/clock.js')}}"></script>

</body>
</html>
