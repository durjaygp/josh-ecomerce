@extends('website.master')
@section('title')
    Products
@endsection
@section('meta_tag')
    <meta name="description" content="{{setting()->description ?? ""}}">
    <meta name="keywords" content="{{setting()->keywords ?? ""}}">
    <meta property="og:title" content="{{setting()->name ?? ""}}">
    <meta property="og:type" content="Blog" />
    <meta property="og:description" content="{{setting()->description ?? ""}}" />
    <meta property="og:url" content="{{url('/')}}">

    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:title" content="{{setting()->name ?? ""}}" />
    <meta name="twitter:description" content="{{setting()->description ?? ""}}" />
    <meta name="twitter:url" content="{{url('/')}}" />
    <meta name="twitter:card" content="{{asset(optional(setting())->website_logo)}}">
@endsection

@section('content')
    <!-- Header -->
    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10 m-auto">
                    <h2 class="font-rubik">Product</h2>
                </div>
            </div>
        </div>
    </div> <!-- /.fancy-hero-one -->

    <!-- Start Products Area -->
    <div class="products-area pt-100 pb-100">
        <div class="container">
            <div class="products-grid-sorting row align-items-center m-2">
                <div class="col-lg-6 col-md-6 result-count">
                    <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} Results</p>
                </div>

                <div class="col-lg-6 col-md-6 ordering">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <form id="search-form" class="search-form">
                                <input type="search" class="search-field form-control" id="search-query" placeholder="Search your products" >
                                <button type="button"><i class="ri-search-line"></i></button>
                            </form>
                        </div>

                        <div class="col-lg-6 col-md-6">
                            <div class="select-box">
                                <select id="sort-options" class="form-control">
                                    <option value="default">Default Sorting</option>
                                    <option value="popularity">Popularity</option>
                                    <option value="latest">Latest</option>
                                    <option value="price_low_high">Price: Low To High</option>
                                    <option value="price_high_low">Price: High To Low</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid Container -->
            <div id="product-grid" class="row justify-content-center">
                @include('frontEnd.inc.productGrid', ['products' => $products])
            </div>
        </div>
    </div>
    <!-- End Products Area -->



@endsection
