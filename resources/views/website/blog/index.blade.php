@extends('website.master')
@section('title')
Blog
@endsection
@section('content')


    <!--
			=============================================
				Fancy Hero One
			==============================================
			-->
    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10 m-auto">
                    <h2 class="font-rubik">Blog</h2>
                </div>
            </div>
        </div>
    </div> <!-- /.fancy-hero-one -->



    <!--
    =====================================================
        Feature Blog One
    =====================================================
    -->
    <div class="blog-page-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 feature-blog-one width-lg">
                    @foreach($blogs as $row)
                    <div class="post-meta">
                        <img src="{{asset($row->image)}}" alt="{{$row->name}}" class="image-meta">
                        <div class="tag">{{$row->created_at->format('d M Y')}}</div>
                        <h3><a href="{{route('home.blog',$row->slug)}}" class="title">{{\Illuminate\Support\Str::limit($row->name, 70)}}</a></h3>
                        <p>{{ \Illuminate\Support\Str::limit($row->description,147) }}</p>
                        <a href="{{route('home.blog',$row->slug)}}" class="read-more d-flex justify-content-between align-items-center">
                            <span>Read More</span>
                            <i class="flaticon-right-arrow"></i>
                        </a>
                    </div> <!-- /.post-meta -->
                    @endforeach

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
                <div class="col-lg-4 col-md-6">
                    @include('website.inc.blogSidebar')
                </div>
            </div>
        </div>
    </div> <!-- /.feature-blog-one -->



@endsection

