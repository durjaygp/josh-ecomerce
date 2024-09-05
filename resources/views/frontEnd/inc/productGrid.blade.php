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
