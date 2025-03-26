@extends('video.master')
@section('title')
    Videos
@endsection
@section('content')



        <hr>
        <div class="video-block section-padding">
            <div class="row">
                @foreach($videos as $row)
                    <div class="col-xl-3 col-sm-6 mb-3">
                        <div class="video-card">
                            <div class="video-card-image">
                                <a class="play-icon" href="{{route('home.video-details',$row->slug)}}"><i class="fas fa-play-circle"></i></a>
                                <a href="{{route('home.video-details',$row->slug)}}"><img class="img-fluid" src="{{asset($row->image)}}" alt="{{$row->name}}"></a>
                                <div class="time">{{$row->length ?? "01.00"}}</div>
                            </div>
                            <div class="video-card-body">
                                <div class="video-title">
                                    <a href="{{route('home.video-details',$row->slug)}}">{{$row->name}}</a>
                                </div>
                                <div class="video-page text-success">

                                    <a class="text-success" title="{{route('home.video-category',$row->category->slug)}}" href="{{route('home.video-category',$row->category->slug)}}">
                                        {{$row->category->name}}  <i class="fas fa-check-circle text-success"></i>
                                    </a>
                                </div>
                                <div class="video-view">
                                    {{$row->views ?? "1"}} views &nbsp;<i class="fas fa-calendar-alt"></i> {{$row->created_at->format('d M Y')}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center pagination-sm mb-0">
                    {!! $videos->links() !!}
                </ul>
            </nav>

        </div>
        <hr class="mt-0">


    </div>
    <!-- /.container-fluid -->

@endsection
