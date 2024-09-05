@extends('frontEnd.master')
@section('title')
    Products
@endsection
@section('content')


<!-- Start Products Area -->
<div class="products-area pt-100 pb-100">
    <div class="container">
        <div class="products-grid-sorting row align-items-center">
            <div class="col-lg-6 col-md-6 result-count">
                <p>Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} Results</p>
            </div>


            <div class="col-lg-6 col-md-6 ordering">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form id="search-form" class="search-form">
                            <input type="search" class="search-field" id="search-query" placeholder="Search your products">
                            <button><i class="ri-search-line"></i></button>
                        </form>

                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="select-box">
                            <select id="sort-options">
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

        <div class="row justify-content-center">
            @foreach($products as $row)
                <div class="col-lg-3 col-sm-6">
                    <div class="single-products-card">
                        <div class="products-image">
                            <a href="{{ route('home.product', $row->slug) }}">
                                <img src="{{ asset($row->image) }}" alt="image">
                            </a>

                            <div class="heart-line">
                                <a href="wishlist.html"><i class="ri-heart-line"></i></a>
                            </div>
                            <div class="add-to-cart-btn">
                                <a href="#" class="default-btn" data-product-id="{{ $row->id }}">Add To Cart</a>
                            </div>
                        </div>
                        <div class="products-content">
                            <h3>
                                <a href="{{ route('home.product', $row->slug) }}">{{ $row->name }}</a>
                            </h3>
                            <span>${{ $row->price }}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area d-flex justify-content-center">
                    {{ $products->links('frontEnd.inc.blogPaginate') }}
                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Products Area -->

@endsection

