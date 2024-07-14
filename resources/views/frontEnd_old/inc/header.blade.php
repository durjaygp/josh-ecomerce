<!-- Header Section Start -->
@php
    $pages = \App\Models\NewPages::latest()->whereStatus(1)->limit(3)->get();
@endphp
<header class="container py-0 mb-0.5" x-data="{open : false}">
    <div
        class="flex py-1.5 md:grid md:grid-cols-2 lg:flex justify-between md:border-b border-gray-900 relative">
        <!-- Left Side -->
        <div class="flex flex-col justify-between order-1 gap-2 lg:order-1">
            <!-- Timer -->
            <div class="flex items-center gap-1.5 text-[10px] font-helvetica text-gray-700 font-light">
                <img src="{{asset('homePage')}}/assets/images/spinning-earth.eafcef04.gif" alt="" class="size-3">
                <span><p>{{ \Carbon\Carbon::now()->format('l jS \\of F Y h:i A') }}</p></span>
            </div>
            <!-- Menu -->
            <div class="flex items-center gap-8">
                @foreach($pages as $row)
                    <a href="{{route('home.page',$row->slug)}}" class="py-2.5 text-base whitespace-nowrap font-normal inline-block">{{$row->title}}
                    </a>
                @endforeach
            </div>
        </div>


        <!-- Middle -->
        <div
            class="order-3 hidden col-span-2 py-2 border-t border-dashed lg:order-2 lg:block border-slate-400 lg:py-0 lg:border-t-0 lg:absolute lg:mx-auto lg:inset-x-0 lg:max-w-xl">
            <div class="flex items-center gap-8">
                <!-- Left Side Clocks -->
                <div class="flex items-center gap-3">
                    <div class="flex flex-col items-center gap-1">
                <p class="text-[8px] text-gray-700 font-helvetica font-light">Baton Rouge</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-dc">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-[8px] text-gray-700 font-helvetica font-light">Jackson</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-bxl">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-[8px] text-gray-700 font-helvetica font-light">Montgomery</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-lagos">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
                </div>

                <!-- Logo -->
                <div class="flex flex-col items-center gap-2 grow">
                    <a href="{{route('home')}}">
                    <img src="{{asset($website->website_logo)}}" alt="{{$website->name}}">
                    </a>
                    <div class="flex items-center justify-center gap-1.5">
                        <span class="text-[10px] text-gray-800 font-helvetica font-light">Smart</span>
                        <span class="w-0.5 h-0.5 shrink-0 bg-gray-800"></span>
                        <span class="text-[10px] text-gray-800 font-helvetica font-light">Sophisticated</span>
                        <span class="w-0.5 h-0.5 shrink-0 bg-gray-800"></span>
                        <span class="text-[10px] text-gray-800 font-helvetica font-light">Southern</span>
                    </div>
                </div>

                <!-- Right Side Clocks -->
                <div class="flex items-center gap-3">
                      <div class="flex flex-col items-center gap-1">
                    <p class="text-[8px] text-gray-700 font-helvetica font-light">Atlanta</p>
                    <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                        <div class="clock" id="clock-dubai">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                            <div class="hand second"></div>
                        </div>
                    </div>
                    </div>
                    <div class="flex flex-col items-center gap-1">
                        <p class="text-[8px] text-gray-700 font-helvetica font-light">Columbia</p>
                        <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                            <div class="clock" id="clock-beijing">
                                <div class="hand hour"></div>
                                <div class="hand minute"></div>
                                <div class="hand second"></div>
                            </div>
                        </div>
                    </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-[8px] text-gray-700 font-helvetica font-light">Raleigh</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-sg">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>

        <!-- Right Side -->
        <div class="order-2 lg:col-span-3 lg:order-3">
            <div class="flex flex-col items-end justify-between gap-2">
                @auth()
                    <a href="{{route('admin.index')}}" class="text-[10px] font-helvetica text-slate-900 uppercase inline-block font-light">Dashboard</a>

                @else
                    <a href="{{route('login')}}" class="text-[10px] font-helvetica text-slate-900 uppercase inline-block font-light">sign in</a>
                @endauth


                <button class="translate-x-3" x-data @click.prevent="open = !open">
                    <img src="{{asset('homePage')}}/assets/images/nav-open.svg" alt="" class="size-11" x-show="!open" x-cloak
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-90"
                         x-transition:enter-end="opacity-100 scale-100">
                    <img src="{{asset('homePage')}}/assets/images/nav-close.svg" class="mt-1 w-11" x-show="open" x-cloak
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-90"
                         x-transition:enter-end="opacity-100 scale-100">
                </button>
            </div>
        </div>
    </div>

    <!-- Menu Drawer -->
    <div class="lg:fixed lg:inset-0 lg:z-50" x-show="open" x-cloak>
        <!-- Backdrop -->

        <div class="hidden lg:fixed lg:inset-0 bg-black/20 lg:block" x-show="open"
             @click.prevent="open = false"></div>

        <!-- Drawer -->
        <div class="lg:fixed lg:inset-y-0 lg:right-0 lg:w-[360px] lg:overflow-auto lg:h-screen"
             x-show="open"
             x-transition:enter="transition-all ease-out duration-300 lg:duration-200 overflow-hidden lg:overflow-vissible"
             x-transition:enter-start="max-h-0 lg:max-h-none lg:translate-x-full"
             x-transition:enter-end="lg:translate-x-0 max-h-screen lg:max-h-none"
             x-transition:leave="transition-all ease-in duration-300 lg:duration-200 overflow-hidden lg:overflow-vissible"
             x-transition:leave-start="lg:translate-x-0 max-h-screen lg:max-h-none"
             x-transition:leave-end="max-h-0 lg:max-h-none lg:translate-x-full">
                {{-- background --}}
            <img src="{{asset('homePage')}}/assets/images/bg.jpg" alt="" class="fixed inset-y-0 right-0 object-cover w-[360px] h-screen -z-50 hidden lg:block pointer-event-none">
            <!-- Close Button -->
            <button class="absolute hidden lg:block top-4 right-4" @click.prevent="open = false">
                <img src="{{asset('homePage')}}/assets/images/nav-close.svg" class="w-11">
            </button>
            <div
                class="grid grid-cols-12 lg:flex lg:flex-col lg:w-[252px] my-6 lg:mx-[30px] h-full justify-between lg:gap-y-8 lg:mb-12 gap-3">
                <!-- Menus -->
                <ul
                    class="text-2xl lg:text-3xl text-gray-900 *:border-b *:border-dashed *:border-slate-400 *:py-1.5 col-span-8 pr-3 lg:pr-0 border-r lg:border-r-0 border-dashed border-slate-400">
                    <li class="last:!border-b-0 first:pt-0">
                        <a href="{{route('home')}}" class="block">
                            <span>Home</span>
                            <img alt="" src="{{asset('homePage')}}/assets/images/nav-you-are-here.svg" class="ml-2.5 inline-block">
                        </a>
                    </li>
                    @foreach(printMenuCategory() as $row)
                        <li class="last:!border-b-0 first:pt-0">
                            <a href="#" class="block">
                                <span>{{$row->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <!-- Footer Menus -->
                <ul
                    class="lg:*:border-t *:border-dashed *:border-slate-400 *:py-2.5 text-base text-gray-900 col-span-4">
                    <li class="hidden lg:block">
                        <ul class="*:py-1.5">
                            <li><a href="#">Events</a></li>
                            <li><a href="#">Newsletters</a></li>
                        </ul>
                    </li>

                    <li class="">
                        <ul class="*:py-1.5">
                            @foreach(websitePages() as $row)
                                <li><a href="{{route('home.page',$row->slug)}}">{{$row->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="hidden lg:block">
                        <ul class="*:py-1.5">
                            <li>{{$website->footer}}</li>
                        </ul>
                    </li>
                </ul>

                <!-- Logo -->
                <a class="hidden lg:block" href="#">
                    <img alt="" src="{{asset($website->website_logo)}}" class="w-[230px]"></a>
            </div>

            <ul class="flex justify-between mt-8 text-base text-gray-900 lg:hidden">
                <li><a href="#">Privacy</a></li>
                <li>{{$website->footer}}</li>
            </ul>
        </div>
    </div>


    <!-- Tablet Logo -->
    <div class="hidden py-2 border-t border-dashed md:block lg:hidden border-slate-400">
        <div class="flex items-center gap-8">
            <!-- Left Side Clocks -->
            <div class="flex items-center gap-3">
                <div class="flex flex-col items-center gap-1">
                    <p class="text-[8px] text-gray-700 font-helvetica font-light">Baton Rouge</p>
                    <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                        <div class="clock" id="clock-dc-1">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                            <div class="hand second"></div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col items-center gap-1">
                    <p class="text-[8px] text-gray-700 font-helvetica font-light">Jackson</p>
                    <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                        <div class="clock" id="clock-bxl-1">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                            <div class="hand second"></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <p class="text-[8px] text-gray-700 font-helvetica font-light">Montgomery</p>
                    <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                        <div class="clock" id="clock-lagos-1">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                            <div class="hand second"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Logo -->
            <div class="flex flex-col items-center gap-2 grow">
                <a href="{{route('home')}}">
                    <img src="{{asset($website->website_logo)}}" alt="{{$website->name}}">
                </a>
                <div class="flex items-center justify-center gap-1.5">
                    <span class="text-[10px] text-gray-800 font-helvetica font-light">Smart</span>
                    <span class="w-0.5 h-0.5 shrink-0 bg-gray-800"></span>
                    <span class="text-[10px] text-gray-800 font-helvetica font-light">Sophisticated</span>
                    <span class="w-0.5 h-0.5 shrink-0 bg-gray-800"></span>
                    <span class="text-[10px] text-gray-800 font-helvetica font-light">Southern</span>
                </div>
            </div>

            <!-- Right Side Clocks -->
            <div class="flex items-center gap-3">
                <div class="flex flex-col items-center gap-1">
                    <p class="text-[8px] text-gray-700 font-helvetica font-light">Atlanta</p>
                    <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                        <div class="clock" id="clock-dubai-1">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                            <div class="hand second"></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <p class="text-[8px] text-gray-700 font-helvetica font-light">Columbia</p>
                    <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                        <div class="clock" id="clock-beijing-1">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                            <div class="hand second"></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col items-center gap-1">
                    <p class="text-[8px] text-gray-700 font-helvetica font-light">Raleigh</p>
                    <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                        <div class="clock" id="clock-sg-1">
                            <div class="hand hour"></div>
                            <div class="hand minute"></div>
                            <div class="hand second"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Logo -->
    <div class="flex flex-col gap-3 py-2 border-t border-dashed md:hidden border-slate-400">
        <!-- Clock -->
        <div class="flex items-center justify-between gap-3">
            <div class="flex flex-col items-center gap-1">
                <p class="text-[10px] text-gray-700 font-helvetica font-light">Baton Rouge</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-dc-2">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-[10px] text-gray-700 font-helvetica font-light">Jackson</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-bxl-2">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-[10px] text-gray-700 font-helvetica font-light">Montgomery</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-lagos-2">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
             <div class="flex flex-col items-center gap-1">
                <p class="text-[10px] text-gray-700 font-helvetica font-light">Atlanta</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-dubai-2">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-[10px] text-gray-700 font-helvetica font-light">Columbia</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-beijing-2">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col items-center gap-1">
                <p class="text-[10px] text-gray-700 font-helvetica font-light">Raleigh</p>
                <div class="w-8 h-8 border border-dashed rounded-full border-amber-900 shrink-0">
                    <div class="clock" id="clock-sg-2">
                        <div class="hand hour"></div>
                        <div class="hand minute"></div>
                        <div class="hand second"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Logo -->
        <div class="flex flex-col items-center gap-2 grow">
            <a href="{{route('home')}}">
                <img src="{{asset($website->website_logo)}}" alt="{{$website->name}}">
            </a>
            <div class="flex items-center justify-center gap-1.5">
                <span class="text-[16px] text-gray-800 font-helvetica font-light">Smart</span>
                <span class="w-0.5 h-0.5 shrink-0 bg-gray-800"></span>
                <span class="text-[16px] text-gray-800 font-helvetica font-light">Sophisticated</span>
                <span class="w-0.5 h-0.5 shrink-0 bg-gray-800"></span>
                <span class="text-[16px] text-gray-800 font-helvetica font-light">Southern</span>
            </div>
        </div>
    </div>
</header>
<!-- Header Section Ends -->

<!-- Navbar -->
<div class="container hidden lg:block">
    <div class="border-y border-dashed border-slate-400 py-1.5 flex justify-between flex-wrap gap-3">
        <a href="{{route('home')}}" class="inline-block py-1 px-2.5 text-base text-emerald-900">Home</a>
        @foreach(printMenuCategory() as $row)
            <a href="{{route('home.category',$row->slug)}}" class="inline-block py-1 px-2.5 text-base text-gray-900">{{$row->name}}</a>
        @endforeach
    </div>
</div>
