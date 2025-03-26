@extends('backEnd.master')
@section('title','Create New Video')
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
                                <li class="breadcrumb-item" aria-current="page">Blog</li>
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
                            <h2>Add Video</h2>
                        </div>
                        <div class="mt-3 col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-md-0">
                            <a href="{{route('admin-video.index')}}" class="btn btn-info d-flex align-items-center">
                                <i class="text-white ti ti-list-details me-1 fs-5"></i> Video List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

                    <form action="{{ route('wapdavvideo.upload') }}" method="post" enctype="multipart/form-data" id="file-dropzone" style="border: 2px solid #0a0a0a;">
                        @csrf

                        <div class="col-lg-12">
                            <div class="mb-4" style="margin-bottom: 200px!important;">
                                <label class="form-label fw-semibold">Video</label>
                                <div class="dropzone" id="my-dropzone">
                                    <div class="dz-default dz-message">
                                        Drag and drop video here or click to upload
                                    </div>
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

    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">--}}
    <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />

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
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove':  'Remove',
                'error':   'Oops, something wrong happened.'
            }
        });
    </script>
    <script type="text/javascript">
        Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone("#my-dropzone", {
            url: "{{ route('wapdavvideo.upload') }}",
            maxFilesize: 200000, // MB
            acceptedFiles: ".mp4, .avi, .mov",
            addRemoveLinks: true,
            clickable: "#my-dropzone",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content")
            },
            init: function() {
                var submitButton = document.querySelector("button[type='submit']");
                submitButton.addEventListener("click", function() {
                    if (myDropzone.getQueuedFiles().length > 0) {
                        myDropzone.processQueue();
                    } else {
                        document.getElementById('file-dropzone').submit();
                    }
                });
            },
            sending: function(file, xhr, formData) {
                formData.append("_token", document.querySelector('meta[name="csrf-token"]').getAttribute("content"));
            },
            success: function(file, response) {
                console.log("File uploaded successfully:", response);

                var videoInput = document.createElement("input");
                videoInput.type = "hidden";
                videoInput.name = "video";
                videoInput.value = response.path; // Ensure response includes 'path'
                document.getElementById('file-dropzone').appendChild(videoInput);

                document.getElementById('file-dropzone').submit();
            },
            error: function(file, error) {
                console.log("Error uploading file:", error);
            }
        });

    </script>
@endsection
