@extends('backEnd.master')
@section('title','Create Custom Review')
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
                            <a href="{{route('custom-review.index')}}" class="btn btn-info d-flex align-items-center">
                                <i class="text-white ti ti-new-section me-1 fs-5"></i> Custom Reviews List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('custom-review.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ old('name') }}">
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="rating" class="form-label fw-semibold">Rating</label>
                                    <input type="number" name="rating" class="form-control" placeholder="Enter Rating (e.g., 5)" value="{{ old('rating') }}" min="1" max="5">
                                    @error('rating')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="subject" class="form-label fw-semibold">Subject</label>
                                    <textarea name="subject" id="subject" cols="10" rows="2" class="form-control" placeholder="Enter Subject">{{ old('subject') }}</textarea>
                                    @error('subject')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label fw-semibold"> Image</label>
                                <input class="dropify" type="file" name="image" accept="image/*">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="review" class="form-label fw-semibold">Review</label>
                                    <textarea name="review" id="review" cols="10" rows="5" class="form-control" placeholder="Write the review">{{ old('review') }}</textarea>
                                    @error('review')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-4">
                                            <label for="status" class="form-label fw-semibold">Status</label>
                                            <select name="status" class="form-select">
                                                <option value="">Select</option>
                                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Submit</button>
                    </form>


                </div>
            </div>

        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('/')}}dropify/dist/css/dropify.min.css">
@endsection
@section('script')

    <script src="{{asset('/')}}dropify/dist/js/dropify.min.js"></script>
    <script>
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
