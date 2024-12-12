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

        <div class="page-pagination-one pt-15">
            <ul class="d-flex align-items-center">
                {{-- Previous Page Link --}}
                @if ($products->onFirstPage())
                    <li class="disabled"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>
                @else
                    <li><a href="{{ $products->previousPageUrl() }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                    @if ($page == $products->currentPage())
                        <li><a href="#" class="active">{{ $page }}</a></li>
                    @elseif ($page == 1 || $page == $products->lastPage() || abs($page - $products->currentPage()) < 2)
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @elseif ($loop->first || $loop->last)
                        <li> &nbsp; ... &nbsp;</li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($products->hasMorePages())
                    <li><a href="{{ $products->nextPageUrl() }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                @else
                    <li class="disabled"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                @endif
            </ul>
        </div>
    </div>
</div>
