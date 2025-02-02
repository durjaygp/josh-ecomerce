@php
$setting = setting();
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
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
    @yield('style')
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

    <style>
        /* Floating Button */
        .open-chat-btn {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            color: white;
            font-size: 24px;
            border-radius: 50%;
            border: none;
            padding: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            cursor: pointer;
        }

        /* Chat Popup Modal */
        .chat-popup {
            position: fixed;
            bottom: -400px; /* Initially off-screen */
            right: 20px;
            width: 300px;
            max-width: 100%;
            transition: bottom 0.3s ease-in-out;
        }

        /* Chat Body Styles */
        .chat-body {
            max-height: 200px;
            overflow-y: auto;
        }

        .chat-footer input {
            width: 100%;
        }
    </style>
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
                    position:'bottomRight',
                    message: '{{$error}}',
            });
            </script>
        @endforeach
    @endif


    @if(session()->get('success'))
        <script>
            iziToast.success({
                title: '',
                position:'bottomRight',
                message: '{{session()->get('success')}}',
        });

        </script>
    @endif

    @if(session()->get('error'))
        <script>
            iziToast.error({
                title: '',
                position:'bottomRight',
                message: '{{session()->get('error')}}',
        });
        </script>
    @endif

    <script src="{{asset('homePage/custom.js')}}"></script>
    @yield('script')
    <!-- Chat Box Popup Modal (Initially Hidden) -->
    <div id="chat-popup" class="chat-popup">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Chat with us</h5>
                <button id="close-chat" class="close">
                    <span>&times;</span>
                </button>
            </div>
            <div class="card-body chat-body">
                <p>Hello! How can we assist you today?</p>
            </div>
            <div class="card-footer">
                <input type="text" class="form-control" placeholder="Type a message...">
                <button class="btn btn-primary btn-block mt-2">Send</button>
            </div>
        </div>
    </div>
    <!-- Button to Open Chat Box -->
    <button id="open-chat" class="open-chat-btn">
        💬
    </button>
    <script>
        // Get references to the elements
        const openChatBtn = document.getElementById('open-chat');
        const chatPopup = document.getElementById('chat-popup');
        const closeChatBtn = document.getElementById('close-chat');

        // Show chat popup when the button is clicked
        openChatBtn.addEventListener('click', () => {
            chatPopup.style.bottom = '20px'; // Slide chat box to the screen
        });

        // Close the chat popup when the close button is clicked
        closeChatBtn.addEventListener('click', () => {
            chatPopup.style.bottom = '-400px'; // Hide chat box off-screen
        });
    </script>
</div>
</body>
</html>
