@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li><a href="#" class="prev page-numbers"><i class="ri-arrow-left-s-line"></i></a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="prev page-numbers"><i class="ri-arrow-left-s-line"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="page-numbers current" aria-current="page">{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="page-numbers">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="next page-numbers"><i class="ri-arrow-right-s-line"></i></a></li>
        @else
            <li class="disabled"><span><i class="ri-arrow-right-s-line"></i></span></li>
        @endif
    </ul>
@endif
