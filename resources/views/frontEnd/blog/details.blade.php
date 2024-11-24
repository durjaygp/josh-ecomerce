@extends('frontEnd.master')
@section('title')
    {{ $blog->name }}
@endsection
@section('meta_tag')
    <meta name="description" content="{{$blog->seo_description}}">
    <link rel="canonical" href="{{url('/')}}/details/{{$blog->slug}}">
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
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content text-center" data-aos="fade-up" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2 class="text-black">@yield('title')</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}">Home</a>
                    </li>
                    <li>Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->

    <!-- Start Blog Details Area -->
    <div class="blog-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-image">
                            <img src="{{asset($blog->image)}}" alt="{{$blog->name}}">
                        </div>

                        <div class="article-content">
                            <ul class="entry-list">
                                <li>By <a href="#">{{$blog->user?->name}}</a></li>
                                <li>{{$blog->created_at->format('d M Y')}}</li>
                            </ul>
                            <h3>{{$blog->name}}</h3>
                            <p>{!! $blog->description !!}</p>
                            <p>{!! $blog->main_content !!}</p>
                        </div>

                        <div class="article-share">
                            <div class="row align-items-center">
                                <div class="col-lg-6 col-md-6">
                                    <div class="share-content">
                                        <h4>Share The Article:</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <ul class="share-social text-end">
                                        @php
                                            $url = route('home.blog', $blog->slug);
                                        @endphp
                                        <li>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank">
                                                <i class="ri-facebook-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}" target="_blank">
                                                <i class="ri-twitter-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.youtube.com/share?url={{ urlencode($url) }}" target="_blank">
                                                <i class="ri-youtube-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://vimeo.com/share?url={{ urlencode($url) }}" target="_blank">
                                                <i class="ri-vimeo-fill"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="https://www.instagram.com/?url={{ urlencode($url) }}" target="_blank">
                                                <i class="ri-instagram-line"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>


{{--                        <div class="article-comments">--}}
{{--                            <h3>03 Comments:</h3>--}}

{{--                            <div class="comments-list">--}}
{{--                                <img src="assets/images/blog-details/image-1.jpg" alt="image">--}}
{{--                                <h5>Daniel John, <span>2 months ago</span></h5>--}}
{{--                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>--}}
{{--                                <a href="#" class="reply-btn">Reply</a>--}}
{{--                            </div>--}}
{{--                            <div class="comments-list children">--}}
{{--                                <img src="assets/images/blog-details/image-2.jpg" alt="image">--}}
{{--                                <h5>Suzana Zamal, <span>2 months ago</span></h5>--}}
{{--                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>--}}
{{--                                <a href="#" class="reply-btn">Reply</a>--}}
{{--                            </div>--}}
{{--                            <div class="comments-list">--}}
{{--                                <img src="assets/images/blog-details/image-3.jpg" alt="image">--}}
{{--                                <h5>Victor James, <span>2 months ago</span></h5>--}}
{{--                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua.</p>--}}
{{--                                <a href="#" class="reply-btn">Reply</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="article-leave-comment">--}}
{{--                            <h3>Leave a reply</h3>--}}

{{--                            <form>--}}
{{--                                <div class="row justify-content-center">--}}
{{--                                    <div class="col-lg-6 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control" placeholder="Enter name">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-6 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control" placeholder="Email address">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <input type="text" class="form-control" placeholder="Website">--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <div class="form-group">--}}
{{--                                            <textarea name="message" class="form-control" placeholder="Your message"></textarea>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <p class="form-cookies-consent">--}}
{{--                                            <input type="checkbox" id="test1">--}}
{{--                                            <label for="test1">Save my name, email, and website in this browser for the next time I comment.</label>--}}
{{--                                        </p>--}}
{{--                                    </div>--}}

{{--                                    <div class="col-lg-12 col-md-12">--}}
{{--                                        <button type="submit" class="default-btn">Post A Comment</button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    @include('frontEnd.inc.blogSidebar')
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog Details Area -->


@endsection
