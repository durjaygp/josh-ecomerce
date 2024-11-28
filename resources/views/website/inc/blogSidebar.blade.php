@php
    $recent = \App\Models\Blog::whereStatus(1)->latest()->take(4)->get();
    $categories = \App\Models\Category::withCount('blog')->whereStatus(1)->get();
@endphp
<div class="blog-sidebar-one">
    <div class="sidebar-search-form mb-85 sm-mb-60">
        <form action="{{route('search.blog')}}" method="get">
            <input type="text" placeholder="Search" name="search" value="{{request()->get('search')}}">
            <button type="submit"><img src="{{asset('website')}}/icon/50.svg" alt=""></button>
        </form>
    </div> <!-- /.sidebar-search-form -->
    <div class="sidebar-categories mb-85 sm-mb-60">
        <h4 class="sidebar-title">Categories</h4>
        <ul>
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('home.category', $category->slug) }}">
                        {{ $category->name }} <span>({{ $category->blog_count }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div> <!-- /.sidebar-categories -->
    <div class="sidebar-recent-news mb-85 sm-mb-60">
        <h4 class="sidebar-title">Recent News</h4>
        <ul>
            @foreach($recent as $row)
                <li>
                    <a href="{{ route('home.blog', $row->slug) }}">
                        <span class="title">{{$row->name}}</span>
                        <span class="date">{{ $row->created_at->format('d M Y') }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div> <!-- /.blog-sidebar-one -->
