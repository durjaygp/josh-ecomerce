@extends('website.master')
@section('title')
    {{$blog->name}}
@endsection
@section('meta_tag')
    <meta name="description" content="{{$blog->seo_description}}">
    <link rel="canonical" href="{{url('/')}}/blog/{{$blog->slug}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$blog->name}}">
    <meta property="og:description" content="{{$blog->seo_description}}">
    <meta property="og:tags" content="{{$blog->seo_tags}}">
    <meta property="og:keywords" content="{{$blog->seo_keywords}}">
    <meta property="og:url" content="{{url('/')}}/blog/{{$blog->slug}}">
    <meta property="og:site_name" content="{{ setting()->name ?? ""}}">
    <meta property="og:image" content="{{asset($blog->image)}}">
    <meta property="og:image:secure_url" content="{{asset($blog->image)}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{$blog->name}}">
    <meta name="twitter:title" content="{{$blog->name}}">
    <meta name="twitter:image" content="{{asset($blog->image)}}">
@endsection
@section('content')
<div class="fancy-hero-one">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto">
                <h2 class="font-rubik">{{$blog->name}}</h2>
            </div>
        </div>
    </div>
</div>

<div class="blog-page-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 feature-blog-one width-lg blog-details-post-v1">
                <div class="post-meta">
                    <img src="{{asset($blog->image)}}" alt="{{$blog->name}}" class="image-meta">
                    <div class="tag">{{$blog->created_at->format('M d, Y')}}</div>
                    <h3 class="title">{{$blog->name}}</h3>
                    <p>{!! $blog->description !!}</p>
                    <p>{!! $blog->main_content !!}</p>
                </div>

                <style>
                    .comment-area .row {
                        align-items: flex-start; /* Ensures alignment starts at the top of each column */
                    }

                    .comment-area .blog-title {
                        font-size: 1.25rem;
                        font-weight: bold;
                        /*margin-bottom: 0.5rem;*/
                        display: block;
                    }

                    .comment-area .blog-description {
                        font-size: 1rem;
                        line-height: 1.5;
                        /*margin-top: 0.5rem;*/
                        color: #555;
                    }

                    img.img-fluid {
                        border-radius: 5px;
                        width: 100%; /* Ensures images are responsive */
                    }

                    .row.border-1.p-2 {
                        margin-bottom: 1rem;
                    }

                    .col-md-8 {
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                    }

                </style>
                <!-- /.post-meta -->
                <div class="comment-area">
                    <h3 class="title">Related Blogs</h3>
                    @foreach($blogs as $row)
                        <div class="row border-1 p-2">
                            <div class="col-md-4">
                                <a href="{{route('home.blog',$row->slug)}}">
                                    <img src="{{asset($row->image)}}" alt="" class="img-fluid">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <a href="{{route('home.blog',$row->slug)}}" class="blog-title">{{$row->name}}</a>
                                <br>
                                <p class="blog-description">{!! $row->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div> <!-- /.comment-area -->





                {{--                <div class="comment-area">--}}
{{--                    <h3 class="title">2 Comments</h3>--}}
{{--                    <div class="single-comment">--}}
{{--                        <div class="d-flex">--}}
{{--                            <img src="images/blog/media_30.png" alt="" class="user-img">--}}
{{--                            <div class="comment">--}}
{{--                                <h6 class="name">Al Hasani</h6>--}}
{{--                                <div class="time">13 June, 2018, 7:30pm</div>--}}
{{--                                <p>One touch of a red-hot stove is usually all we need to avoid that kind of discomfort in future. The same true we experience </p>--}}
{{--                                <button class="reply">Reply</button>--}}
{{--                            </div> <!-- /.comment -->--}}
{{--                        </div>--}}
{{--                    </div> <!-- /.single-comment -->--}}
{{--                    <div class="single-comment">--}}
{{--                        <div class="d-flex">--}}
{{--                            <img src="images/blog/media_31.png" alt="" class="user-img">--}}
{{--                            <div class="comment">--}}
{{--                                <h6 class="name">Rashed ka.</h6>--}}
{{--                                <div class="time">13 June, 2018, 7:30pm</div>--}}
{{--                                <p>One touch of a red-hot stove is usually all we need to avoid that kind of discomfort in future. The same true we experience </p>--}}
{{--                                <button class="reply">Reply</button>--}}
{{--                            </div> <!-- /.comment -->--}}
{{--                        </div>--}}
{{--                    </div> <!-- /.single-comment -->--}}
{{--                </div> <!-- /.comment-area -->--}}

{{--                <div class="comment-form-section">--}}
{{--                    <h3 class="title">Leave A Comment</h3>--}}
{{--                    <p><a href="login.html">Sign in</a> to post your comment or singup if you dont have any account.</p>--}}
{{--                    <div class="form-style-light">--}}
{{--                        <form action="#">--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="input-group-meta mb-35">--}}
{{--                                        <label>Name</label>--}}
{{--                                        <input type="text" placeholder="Michel">--}}
{{--                                        <span class="placeholder_icon valid-sign"><img src="images/icon/18.svg" alt=""></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="input-group-meta mb-35">--}}
{{--                                        <label>Your Email</label>--}}
{{--                                        <input type="email" placeholder="gobapubo@jogi.net">--}}
{{--                                        <span class="placeholder_icon valid-sign"><img src="images/icon/18.svg" alt=""></span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12">--}}
{{--                                    <div class="input-group-meta lg mb-35">--}}
{{--                                        <label>Your Message</label>--}}
{{--                                        <textarea placeholder="Write your message here..."></textarea>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12"><button class="theme-btn-one btn-lg">Post Comment</button></div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div> <!-- /.form-style-light -->--}}
{{--                </div> <!-- /.comment-form-section -->--}}
            </div>
            <div class="col-lg-4 col-md-6">
                @include('website.inc.blogSidebar')
            </div>
        </div>
    </div>
</div>


@endsection

