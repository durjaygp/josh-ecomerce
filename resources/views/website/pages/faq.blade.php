@extends('website.master')
@section('title')
FAQ
@endsection
@section('content')
@php
    $homepage = \App\Models\HomepageSetting::find(1);
@endphp

    <div class="fancy-hero-one">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-10 m-auto">
                    <h2 class="font-rubik">FAQ</h2>
                </div>
            </div>
        </div>
    </div>


<!-- Faq Classic -->
<div class="faq-classic md-pt-120">
            <div class="container">
                <div class="title-style-two text-center md-mb-70 mt-70 mb-70">
                    <div class="row">
                        <div class="col-xl-8 col-lg-9 col-md-10 m-auto">
                            <h2>
                                {{$homepage->faq_section_title}}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">
                        <!-- ================== FAQ Panel ================ -->
                        <div id="accordion" class="md-mt-60">
                            @foreach($faqs as $index => $row)
                                <div class="card">
                                    <div class="card-header" id="heading{{$row->id}}">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse{{$row->id}}" aria-expanded="true" aria-controls="collapse{{$row->id}}">
                                                {{$row->question}}
                                            </button>
                                        </h5>
                                    </div>
                                    <div id="collapse{{$row->id}}" class="collapse @if($index == 0) show @endif" aria-labelledby="heading{{$row->id}}" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <p>{!! $row->answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div> <!-- /.col- -->
                </div>
            </div>
        </div>
<!-- /.faq-classic -->

@endsection
