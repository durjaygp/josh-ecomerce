{{-- frontEnd/inc/productGrid.blade.php --}}

@foreach($products as $row)
    <div class="col-lg-3 col-sm-6">
        <div class="single-products-card">
            <div class="products-image">
                <a href="{{ route('home.product', $row->slug) }}">
                    <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" class="img-fluid" style="width: 350px; height: 180px;">
                </a>

            </div>
            <div class="products-content">
                <h6>
                    <a href="{{ route('home.product', $row->slug) }}">{{ $row->name }}</a>
                </h6>
                <span>${{ $row->price }}</span>
                <div class="add-to-cart-btn">
                    <a href="#" class="default-btn btn btn-success" data-product-id="{{ $row->id }}">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
@endforeach

<div class="col-lg-12 col-md-12">
    <div class="pagination-area d-flex justify-content-center">
        {{ $products->links('frontEnd.inc.blogPaginate') }}
    </div>
</div>
