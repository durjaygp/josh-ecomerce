@extends('website.master')
@section('title')
    {{$category->name}}
@endsection
@section('content')

<div class="fancy-hero-one">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-10 m-auto">
                <h2 class="font-rubik">{{$category->name}}</h2>
                <p>{!! $category->description !!}</p>
            </div>
        </div>
    </div>
</div>


<div class="feature-blog-one blog-page-bg">
    <div class="container">
        <div class="row">
            @foreach($blogs as $row)
                <div class="col-lg-4 col-md-6 aos-init" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="50">
                    <div class="post-meta">
                        <img src="{{asset($row->image)}}" alt="{{$row->name}}" class="image-meta">
                        <div class="tag">{{$row->category?->name}}</div>
                        <h3><a href="{{ route('home.blog', $row->slug) }}" class="title">{{$row->name}}</a></h3>
                        <a href="{{ route('home.blog', $row->slug) }}" class="read-more d-flex justify-content-between align-items-center">
                            <span>Read More</span>
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div> <!-- /.post-meta -->
                </div>
            @endforeach


        </div>

        <div class="row mt-30 md-mt-10 aos-init" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="50">
            <div class="text-center">
                <div class="page-pagination-one pt-15">
                    <ul class="d-flex align-items-center">
                        {{-- Previous Page Link --}}
                        @if ($blogs->onFirstPage())
                            <li class="disabled"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>
                        @else
                            <li><a href="{{ $blogs->previousPageUrl() }}"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)
                            @if ($page == $blogs->currentPage())
                                <li><a href="#" class="active">{{ $page }}</a></li>
                            @elseif ($page == 1 || $page == $blogs->lastPage() || abs($page - $blogs->currentPage()) < 2)
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @elseif ($loop->first || $loop->last)
                                <li> &nbsp; ... &nbsp;</li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($blogs->hasMorePages())
                            <li><a href="{{ $blogs->nextPageUrl() }}"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        @else
                            <li class="disabled"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>
                        @endif
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
