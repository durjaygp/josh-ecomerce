<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($categories as $post)
        <url>
            <loc>{{ url('/') }}/category/{{ $post->slug }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach


    <url>
        <loc>{{ url('/') }}/</loc>
        <lastmod>2021-06-06T05:35:58+00:00</lastmod>
        <priority>1.00</priority>
    </url>

    <url>
        <loc>{{ url('/privacy-policy') }}/</loc>
        <lastmod>2021-06-06T05:35:58+00:00</lastmod>
        <priority>1.00</priority>
    </url>
    @foreach ($posts as $post)
        <url>
            <loc>{{ url('/') }}/blog/{{ $post->slug }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach

    @foreach ($pages as $post)
        <url>
            <loc>{{ url('/') }}/page/{{ $post->slug }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach



</urlset>
