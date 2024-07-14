<footer class="container py-3">
    <hr class="mb-3 border border-black">
    <div class="flex flex-wrap py-3 mb-8 gap-x-8 gap-y-4">
        <div class=""><a href="#"><img width="153" height="20" src="{{asset('homePage')}}/assets/images/semafor-logo-long.svg"></a>
        </div>
        <div class="flex flex-wrap lg:justify-between grow gap-x-8 gap-y-4">
            @php
                $pages = \App\Models\NewPages::latest()->whereStatus(1)->get();
                $social = \App\Models\SocialMediaLinks::find(1);
            @endphp

            <a class="text-base text-gray-900" href="{{ $social->facebook}}">Facebook</a>
            <a class="text-base text-gray-900" href="{{ $social->twitter }}">Twitter</a>
            <a class="text-base text-gray-900" href="{{ $social->youtube }}">Youtube</a>

                @foreach($pages as $row)
                <a class="text-base text-gray-900" href="{{route('home.page',$row->slug)}}">{{$row->title}}</a>
                @endforeach


            <div class="text-base font-light text-gray-900"><span>{{$website->footer}}</span>
            </div>

        </div>
    </div>
</footer>
