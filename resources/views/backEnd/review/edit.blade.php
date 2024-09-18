@extends('backEnd.master')
@section('title','Update Services')
@section('content')
    <div class="container-fluid">
        <div class="overflow-hidden shadow-none card bg-light-info position-relative">
            <div class="px-4 py-3 card-body">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="mb-8 fw-semibold">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="{{route('admin.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">@yield('title')</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{asset('back')}}/assets/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">
            <!-- --------------------- start Contact ---------------- -->
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4 ">
                            <h2>@yield('title')</h2>
                        </div>
                        <div class="mt-3 col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-md-0">
                            <a href="{{route('admin-service.index')}}" class="btn btn-info d-flex align-items-center">
                                <i class="text-white ti ti-new-section me-1 fs-5"></i> Services List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin-service.update', $service->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="serviceTitle" class="form-label fw-semibold">Service Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="Service Title" value="{{ old('title', $service->title) }}">
                                    @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">Description</label>
                                    <textarea name="description" id="description" cols="10" rows="5" class="form-control" placeholder="Write a short Description">{{ old('description', $service->description) }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label fw-semibold">Image</label>
                                <input class="dropify" type="file" name="image" accept="image/*">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                                @if($service->image)
                                    <img src="{{ asset($service->image) }}" alt="Current Image" class="mt-2" style="max-width: 100px;">
                                @endif
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="main_content" class="form-label fw-semibold">Service Content</label>
                                    <textarea name="main_content" id="summernote" cols="10" rows="5" class="form-control" placeholder="Write the service content">{{ old('main_content', $service->main_content) }}</textarea>
                                    @error('main_content')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="seo_description" class="form-label fw-semibold">Seo Description</label>
                                    <input type="text" name="seo_description" class="form-control" id="seo_description" placeholder="SEO description" value="{{ old('seo_description', $service->seo_description) }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="seo_tags" class="form-label fw-semibold">Seo Tags</label>
                                    <input type="text" name="seo_tags" class="form-control" id="seo_tags" placeholder="SEO tags" value="{{ old('seo_tags', $service->seo_tags) }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="seo_keywords" class="form-label fw-semibold">Seo Keywords</label>
                                    <input type="text" name="seo_keywords" class="form-control" id="seo_keywords" placeholder="SEO keywords" value="{{ old('seo_keywords', $service->seo_keywords) }}">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="status" class="form-label fw-semibold">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="2" {{ old('status', $service->status) == 2 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Update</button>
                    </form>


                </div>
            </div>

        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('/')}}dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.css">
@endsection
@section('script')

    <script src="{{asset('/')}}dropify/dist/js/dropify.min.js"></script>
    <script src="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.js"></script>
    <script>
        $("#summernote").summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
        });
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection
