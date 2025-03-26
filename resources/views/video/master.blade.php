<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>@yield('title')</title>
    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="{{asset('video_assets')}}/{{asset('video_assets')}}/img/favicon.png">
    <!-- Bootstrap core CSS-->
    <link href="{{asset('video_assets')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{asset('video_assets')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{asset('video_assets')}}/css/osahan.css" rel="stylesheet">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('video_assets')}}/vendor/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('video_assets')}}/vendor/owl-carousel/owl.theme.css">
</head>

<body id="page-top">
@include('video.inc.header')
<div id="wrapper">
    <!-- Sidebar -->
    @include('video.inc.sidebar')

    <div id="content-wrapper">
        <div class="container-fluid pb-0">
            <div class="top-mobile-search">
                <div class="row">
                    <div class="col-md-12">
                        <form class="mobile-search">
                            <div class="input-group">
                                <input type="text" placeholder="Search for..." class="form-control">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-dark"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @yield('content')
        @include('video.inc.footer')
    </div>
    <!-- /.content-wrapper -->
</div>
<!-- /#wrapper -->
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<script src="{{asset('video_assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" ></script>
<!-- Core plugin JavaScript-->
<script src="{{asset('video_assets/vendor/jquery-easing/jquery.easing.min.js')}}" ></script>
<!-- Owl Carousel -->
<script src="{{asset('video_assets/vendor/owl-carousel/owl.carousel.js')}}" ></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('video_assets/js/custom.js')}}" ></script>

    <script>
        $(document).ready(function() {
            $('#searchInput').on('keyup', function() {
                let query = $(this).val();
                if (query.length > 2) {
                    $.ajax({
                        url: "{{ route('search.videos') }}",
                        method: "GET",
                        data: { query: query },
                        success: function(data) {
                            $('#searchResults').html(data).show();
                        }
                    });
                } else {
                    $('#searchResults').hide();
                }
            });

            // Hide results when clicking outside
            $(document).on('click', function(event) {
                if (!$(event.target).closest('.search-results-container').length) {
                    $('#searchResults').hide();
                }
            });
        });
    </script>

</body>


</html>
