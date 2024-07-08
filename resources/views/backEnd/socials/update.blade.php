@extends('backEnd.master')
@section('title','Update Socials Link')
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
                                <li class="breadcrumb-item" aria-current="page">Socials Link</li>
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
                            <h2>Update Socials Link</h2>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('update-socials-save')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="facebookLink" class="form-label fw-semibold">Facebook Link</label>
                                    <input type="url" name="facebook" class="form-control" id="facebookLink" placeholder="Example: https://www.facebook.com/" value="{{$social->facebook}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="whatsappLink" class="form-label fw-semibold">WhatsApp Link</label>
                                    <input type="url" name="whatsapp" class="form-control" id="whatsappLink" placeholder="Example: https://wa.me/1234567890" value="{{$social->whatsapp}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="youtubeLink" class="form-label fw-semibold">YouTube Link</label>
                                    <input type="url" name="youtube" class="form-control" id="youtubeLink" placeholder="Example: https://www.youtube.com/" value="{{$social->youtube}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="instagramLink" class="form-label fw-semibold">Instagram Link</label>
                                    <input type="url" name="instagram" class="form-control" id="instagramLink" placeholder="Example: https://www.instagram.com/" value="{{$social->instagram}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="tiktokLink" class="form-label fw-semibold">TikTok Link</label>
                                    <input type="url" name="tiktok" class="form-control" id="tiktokLink" placeholder="Example: https://www.tiktok.com/" value="{{$social->tiktok}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="telegramLink" class="form-label fw-semibold">Telegram Link</label>
                                    <input type="url" name="telegram" class="form-control" id="telegramLink" placeholder="Example: https://t.me/username" value="{{$social->telegram}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="snapchatLink" class="form-label fw-semibold">Snapchat Link</label>
                                    <input type="url" name="snapchat" class="form-control" id="snapchatLink" placeholder="Example: https://www.snapchat.com/" value="{{$social->snapchat}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="twitterLink" class="form-label fw-semibold">Twitter Link</label>
                                    <input type="url" name="twitter" class="form-control" id="twitterLink" placeholder="Example: https://twitter.com/" value="{{$social->twitter}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="pinterestLink" class="form-label fw-semibold">Pinterest Link</label>
                                    <input type="url" name="pinterest" class="form-control" id="pinterestLink" placeholder="Example: https://www.pinterest.com/" value="{{$social->pinterest}}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-primary">Submit</button>
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
