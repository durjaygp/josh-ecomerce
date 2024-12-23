@extends('frontEnd.master')
@section('title')
{{ $product->name }}
@endsection
@section('content')

    <!-- Start Products Details Area -->
    <section class="products-details-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="products-details-image">
                        <a data-fancybox="gallery" href="{{asset($product->image)}}">
                            <img src="{{asset($product->image)}}" alt="image">
                        </a>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="products-details-desc">
                        <h3>{{$product->name}}</h3>
                        <div class="price">
                            <span class="old-price">${{$product->price}}</span>
                        </div>
                        <p>{!! $product->description !!}</p>
                        <div class="products-meta">
                            <span>Category: <a href="#" class="in-stock" style="color: #05CE69;">{{$product->productCategory?->name}}</a></span>
                        </div>
                        <div class="products-add-to-cart align-items-center">
{{--                            <div class="input-counter">--}}
{{--                                <span class="minus-btn"><i class="ri-subtract-line"></i></span>--}}
{{--                                <input type="text" value="1">--}}
{{--                                <span class="plus-btn"><i class="ri-add-line"></i></span>--}}
{{--                            </div>--}}
                            <div class="add-to-cart-btn">
                                <a href="#" class="default-btn" data-product-id="{{ $product->id }}">Add To Cart</a>
                            </div>
{{--                            <button type="submit" class="default-btn"><span>Add to Cart</span></button>--}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="products-details-tabs">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item"><a class="nav-link active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description">Description</a></li>
{{--                    <li class="nav-item"><a class="nav-link" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab" aria-controls="reviews">Reviews (1)</a></li>--}}
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="description" role="tabpanel">
                        <div class="content">
                            <p>{!! $product->main_content !!}</p>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                        <div class="products-reviews">
                            <h3>Products Rating</h3>
                            <div class="rating">
                                <span class="ri-star-fill checked"></span>
                                <span class="ri-star-fill checked"></span>
                                <span class="ri-star-fill checked"></span>
                                <span class="ri-star-fill checked"></span>
                                <span class="ri-star-fill"></span>
                            </div>
                            <div class="rating-count">
                                <span>4.1 average based on 4 reviews.</span>
                            </div>
                            <div class="row">
                                <div class="side">
                                    <div>5 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-5"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>02</div>
                                </div>
                                <div class="side">
                                    <div>4 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-4"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>03</div>
                                </div>
                                <div class="side">
                                    <div>3 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-3"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>04</div>
                                </div>
                                <div class="side">
                                    <div>2 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-2"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>05</div>
                                </div>
                                <div class="side">
                                    <div>1 star</div>
                                </div>
                                <div class="middle">
                                    <div class="bar-container">
                                        <div class="bar-1"></div>
                                    </div>
                                </div>
                                <div class="side right">
                                    <div>00</div>
                                </div>
                            </div>
                        </div>

                        <div class="products-review-comments">
                            <h3>Reviews</h3>
                            <div class="user-review">
                                <img src="{{asset('homePage/assets/images/products/image-1.jpg')}}" alt="image">

                                <div class="review-rating">
                                    <div class="review-stars">
                                        <i class='ri-star-fill checked'></i>
                                        <i class='ri-star-fill checked'></i>
                                        <i class='ri-star-fill checked'></i>
                                        <i class='ri-star-fill checked'></i>
                                        <i class='ri-star-fill checked'></i>
                                    </div>

                                    <span class="d-inline-block">James Anderson</span>
                                </div>

                                <span class="d-block sub-comment">Excellent</span>
                                <p>Very well built theme, couldn't be happier with it. Can't wait for future updates to see what else they add in.</p>
                            </div>
                        </div>

                        <div class="review-form-wrapper">
                            <h3>Add a Review</h3>
                            <p class="comment-notes">Your email address will not be published. Required fields are marked <span>*</span></p>

                            <form>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="rating">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *">
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *">
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-group">
                                            <textarea placeholder="Your review" class="form-control" cols="30" rows="6"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <p class="comment-form-cookies-consent">
                                            <input type="checkbox" id="test">
                                            <label for="test">Save my name, email, and website in this browser for the next time I comment.</label>
                                        </p>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn">
                                            <span>Submit</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Products Details Area -->

    <!-- Start Products Area -->
    <div class="products-area pb-75">
        <div class="container">
            <div class="related-title">
                <h2>Related Products</h2>
            </div>

            <div class="row justify-content-center">
                @foreach($relatedProducts as $row)
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-products-card">
                            <div class="products-image">
                                <a href="{{route('home.product',$row->slug)}}"><img src="{{asset($row->image)}}" alt="image"></a>

                                <div class="heart-line">
                                    <a href="{{route('home.product',$row->slug)}}"><i class="ri-heart-line"></i></a>
                                </div>
                                <div class="add-to-cart-btn">
                                    <a href="#" class="default-btn" data-product-id="{{ $row->id }}">Add To Cart</a>
                                </div>
                            </div>
                            <div class="products-content">
                                <h3>
                                    <a href="{{route('home.product',$row->slug)}}">{{$row->name }}</a>
                                </h3>
                                <span>$ {{$row->price}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- End Products Area -->

@endsection


