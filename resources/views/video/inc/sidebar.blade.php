@php
$categories = \App\Models\VideoCategory::whereStatus(1)->get();
@endphp
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{route('home.video')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>
    </li>

    @foreach($categories as $row)
        <li class="nav-item">
            <a class="nav-link" href="{{route('home.video-category',$row->slug)}}">
                <i class="fas fa-fw fa-list-alt"></i>
                <span>{{$row->name}}</span>
            </a>
        </li>
    @endforeach



</ul>
