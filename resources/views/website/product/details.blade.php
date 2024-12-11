@extends('website.master')
@section('title')
    {{ $product->name }}
@endsection
@section('content')

    <!-- Product Details One -->
<div class="product-details-one lg-container lg-pt-150">
    <div class="breadcrumb-area pb-70">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <nav class="breadcrumb-style-one mt-20">
                    <ol class="breadcrumb bg-white style-none m0 p0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('home.products')}}">Products</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $product->name}} </li>
                    </ol>
                </nav>
                <div class="share-dropdown mt-20">
                    <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false">
                        Share
                    </button>
                    <div class="dropdown-menu">
                        <ul class="d-flex justify-content-between social-icon style-none">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /.breadcrumb-area -->
    <div class="container">
        <div class="row">
            <div class="col-lg-5 order-lg-2">
                <div class="tab-content product-img-tab-content h-100">
                    <div class="tab-pane fade show active h-100" id="img1" role="tabpanel" >
                        <div class="fancybox h-100 w-100 d-flex align-items-center justify-content-center">
                            <img src="{{asset($product->image)}}" alt="{{$product->name}}" class="m-auto">
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-7 order-lg-3">
                <div class="product-info pl-xl-5 md-mt-50">

                    <h3 class="product-name">{{$product->name}}</h3>
                    <div class="price">$ {{$product->price}}</div>
                    <p class="description-text">{{ $product->description }} </p>

                    <div class="button-group mt-30 d-sm-flex align-items-center">
                        <div class="add-to-cart-btn">
                            <a href="#" class="cart-btn mt-15 mr-sm-4 d-block default-btn" data-product-id="{{ $product->id }}">Add To Cart</a>
                        </div>
                    </div>
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
                            <p>{!! $product->main_content !!}</p>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div> <!-- /.product-details-one -->


<!-- Fancy Feature Forty Three-->
<div class="fancy-feature-fortyThree lg-container pt-100 pb-100 mt-130 mb-120 lg-pt-80 lg-pb-80 lg-mt-100 lg-mb-100">
    <div class="container">
        <div class="row align-items-center" data-aos="fade-up">
            <div class="col-lg-6">
                <div class="title-style-eleven text-center text-md-left">
                    <h2>Related Products</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row">
            @foreach($relatedProducts as $row)
                <div class="col-md-4">
                    <div class="card m-2 p-2">
                        <a href="{{ route('home.product', $row->slug) }}" class="d-flex align-items-center justify-content-center h-100">
                            <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" class="product-img tran4s">
                        </a>
                        <div class="text-center">
                            <a href="{{ route('home.product', $row->slug) }}" class="product-title">{{ $row->name }}</a>
                            <div class="price">$ {{ $row->price }}</div>
                            <div class="add-to-cart-btn">
                                <a href="#" class="btn btn-primary" data-product-id="{{ $row->id }}">Add to Cart</a>
                            </div>
                        </div>

                    </div>
                </div>

            @endforeach
        </div>
    </div>

</div>
    <!-- /.fancy-feature-fortyThree -->


@endsection
