@extends('video.master')
@section('title')
    {{$video->name}}
@endsection
@section('content')
    <div class="video-block section-padding">
            <div class="row">
                <div class="col-md-8">
                    <div class="single-video-left">
                        <div class="single-video">
                            <video
                                id="my-video"
                                class="video-js"
                                controls
                                preload="auto"
                                width="100%" height="315"
                                poster="{{asset($video->image)}}"
                                data-setup="{}"
                            >
                                <source src="{{ $videofile }}" type="video/mp4" />
                                <source src="{{ $videofile }}" type="video/webm" />
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                                    >supports HTML5 video</a
                                    >
                                </p>
                            </video>
                            <!--                              <iframe width="100%" height="315" src="https://www.youtube-nocookie.com/embed/8LWZSGNjuF0?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>-->
                        </div>



                        <div class="single-video-title box mb-3">
                            <h2><a href="#">{{$video->name}}</a></h2>
                            <p class="mb-0"><i class="fas fa-eye"></i> {{$video->views ?? "1"}} views</p>
                        </div>
                        <div class="single-video-author box mb-3">
                            <div class="float-right">
                                <button class="btn btn-danger" type="button">Subscribe <strong>1.4M</strong>
                                </button> <button class="btn btn btn-outline-danger" type="button"><i class="fas fa-bell"></i>
                                </button>
                            </div>
                            <img class="img-fluid" src="img/s4.png" alt="">
                            <p><a href="#"><strong>{{$video->category->name}}</strong></a>

                            </p>
                            <small>Published on {{$video->created_at->format('d M Y')}}</small>
                        </div>
                        <div class="single-video-info-content box mb-3">
                            <h6>Description :</h6>
                            <p>{!!  $video->description !!}</p>
                            <p>{!!  $video->main_content !!}</p>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="single-video-right">
                        <div class="row">
                            <div class="col-md-12">
                                @foreach($videos as $row)
                                <div class="video-card video-card-list">
                                    <div class="video-card-image">
                                        <a class="play-icon" href="{{route('home.video-details',$row->slug)}}"><i class="fas fa-play-circle"></i></a>
                                        <a href="{{asset($row->image)}}"><img class="img-fluid" src="{{asset($row->image)}}" alt="{{$row->name}}"></a>
                                        <div class="time">{{$row->length ?? "01.00"}}</div>
                                    </div>
                                    <div class="video-card-body">
                                        <div class="video-title">
                                            <a href="{{route('home.video-details',$row->slug)}}">{{$row->name}}</a>
                                        </div>
                                        <div class="video-page text-success">

                                            <a title="{{route('home.video-category',$row->category->slug)}}" class="text-success">       {{$row->category->name}}
                                                <i class="fas fa-check-circle text-success"></i>
                                            </a>
                                        </div>
                                        <div class="video-view">
                                            {{$row->views ?? "1"}} views &nbsp;<i class="fas fa-calendar-alt"></i> {{$row->created_at->format('d M Y')}}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
