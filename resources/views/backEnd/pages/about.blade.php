@extends('backEnd.master')
@section('title','Update About Me Page')
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
                            <h2>Update About Section</h2>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('page.homeAboutSave')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="About Page Title" value="{{$row->title}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Short Title (Optional)</label>
                                    <input type="text" name="header" class="form-control" placeholder="Short Title (Optional" value="{{$row->header}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Description</label>
                                    <textarea name="description" id="" cols="10" rows="5" class="form-control" placeholder="Write a short Description">{{$row->description}}</textarea>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Content</label>
                                    <textarea name="main_content" id="summernote" cols="10" rows="5" class="form-control" placeholder="Write a short Description">{{$row->main_content}}</textarea>

                                </div>
                            </div>
                            <div class="row">
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold"> Image</label>
                                        <input class="dropify" type="file" name="image" accept="image/*">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="exampleInputPassword1" class="form-label fw-semibold">Existing Image</label> <br>
                                        <img src="{{asset($row->image)}}" class="img-fluid w-50">
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
    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.css">

    <link rel="stylesheet" href="{{asset('back')}}/assets/libs/quill/dist/quill.snow.css">
@endsection
@section('script')

    <script src="{{asset('/')}}dropify/dist/js/dropify.min.js"></script>
    <script src="{{asset('back')}}/assets/libs/summernote/dist/summernote-lite.min.js"></script>
    <script src="{{asset('back')}}/assets/libs/quill/dist/quill.min.js"></script>
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
    <script>
        var quill = new Quill("#editor", {
            theme: "snow",
        });
    </script>
@endsection
