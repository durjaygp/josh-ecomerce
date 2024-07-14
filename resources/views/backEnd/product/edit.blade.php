@extends('backEnd.master')
@section('title','Update Product')
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="{{route('admin.index')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Product</li>
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
                        <div class="col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="{{route('admin-products.index')}}" class="btn btn-info d-flex align-items-center">
                                <i class="ti ti-list-details text-white me-1 fs-5"></i> Product List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('admin-products.update', $product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="product_name" class="form-label fw-semibold">Product Name</label>
                                    <input type="text" name="name" class="form-control" id="product_name" placeholder="Product Name" value="{{ old('name', $product->name) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_price" class="form-label fw-semibold">Product Price</label>
                                    <input type="number" name="price" class="form-control" id="product_price" placeholder="Product Price" value="{{ old('price', $product->price) }}" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="product_category" class="form-label fw-semibold">Product Category</label>
                                    <select name="product_category_id" id="product_category" class="form-control" required>
                                        <option>Select Category</option>
                                        @foreach($categories as $row)
                                            <option value="{{ $row->id }}" {{ $product->product_category_id == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">Short description</label>
                                    <textarea name="description" id="editor" class="form-control" placeholder="Short description" required>{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="image" class="form-label fw-semibold">Image</label>
                                    <input type="file" name="image" class="form-control dropify">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="image" class="form-label fw-semibold">Existing Image</label>
                                    <br>
                                    @if($product->image)
                                        <img src="{{ asset($product->image) }}" alt="Product Image" width="250px">
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="main_content" class="form-label fw-semibold">Main Product Description</label>
                                    <textarea name="main_content" id="summernote" cols="30" rows="10" required>{{ old('main_content', $product->main_content) }}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="status" class="form-label fw-semibold">Status</label>
                                    <select name="status" id="status" class="form-select" required>
                                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Publish</option>
                                        <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Draft/Unpublished</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="seo_title" class="form-label fw-semibold">Seo Title</label>
                                    <input type="text" name="seo_title" class="form-control" id="seo_title" placeholder="Seo Title" value="{{ old('seo_title', $product->seo_title) }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="seo_description" class="form-label fw-semibold">Seo Description</label>
                                    <input type="text" name="seo_description" class="form-control" id="seo_description" placeholder="Seo Description" value="{{ old('seo_description', $product->seo_description) }}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="seo_keywords" class="form-label fw-semibold">Seo Keywords</label>
                                    <input type="text" name="seo_keywords" class="form-control" id="seo_keywords" placeholder="Seo Keywords" value="{{ old('seo_keywords', $product->seo_keywords) }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="gap-3 d-flex align-items-center">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="{{asset('/')}}dropify/dist/css/dropify.min.css">
    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.css">

    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/quill/dist/quill.snow.css">
@endsection
@section('script')

{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <script src="{{asset('/')}}dropify/dist/js/dropify.min.js"></script>
    <script src="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 300,
                callbacks: {
                    onImageUpload: function(files) {
                        uploadImage(files[0]);
                    }
                }
            });

            function uploadImage(file) {
                let data = new FormData();
                data.append("image", file);
                $.ajax({
                    url: '{{ route('summernote.upload') }}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response.data);
                        $('#summernote').summernote('insertImage', response.url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    </script>
    <script>
        // $("#summernote").summernote({
        //     height: 350, // set editor height
        //     minHeight: null, // set minimum height of editor
        //     maxHeight: null, // set maximum height of editor
        //     focus: false, // set focus to editable area after initializing summernote
        // });
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Ooops, something wrong happended.'
            }
        });
    </script>
    <script>
        var quill = new Quill("#editor", {
            theme: "snow",
        });
    </script>
@endsection

