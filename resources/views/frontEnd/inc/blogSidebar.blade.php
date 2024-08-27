@php
    $recent = \App\Models\Blog::whereStatus(1)->latest()->take(4)->get();
    $categories = \App\Models\Category::withCount('blog')->whereStatus(1)->get();
@endphp
<aside class="widget-area">
    <div class="widget widget_search">
        <form class="search-form" action="{{route('search.blog')}}">
            @csrf
            <input type="search" class="search-field" name="search" placeholder="Search your blog">
            <button type="submit"><i class="ri-search-line"></i></button>
        </form>
    </div>

    <div class="widget widget_recent_post">
        <h3 class="widget-title">Recent Post</h3>
        @foreach($recent as $row)
            <article class="item">
                <a href="{{ route('home.blog', $row->slug) }}" class="thumb">
            <span class="fullimage" role="img" style="
                width: 90px;
                height: 90px;
                display: inline-block;
                border-radius: 10px;
                background-size: cover !important;
                background-repeat: no-repeat;
                background-position: center center !important;
                background-image: url('{{ asset($row->image) }}');
                ">
            </span>
                </a>
                <div class="info">
                    <span>{{ $row->created_at->format('d M Y') }}</span>
                    <h4 class="title usmall">
                        <a href="{{ route('home.blog', $row->slug) }}">{{ $row->name }}</a>
                    </h4>
                </div>
            </article>
        @endforeach
    </div>

    <div class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>

        <ul class="list">
            @foreach($categories as $category)
                <li>
                    <a href="{{ route('home.category', $category->slug) }}" class="d-flex justify-content-between align-items-center">
                        {{ $category->name }} <span>({{ $category->blog_count }})</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
