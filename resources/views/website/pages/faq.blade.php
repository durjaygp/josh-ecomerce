@extends('frontEnd.master')
@section('title')
FAQ
@endsection
@section('content')
    <!-- Start Page Banner Area -->
    <div class="page-banner-area bg-4 jarallax" data-jarallax='{"speed": 0.3}'>
        <div class="container">
            <div class="page-banner-content text-center" data-aos="fade-center" data-aos-delay="50" data-aos-duration="500" data-aos-once="true">
                <h2 class="text-black">@yield('title')</h2>
                <ul>
                    <li>
                        <a href="{{route('home')}}" class="text-black">Home</a>
                    </li>
                    <li>FAQ</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Banner Area -->


<!-- Start FAQ Area -->
<div class="faq-area ptb-100">
    <div class="container">
        <div class="section-title">
            <span>FAQ</span>
            <h2>Frequently Ask Questions <span class="overlay"></span></h2>
        </div>

        <div class="faq-accordion">
            <div class="accordion" id="FaqAccordion">
                @foreach($faqs as $index => $row)
                    <div class="accordion-item">
                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$row->id}}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{$row->id}}">
                            {{$row->question}}
                        </button>
                        <div id="collapse{{$row->id}}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#FaqAccordion">
                            <div class="accordion-body">
                                <p>{!! $row->answer !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </div>
</div>
<!-- End FAQ Area -->

@endsection
