@extends('website.master')
@section('title')
    About Us
@endsection
@section('content')

    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10 m-auto">
                    <h2 class="font-rubik">About Us</h2>
                </div>
            </div>
        </div>
    </div>



    <!-- Start About Area -->
<div class="about-area border-none pt-100 pb-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 order-lg-2">
                <div class="tab-content product-img-tab-content h-100">
                    <div class="tab-pane fade show active h-100" id="img1" role="tabpanel" >
                        <div class="fancybox h-100 w-100 d-flex align-items-center justify-content-center">
                            <img src="{{asset($about->image)}}" alt="{{$about->name}}" class="m-auto">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 order-lg-3">
                <div class="product-info pl-xl-5 md-mt-50">

                    <h3 class="product-name">{{$about->title}}</h3>
                    <p class="description-text">{{ $about->description }} </p>
                    <a href="{{route('home.products')}}" class="theme-btn-five mt-3">Products</a>
                </div> <!-- /.product-info -->
            </div>
        </div>

        <div class="product-review-tab mt-150 lg-mt-100">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <button class="nav-link active" data-toggle="tab" data-target="#item1" type="button" role="tab" aria-selected="true">Description</button>
                </li>
            </ul>
            <div class="tab-content mt-40 lg-mt-20">
                <div class="tab-pane fade show active" id="item1" role="tabpanel" >
                    <div class="row gx-5">
                        <div class="col-xl-12">
                            <p>{!! $about->main_content !!}</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<!-- End About Area -->
@endsection
