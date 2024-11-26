@extends('backEnd.master')
@section('title', 'Update Home Settings')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Home Settings</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('back') }}/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">
            <div class="card">
                <div class="card-header">
                    <h2>Home Settings</h2>
                </div>
                <div class=" card-body">
                    <form method="post" action="{{ route('home-page-setting-update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <!-- Sections -->
                            @php
                                $sections = [
                                    'Hero' => ['hero_section_title', 'hero_section_paragraph', 'hero_section_image', 'hero_section_status'],
                                 //   'About' => ['about_section_title', 'about_section_header', 'about_section_paragraph', 'about_section_link', 'about_section_image', 'about_section_status'],
                                    'Service' => ['service_section_title', 'service_section_header', 'service_section_paragraph', 'service_section_link', 'service_section_status'],
                                    'Review' => ['review_section_header', 'review_section_paragraph', 'review_section_link', 'review_section_status'],
                                    'Faq' => ['faq_section_title', 'faq_section_header', 'faq_section_paragraph', 'faq_section_link', 'faq_section_status'],
                                    'Blog' => ['blog_section_title', 'blog_section_header', 'blog_section_link', 'blog_section_status'],
                                    'Newsletter' => ['newsletter_section_title', 'newsletter_section_header', 'newsletter_section_link', 'newsletter_section_status'],
                                    'Contact' => ['contact_section_title', 'contact_section_header', 'contact_section_link', 'contact_section_status']
                                ];
                            @endphp

                            @foreach ($sections as $sectionName => $fields)
                                <div class="col-lg-12">
                                    <hr>
                                    <h3 class="fw-bold mb-4 text-warning">{{ $sectionName }} Section</h3>
                                    <hr>
                                    @foreach ($fields as $field)
                                        @if (str_contains($field, '_image'))
                                            <!-- Image Input -->
                                            <div class="mb-4">
                                                <label for="{{ $field }}" class="form-label fw-semibold">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                                <input type="file" name="{{ $field }}" class="form-control" id="{{ $field }}">
                                                @if ($settings->$field)
                                                    <img src="{{ asset($settings->$field) }}" alt="{{ ucfirst($field) }}" class="mt-3" width="300">
                                                @endif
                                            </div>
                                        @elseif (str_contains($field, '_status'))
                                            <!-- Status Checkbox -->
                                            <div class="mb-4">
                                                <label for="{{ $field }}" class="form-label fw-semibold">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                                <div class="form-check form-switch">
                                                    <!-- Hidden input for unchecked state -->
                                                    <input type="hidden" name="{{ $field }}" value="0">
                                                    <input class="form-check-input" type="checkbox" id="{{ $field }}" name="{{ $field }}" value="1"
                                                        {{ $settings->$field == '1' ? 'checked' : '' }}>
                                                    <label class="form-check-label" for="{{ $field }}">Publish</label>
                                                </div>
                                            </div>
                                        @elseif (str_contains($field, '_paragraph'))
                                            <!-- Paragraph Textarea -->
                                            <div class="mb-4">
                                                <label for="{{ $field }}" class="form-label fw-semibold">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                                <textarea name="{{ $field }}" class="form-control" id="{{ $field }}">{{ $settings->$field }}</textarea>
                                            </div>
                                        @else
                                            <!-- Text Input -->
                                            <div class="mb-4">
                                                <label for="{{ $field }}" class="form-label fw-semibold">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                                                <input type="text" name="{{ $field }}" class="form-control" id="{{ $field }}" value="{{ $settings->$field }}">
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endforeach

                            <!-- Submit Button -->
                            <div class="col-12 mt-2">
                                <div class="ms-auto mt-3">
                                    <button type="submit" class="btn btn-info font-medium rounded-pill px-4">
                                        <div class="d-flex align-items-center">
                                            <i class="ti ti-send me-2 fs-4"></i>
                                            Update
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
