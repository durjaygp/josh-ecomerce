{{-- frontEnd/inc/productGrid.blade.php --}}
<div class="container mt-2">
    <div class="row">
        @foreach($products as $row)
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



<div class="col-lg-12 col-md-12">
    <div class="pagination-area d-flex justify-content-center">
        {{ $products->links('frontEnd.inc.blogPaginate') }}
    </div>
</div>
