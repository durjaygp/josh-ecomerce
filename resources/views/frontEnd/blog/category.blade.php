@extends('frontEnd.master')
@section('title')
    {{ $category->name }}
@endsection
@section('content')
    <div class="container py-3">
        <!-- Category News -->
        <div class="mt-5">
            <!-- politics -->
            <div class="mb-5">

                <a href="#" class="block text-[42px] text-black capitalize mb-2 text-center bold">{{ $category->name }}</a>
                <hr class="mb-3 border border-black">
                <div class="grid md:grid-cols-4 *:md:border-r *:border-dashed *:border-slate-400 -mx-5" x-data>
                    @foreach($blogs as $row)
                        <template x-for="i in 1">
                            <div class="px-5 last:border-r-0">
                                <a href="{{route('home.blog',$row->slug)}}" class="block group">
                                    <div class="py-2">
                                        <div
                                            class="relative before:content-[''] before:absolute before:inset-0 before:bg-white/70 before:w-0 before:group-hover:w-full before:transition-all before:duration-200 mb-2">
                                            <h2
                                                class="relative z-10  text-[22px]/7 text-gray-900 group-hover:text-blue-700">
                                                {{ $row->name }}</h2>
                                        </div>

                                        <div class="mt-auto mb-2 text-base font-light group-hover:text-blue-700">
                                            {{$row->description}}
                                        </div>
                                        <img src="{{asset($row->image)}}"
                                             alt="{{$row->name}}" class="aspect-[auto_644/491] w-full h-full object-cover">
                                        <span class="text-xs text-gray-600 font-courier">{{$row->user?->name}}</span>
                                    </div>
                                </a>
                            </div>
                        </template>

                    @endforeach
                </div>
            </div>
    </div>
    </div>
@endsection
