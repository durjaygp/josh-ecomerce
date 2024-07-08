@extends('frontEnd.master')
@section('title')
{{ $website->name }}
@endsection
@section('meta_tag')
    <meta name="description" content="{{$website->description}}">
    <link rel="canonical" href="{{url('/')}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$website->name}}">
    <meta property="og:description" content="{{$website->description}}">
    <meta property="og:keywords" content="{{$website->keywords}}">
    <meta property="og:tags" content="{{$website->tags}}">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:site_name" content="{{$website->name}}">
    <meta property="og:image" content="{{asset($website->website_logo)}}">
    <meta property="og:image:secure_url" content="{{asset($website->fav_icon)}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{$website->description}}">
    <meta name="twitter:title" content="{{$website->title}}">
    <meta name="twitter:image" content="{{asset($website->fav_icon)}}">
@endsection

@section('content')
    <div class="container py-3">
        <div class="mb-5 md:grid md:grid-cols-12">
            <div class="lg:col-span-3 col-span-full lg:border-r lg:border-dashed lg:border-slate-400 lg:pr-5">
                <div class="flex overflow-x-auto lg:flex-col">
                    <div class="hidden p-3 mb-6 bg-gray-500/20 lg:block">
                        <h4 class="mb-2 text-2xl text-gray-900">Today’s Flagship</h4>
                        @foreach($latestBlogs->take(1) as $row)
                        <p class="mb-2 text-base font-light text-gray-700">{{ $row->name }}</p>
                        <a href="{{route('home.blog',$row->slug)}}"
                           class="flex items-center text-sm tracking-wider uppercase font-extralight font-helvetica">Read
                            it →</a>
                        @endforeach
                    </div>

                    <div class="flex lg:flex-col *:px-3 lg:*:px-0 *:py-2 *:border-r lg:*:border-r-0 lg:*:border-b *:border-dashed *:border-slate-400"
                         x-data>
                        @foreach($leftBlogs as $row)
                        <template x-for="item in 1">
                                <a href="{{route('home.blog',$row->slug)}}"
                                   class="block last:border-b-0 group w-[170px] lg:w-auto first:!pl-0 min-h-48 lg:min-h-0 last:border-r-0">
                                    <div
                                        class="flex items-center gap-2 mb-2 text-xs text-gray-900 uppercase group-hover:text-blue-700 font-extralight font-helvetica">
                                        <span>{{ $row->created_at->diffForHumans() }}</span>
                                        <span>{{$row->category?->name}}</span>
                                    </div>
                                    <div
                                        class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200">
                                        <h6 class="relative text-base group-hover:text-blue-700"><img alt="Signal icon"
                                                                                                      width="16" height="13" class="inline-block mr-0.5"
                                                                                                      src="{{asset('homePage')}}/assets/images/2circles-blue.svg">
                                            {{$row->name}}</h6>
                                    </div>
                                </a>

                        </template>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="lg:col-span-9 col-span-full">
                <div class="grid md:grid-cols-9">
                    <div class="md:col-span-6 md:border-r md:border-dashed md:border-slate-400 md:pr-5 lg:px-5">
                        @foreach($latestBlogs->take(1) as $row)
                            <a href="{{route('home.blog',$row->slug)}}" class="block group">
                                <div class="flex items-center gap-2 pb-2 border-b border-dashed border-slate-400">
                                    <img src="{{ asset($row->user?->image ?? 'user.jpg') }}" alt="" class="w-10 h-10">
                                    <div>
                                        <p class="text-lg text-gray-800 group-hover:text-blue-700 mb-0.5">
                                            {{$row->user->name}}
                                        </p>
                                        <p
                                            class="text-sm text-gray-500 uppercase font-extralight font-helvetica group-hover:text-blue-700">
                                            {{$row->category?->name}}</p>
                                    </div>
                                </div>

                                <div class="py-2">
                                    <div
                                        class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200">
                                        <h2
                                            class="relative z-10 pr-12 text-3xl text-gray-900 group-hover:text-blue-700">
                                            {{ $row->name }}
                                        </h2>
                                    </div>

                                    <div class="mb-2 text-lg font-light group-hover:text-blue-700">{{ $row->description }}</div>
                                    <img src="{{asset($row->image)}}"
                                         alt="" class="aspect-[auto_644/491] w-full h-full object-cover">
                                </div>
                            </a>
                        @endforeach
                    </div>
                    <div class="md:col-span-3 md:pl-5">
                        <div class="space-y-10">
                            @foreach($randomBlogs as $row)
                                <a href="{{route('home.blog',$row->slug)}}" class="block group">
                                    <div class="flex items-center gap-2 pb-2 border-b border-dashed border-slate-400">
                                        <img src="{{ asset($row->user?->image ?? 'user.jpg') }}" alt="" class="w-10 h-10">
                                        <div>
                                            <p class="text-lg text-gray-800 group-hover:text-blue-700 mb-0.5">{{$row->user->name}}
                                            </p>
                                            <p
                                                class="text-sm text-gray-500 uppercase font-extralight font-helvetica group-hover:text-blue-700">
                                                {{$row->category->name}}</p>
                                        </div>
                                    </div>

                                    <div class="py-2">
                                        <div
                                            class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200">
                                            <h2
                                                class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                {{$row->name}}</h2>
                                        </div>

                                        <div class="mb-2 text-base font-light group-hover:text-blue-700">{{$row->description}}</div>
                                        <img src="{{asset($row->image)}}" alt=""
                                             class="aspect-[auto_644/491] w-full h-full object-cover">
                                    </div>
                                </a>
                            @endforeach

                        </div>
                    </div>
                </div>
                <hr class="my-5 border-dashed md:ml-5 border-slate-400">

                <div class="grid md:grid-cols-9">
                    <div class="md:col-span-6">
                        <div class="px-5 md:border-r md:border-dashed md:border-slate-400">
                            <div class="grid grid-cols-2" x-data>
                                @foreach($latestBlogs->skip(1)->take(8) as $row)
                                <template x-for="item in 1">
                                        <a href="{{route('home.blog',$row->slug)}}"
                                           class="block group odd:pl-3 even:pr-3 even:border-r even:border-dashed even:border-slate-400 after:content-[''] after:my-3 after:border-t after:border-dashed after:border-slate-400 after:w-full after:h-px relative after:absolute after:-bottom-6 after:inset-x-0 my-3 last:after:border-0 [&:nth-last-child(2)]:after:border-0">
                                            <div
                                                class="flex items-center gap-2 pb-2 border-b border-dashed border-slate-400">
                                                <img src="{{ asset($row->user?->image ?? 'user.jpg') }}" alt="" class="w-10 h-10">
                                                <div>
                                                    <p class="text-lg text-gray-800 group-hover:text-blue-700 mb-0.5">
                                                        {{$row->user->name}}
                                                    </p>
                                                    <p
                                                        class="text-sm text-gray-500 uppercase font-extralight font-helvetica group-hover:text-blue-700">
                                                        {{$row->category?->name}}</p>
                                                </div>
                                            </div>

                                            <div class="py-2">
                                                <div
                                                    class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200">
                                                    <h2
                                                        class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                        {{ $row->name }}</h2>
                                                </div>

                                                <div class="mb-2 text-base font-light group-hover:text-blue-700">
                                                    {!! $row->description !!}
                                                </div>
                                            </div>
                                        </a>
                                </template>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="hidden md:block md:col-span-3 md:pl-5">
                        <hr class="mb-3 border-black">
                        <h5 class="mb-3 text-lg text-black">Sign up for our Newsletters.</h5>
                        <div class="flex mb-2">
                            <form class="flex mb-2" action="{{route('newsletter.save')}}" method="post">
                                @csrf
                                <input type="email" name="email"
                                       class="w-full bg-gray-200 text-base border border-[#1f1d1a] px-3 py-2 font-extralight"
                                       placeholder="Email address">
                                <button type="submit"
                                    class="bg-slate-200 border border-black text-base border-l-0 text-gray-900 px-2.5 min-w-[84px]">Subscribe</button>
                            </form>

                        </div>
                        <div class="mt-5" x-data>
                            @foreach(printMenuCategory()->take(8) as $row)
                                <template x-for="i in 1">
                                    <div
                                        class="flex items-stretch gap-2.5 py-2 border-t border-dashed border-slate-400">
                                        <input type="checkbox" name="categories" :id="`category-${i}`"
                                               class="w-5 h-5 mt-2 bg-transparent border border-black form-checkbox checked:text-red-200 checked:border checked:border-black">
                                        <label :for="`category-${i}`" class="block w-full">
                                            <a href="{{route('home.category',$row->slug)}}">
                                            <p class="text-2xl text-black">{{$row->name}}</p></a>
                                            <p class="text-base font-light text-black mb-2.5">{{$row->description}}</p>
                                            <p
                                                class="text-sm text-gray-500 uppercase font-extralight font-helvetica space-x-2.5">
                                                <span>2x/Weekday</span><a href="#">Read it</a>
                                            </p>
                                        </label>
                                    </div>
                                </template>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ads -->
        <div class="border-dashed h-28 border-y border-slate-400"></div>

        <!-- Category News -->
        <div class="mt-5">
            @foreach($categoryWiseBlogs as $row)
                @if($row->design_format == 1)
                    <!-- format 1 -->
                        <div class="mb-5">
                            <hr class="mb-3 border border-black">
                            <a href="#" class="block text-[42px] text-black capitalize mb-5">{{ $row->name }}</a>
                            <div class="grid md:grid-cols-3">
                                <div class="md:col-span-2 md:border-r md:border-dashed md:border-slate-400 md:pr-5">
                                    <div class="grid h-full grid-cols-2 grid-rows-2" x-data>
                                        @foreach($row->blog->take(4) as $blog)
                                            <template x-for="item in 1">
                                                <a href="{{route('home.blog',$blog->slug)}}"
                                                   class="block group odd:pl-3 even:pr-3 even:border-r even:border-dashed even:border-slate-400 after:content-[''] after:my-3 after:border-t after:border-dashed after:border-slate-400 after:w-full after:h-px relative after:absolute after:-bottom-6 after:inset-x-0 my-3 last:after:border-0 [&:nth-last-child(2)]:after:border-0">
                                                    <div class="">
                                                        <div
                                                            class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                                            <h2
                                                                class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                                {{$blog->name}}</h2>
                                                        </div>

                                                        <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">The
                                                            {{$blog->description}}
                                                        </div>
                                                    </div>
                                                </a>

                                            </template>
                                        @endforeach

                                    </div>
                                </div>
                                @foreach($row->blog->skip(4)->take(1) as $blog)
                                    <div class="md:pl-5">
                                        <a href="{{route('home.blog',$blog->slug)}}" class="block group">
                                            <div class="py-2">
                                                <div
                                                    class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                                    <h2
                                                        class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                        {{$blog->name}}</h2>
                                                </div>

                                                <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">
                                                    {{$blog->description}}
                                                </div>
                                                <img src="{{asset($blog->image)}}"
                                                     alt="" class="aspect-[auto_644/491] w-full h-full object-cover">
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                @elseif($row->design_format == 2)
                    <!-- format 2 -->
                        <div class="mb-5">
                            <hr class="mb-3 border border-black">
                            <a href="#" class="block text-[42px] text-black capitalize mb-5">{{ $row->name }}</a>
                            <div class="grid md:grid-cols-4 *:md:border-r *:border-dashed *:border-slate-400 -mx-5" x-data>
                                @foreach($row->blog->take(4) as $blog)
{{--                                <template x-for="i in 1">--}}
                                    <div class="px-5 last:border-r-0">
                                        <a href="{{route('home.blog',$blog->slug)}}" class="block group">
                                            <div class="py-2">
                                                <div
                                                    class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                                    <h2
                                                        class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                        {{$blog->name}}</h2>
                                                </div>

                                                <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">{{$blog->description}}
                                                </div>
                                                <img src="{{asset($blog->image)}}"
                                                     alt="" class="aspect-[auto_644/491] w-full h-full object-cover">
                                            </div>
                                        </a>
                                    </div>
{{--                                </template>--}}
                                @endforeach
                            </div>
                        </div>
                @elseif($row->design_format == 3)
                    <!-- format 3 -->
                        <div class="mb-5">
                            <hr class="mb-3 border border-black">
                            <a href="#" class="block text-[42px] text-black capitalize mb-5">{{$row->name}}</a>
                            <div class="grid md:grid-cols-3 *:md:border-r *:border-dashed *:border-slate-400 -mx-5" x-data>
                                @foreach($row->blog->take(2) as $blog)
                                    <div class="px-5 last:border-r-0">
                                        <a href="{{route('home.blog',$blog->slug)}}" class="block group">
                                            <div class="py-2">
                                                <div
                                                    class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                                    <h2
                                                        class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                        {{$blog->name}}</h2>
                                                </div>

                                                <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">
                                                    {{$blog->description}}
                                                </div>
                                                <img src="{{asset($blog->image)}}"
                                                     alt="" class="aspect-[auto_644/491] w-full h-full object-cover">
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                <div class="px-5 last:border-r-0">
                                    <div
                                        class="grid grid-cols-2 md:grid-cols-1 *:border-b *:border-dashed *:border-slate-400 md:gap-2 *:border-r *:md:border-r-0">
                                        @foreach($row->blog->skip(2)->take(3) as $blog)
                                        <template x-for="item in 1">
                                            <a href="{{route('home.blog',$blog->slug)}}"
                                               class="block group last:border-b-0 first:md:border-r-0 first:border-dashed first:border-slate-400 last:col-span-2 last:md:col-span-1 last:border-r-0 [&:nth-last-child(2)]:border-r-0 p-2 md:px-0">
                                                <div class="">
                                                    <div
                                                        class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                                        <h2
                                                            class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                            {{$blog->name}}
                                                        </h2>
                                                    </div>

                                                    <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">
                                                        {{$blog->description}}
                                                    </div>
                                                </div>
                                            </a>
                                        </template>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($row->design_format == 4)
                                        <!-- format 4 -->
                                        <div class="mb-5">
                                            <hr class="mb-3 border border-black">
                                            <a href="#" class="block text-[42px] text-black capitalize mb-5">{{$row->name}}</a>
                                            <div class="grid md:grid-cols-3">
                                                <div class="md:pr-5 md:border-r md:border-dashed md:border-slate-400">
                                                    @foreach($row->blog->take(1) as $blog)
                                                        <a href="{{route('home.blog',$blog->slug)}}" class="block group">
                                                            <div class="py-2">
                                                                <div
                                                                    class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                                                    <h2
                                                                        class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                                        {{ $blog->name }}
                                                                    </h2>
                                                                </div>

                                                                <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">
                                                                    {{ $blog->name }}
                                                                </div>
                                                                <img src="{{asset($blog->image)}}"
                                                                     alt="{{ $blog->name }}" class="aspect-[auto_644/491] w-full h-full object-cover">
                                                            </div>
                                                        </a>
                                                    @endforeach

                                                </div>
                                                <div class="md:col-span-2 md:pl-5">
                                                    <div class="grid h-full grid-cols-2 grid-rows-2" x-data>
                                                        @foreach($row->blog->skip(1)->take(4) as $blog)
                                                            <template x-for="item in 1">
                                                                <a href="{{route('home.blog',$blog->slug)}}"
                                                                   class="block group odd:pl-3 even:pr-3 even:border-r even:border-dashed even:border-slate-400 after:content-[''] after:my-3 after:border-t after:border-dashed after:border-slate-400 after:w-full after:h-px relative after:absolute after:-bottom-6 after:inset-x-0 my-3 last:after:border-0 [&:nth-last-child(2)]:after:border-0">
                                                                    <div class="">
                                                                        <div
                                                                            class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                                                            <h2
                                                                                class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                                                {{$blog->name}}</h2>
                                                                        </div>

                                                                        <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">
                                                                            {{ $blog->description }}
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </template>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                @endif



            @endforeach
        </div>





{{--        <div class="mb-5 md:hidden">--}}
{{--            <hr class="mb-3 border-black">--}}
{{--            <h5 class="mb-3 text-lg text-black">Sign up for our Newsletters.</h5>--}}
{{--            <div class="flex mb-2">--}}
{{--                <input type="text"--}}
{{--                       class="w-full bg-[#fcfae4] text-base border border-[#1f1d1a] px-3 py-2 font-extralight"--}}
{{--                       placeholder="Email address">--}}
{{--                <button--}}
{{--                    class="bg-[#f8f5d7] border border-black text-base text-gray-900 px-2.5 min-w-[84px]">Sign&nbsp;Up</button>--}}
{{--            </div>--}}
{{--            <p class="pb-2 text-base text-center text-gray-500 border-b border-dashed border-slate-400">--}}
{{--                2--}}
{{--                newsletters selected</p>--}}

{{--            <div class="mt-5" x-data>--}}
{{--                <template x-for="i in 8">--}}
{{--                    <div class="flex items-stretch gap-2.5 py-2 border-t border-dashed border-slate-400">--}}
{{--                        <input type="checkbox" name="categories" :id="`category-${i}`"--}}
{{--                               class="w-5 h-5 mt-2 bg-transparent border border-black form-checkbox checked:text-red-200 checked:border checked:border-black">--}}
{{--                        <label :for="`category-${i}`" class="block w-full">--}}
{{--                            <p class="text-2xl text-black">Flagship</p>--}}
{{--                            <p class="text-base font-light text-black mb-2.5">The daily global news--}}
{{--                                briefing can trust.</p>--}}
{{--                            <p class="text-sm text-gray-500 uppercase font-extralight font-helvetica space-x-2.5">--}}
{{--                                <span>2x/Weekday</span><a href="#">Read it</a>--}}
{{--                            </p>--}}
{{--                        </label>--}}
{{--                    </div>--}}
{{--                </template>--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- Ads -->
        <div class="border-dashed h-28 border-y border-slate-400"></div>
    </div>
@endsection
