@extends('frontEnd.master')
@section('title')
    {{ $page->title }}
@endsection
@section('meta_tag')
    <meta name="description" content="{{$page->description}}">
    <link rel="canonical" href="{{url('/')}}/page/{{$page->slug}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$page->title}}">
    <meta property="og:description" content="{{$page->description}}">
    <meta property="og:url" content="{{url('/')}}/page/{{$page->slug}}">
    <meta property="og:site_name" content="{{ $website->name }}">
    <meta property="og:image" content="{{asset($page->image)}}">
    <meta property="og:image:secure_url" content="{{asset($page->image)}}">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{$page->name}}">
    <meta name="twitter:title" content="{{$page->name}}">
    <meta name="twitter:image" content="{{asset($page->image)}}">
@endsection

@section('content')
    <!-- Main content Start -->
    <div class="container py-3">
        <a href="#" class="block text-[42px] text-black capitalize mb-2 text-center bold">{{ $page->title }}</a>
        <div class="max-w-[720px] mx-auto w-full">
            <div
                class="flex items-center py-1 mb-6 border-t border-dashed border-slate-400 font-helvetica font-extralight">
                <div class="text-xs text-gray-500">Created at  {{ $page->created_at->format('d M Y') }}
                </div>
            </div>

            <div class="max-w-[550px]">
                <img src="{{asset($page->image)}}" alt="{{$page->title}}"
                     class="aspect-[auto_700/533] w-full h-full object-cover object-center">
            </div>
            <!-- Social -->
            <div class="flex items-center gap-8 mt-3 mb-6">
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('home.page', $page->slug)) }}&text={{ urlencode('Check out this blog post!') }}" target="_blank"
                   class="flex items-center gap-0.5 -space-y-0.5 text-sm text-gray-500 font-helvetica font-extralight">
                    <svg width="20" height="16" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg"
                         style="width:1.25rem;height:0.9375rem;margin-bottom:0.125rem">
                        <path
                            d="M10.5119 7.1067L14.4715 2.16666H13.5332L10.0951 6.45603L7.34905 2.16666H4.18182L8.33437 8.65294L4.18182 13.8333H5.12018L8.75095 9.30362L11.651 13.8333H14.8182L10.5117 7.1067H10.5119ZM9.2267 8.71009L8.80596 8.0642L5.45828 2.92481H6.89955L9.60116 7.07246L10.0219 7.71835L13.5337 13.1097H12.0924L9.2267 8.71034V8.71009Z"
                            fill="#53524C"></path>
                    </svg>
                    <span>Twitter</span>
                </a>

                <a target="_blank" href="mailto:?subject=Check%20this%20out&body={{ route('home.page', $page->slug) }}"
                   class="flex items-center gap-0.5 -space-y-0.5 text-sm text-gray-500 font-helvetica font-extralight">
                    <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                         style="width:1.25rem;height:0.9375rem;margin-bottom:0.125rem">
                        <rect width="20" height="14" transform="translate(0 0.740479)" fill="none"></rect>
                        <path d="M4 3.74048V11.7405H16V3.74048M4 3.74048H16M4 3.74048L10 8.74048L16 3.74048"
                              stroke="currentColor" stroke-width="0.75"></path>
                    </svg>
                    <span>Email</span>
                </a>
                <a target="_blank" href="https://wa.me/?text={{ route('home.page', $page->slug) }}"
                   class="flex items-center gap-0.5 -space-y-0.5 text-sm text-gray-500 font-helvetica font-extralight">
                    <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg"
                         style="width:1.25rem;height:0.9375rem;margin-bottom:0.125rem">
                        <rect width="20" height="14" transform="translate(0 0.740479)" fill="none"></rect>
                        <path
                            d="M4 13.4868L4.84277 10.3559C4.1631 9.13632 3.94716 7.71313 4.23458 6.34752C4.522 4.98191 5.2935 3.76548 6.40751 2.92146C7.52151 2.07744 8.90331 1.66244 10.2993 1.7526C11.6953 1.84277 13.0119 2.43206 14.0075 3.41234C15.0031 4.39261 15.6109 5.69812 15.7193 7.0893C15.8278 8.48048 15.4296 9.86401 14.5979 10.986C13.7662 12.108 12.5568 12.8932 11.1915 13.1976C9.82628 13.5019 8.39679 13.3049 7.16536 12.6428L4 13.4868ZM7.31799 11.4713L7.51375 11.5871C8.4057 12.1144 9.44748 12.3326 10.4767 12.2077C11.506 12.0828 12.4649 11.6218 13.2041 10.8966C13.9433 10.1713 14.4212 9.22252 14.5633 8.19807C14.7054 7.17361 14.5038 6.13104 13.9898 5.23281C13.4759 4.33459 12.6785 3.63117 11.7219 3.23218C10.7653 2.83319 9.70327 2.76103 8.70128 3.02696C7.69929 3.29289 6.81363 3.88196 6.18232 4.70237C5.55102 5.52279 5.20953 6.52846 5.21107 7.56268C5.21023 8.42021 5.44799 9.26115 5.89789 9.99189L6.02066 10.1938L5.5495 11.9412L7.31799 11.4713Z"
                            fill="currentColor"></path>
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M12.0693 8.3666C11.9545 8.27427 11.8201 8.20929 11.6764 8.1766C11.5326 8.14391 11.3833 8.14437 11.2398 8.17795C11.0241 8.26731 10.8847 8.60488 10.7454 8.77367C10.716 8.81413 10.6728 8.84251 10.6239 8.85348C10.5751 8.86445 10.5239 8.85725 10.4799 8.83324C9.69037 8.52478 9.02855 7.95911 8.60196 7.22811C8.56558 7.18249 8.54836 7.12457 8.55393 7.06655C8.5595 7.00852 8.58742 6.95491 8.63182 6.91701C8.78725 6.76354 8.90137 6.57344 8.96362 6.36432C8.97745 6.13365 8.92446 5.90388 8.811 5.70241C8.72327 5.41996 8.55633 5.16845 8.32989 4.97761C8.21309 4.92522 8.0836 4.90765 7.95702 4.92703C7.83044 4.94641 7.71218 5.00191 7.61652 5.08683C7.45044 5.22975 7.31862 5.40801 7.23077 5.60848C7.14291 5.80895 7.10125 6.02652 7.10887 6.24517C7.10938 6.36796 7.12498 6.49022 7.15532 6.60922C7.23236 6.89514 7.35085 7.1683 7.50702 7.42006C7.6197 7.61292 7.74264 7.79962 7.87532 7.97938C8.30651 8.5698 8.84852 9.07109 9.47128 9.45544C9.78378 9.65075 10.1178 9.80955 10.4667 9.9287C10.8291 10.0926 11.2293 10.1555 11.6247 10.1107C11.8499 10.0767 12.0634 9.988 12.2508 9.85261C12.3871 9.76424 12.5136 9.65574 12.6266 9.53046C12.7256 9.42455 12.7951 9.29334 12.8283 9.15099C12.8614 9.00865 12.8574 8.85931 12.8167 8.71814C12.7336 8.5188 12.5301 8.45679 12.3282 8.36697L12.0693 8.3666Z"
                              fill="white"></path>
                    </svg>
                    <span>Whatsapp</span>
                </a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('home.page', $page->slug)) }}" target="_blank"
                   class="flex items-center gap-0.5 -space-y-0.5 text-sm text-gray-500 font-helvetica font-extralight">
                    <svg width="20" height="14" enable-background="new 0 0 56.693 56.693" height="56.693px" id="Layer_1" version="1.1" viewBox="0 0 56.693 56.693" width="56.693px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M40.43,21.739h-7.645v-5.014c0-1.883,1.248-2.322,2.127-2.322c0.877,0,5.395,0,5.395,0V6.125l-7.43-0.029  c-8.248,0-10.125,6.174-10.125,10.125v5.518h-4.77v8.53h4.77c0,10.947,0,24.137,0,24.137h10.033c0,0,0-13.32,0-24.137h6.77  L40.43,21.739z"/></svg>

                    <span>Facebook</span>
                </a>

            </div>

            <!-- newslater -->
            <hr class="my-4 border-dashed border-slate-400">

            <!-- Details -->
            <div class="">
                <p>
                    {!! $page->description!!}
                </p>
                <br>
                <p>
                    {!! $page->main_content!!}
                </p>
            </div>

            <br>

            <p class="mb-2 text-base text-black">Sign up for {{$website->name}} Media: <span class="font-light">Media’s
                        essential
                        read.</span> <a href="#" class="font-light underline">Read
                    it now</a>.</p>

            <div class="flex mb-2">
                <form class="flex mb-2" action="{{route('newsletter.save')}}" method="post">
                    @csrf
                    <input type="email" name="email"
                           class="w-full bg-gray-200 text-base border border-[#1f1d1a] px-3 py-2 font-extralight"
                           placeholder="Your Email address">
                    <button
                        class="bg-slate-200 border border-black text-base text-gray-900 px-2.5 min-w-[84px] border-l-0">Sign&nbsp;Up</button>
                </form>
            </div>

            <!-- Ads -->
            <div class="my-6 h-28">
                <div class="absolute inset-x-0 border-dashed h-28 border-y border-slate-400"></div>
            </div>
        </div>
    </div>
    <!-- Main content End -->


@endsection
