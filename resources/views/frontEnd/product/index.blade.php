@extends('frontEnd.master')
@section('content')
<!-- Start Products Area -->
<div class="products-area pt-100 pb-100">
    <div class="container">
        <div class="products-grid-sorting row align-items-center">
            <div class="col-lg-6 col-md-6 result-count">
                <p>Showing 1–8 of 12 Results</p>
            </div>

            <div class="col-lg-6 col-md-6 ordering">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <form class="search-form">
                            <input type="search" class="search-field" placeholder="Search your products">
                            <button type="submit"><i class="ri-search-line"></i></button>
                        </form>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="select-box">
                            <select>
                                <option>Default Sorting</option>
                                <option>Popularity</option>
                                <option>Latest</option>
                                <option>Price: Low To High</option>
                                <option>Price: High To Low</option>
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
                            <a href="products-details.html"><img src="{{asset($row->image)}}" alt="image"></a>

                            <div class="heart-line">
                                <a href="wishlist.html"><i class="ri-heart-line"></i></a>
                            </div>
                            <div class="heart-fill">
                                <a href="wishlist.html"><i class="ri-heart-fill"></i></a>
                            </div>
                            <div class="add-to-cart-btn">
                                <a href="#" class="default-btn" data-product-id="{{ $row->id }}">Add To Cart</a>
                            </div>
                        </div>
                        <div class="products-content">
                            <h3>
                                <a href="products-details.html">{{$row->name}}</a>
                            </h3>
                            <span>$ {{$row->price}}</span>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <a href="#" class="prev page-numbers"><i class="ri-arrow-left-s-line"></i></a>
                    <span class="page-numbers current" aria-current="page">1</span>
                    <a href="#" class="page-numbers">2</a>
                    <a href="#" class="page-numbers">3</a>
                    <a href="#" class="next page-numbers"><i class="ri-arrow-right-s-line"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Products Area -->

@endsection


