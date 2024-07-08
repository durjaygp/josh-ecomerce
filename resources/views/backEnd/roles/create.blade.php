@extends('backEnd.master')
@section('title','Create Roles')
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
                            <a href="{{route('roles-permission.index')}}" class="btn btn-info d-flex align-items-center">
                                <i class="text-white ti ti-new-section me-1 fs-5"></i> Roles List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{route('roles-permission.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-semibold">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold">Permissions</label>

                                    <!-- Roles Section -->
                                    <div class="row m-2">
                                        <h2>Roles</h2>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="role-list" id="role-list">
                                                <label class="form-check-label" for="role-list">Role List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="role-create" id="role-create">
                                                <label class="form-check-label" for="role-create">Role Create</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="role-edit" id="role-edit">
                                                <label class="form-check-label" for="role-edit">Role Edit</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="role-delete" id="role-delete">
                                                <label class="form-check-label" for="role-delete">Role Delete</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Categories Section -->
                                    <div class="row m-2">
                                        <h2>Categories</h2>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="category-list" id="category-list">
                                                <label class="form-check-label" for="category-list">Category List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="category-create" id="category-create">
                                                <label class="form-check-label" for="category-create">Category Create</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="category-edit" id="category-edit">
                                                <label class="form-check-label" for="category-edit">Category Edit</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="category-delete" id="category-delete">
                                                <label class="form-check-label" for="category-delete">Category Delete</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Blogs Section -->
                                    <div class="row m-2">
                                        <h2>Blogs</h2>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="blog-list" id="blog-list">
                                                <label class="form-check-label" for="blog-list">Blog List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="blog-create" id="blog-create">
                                                <label class="form-check-label" for="blog-create">Blog Create</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="blog-edit" id="blog-edit">
                                                <label class="form-check-label" for="blog-edit">Blog Edit</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="blog-delete" id="blog-delete">
                                                <label class="form-check-label" for="blog-delete">Blog Delete</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pages Section -->
                                    <div class="row m-2">
                                        <h2>Pages</h2>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="page-list" id="page-list">
                                                <label class="form-check-label" for="page-list">Page List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="page-create" id="page-create">
                                                <label class="form-check-label" for="page-create">Page Create</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="page-edit" id="page-edit">
                                                <label class="form-check-label" for="page-edit">Page Edit</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="page-delete" id="page-delete">
                                                <label class="form-check-label" for="page-delete">Page Delete</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Social Section -->
                                    <div class="row m-2">
                                        <h2>Social</h2>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="social-list" id="social-list">
                                                <label class="form-check-label" for="social-list">Social List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="social-create" id="social-create">
                                                <label class="form-check-label" for="social-create">Social Create</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Subscribers Section -->
                                    <div class="row m-2">
                                        <h2>Subscribers</h2>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="subscriber-list" id="subscriber-list">
                                                <label class="form-check-label" for="subscriber-list">Subscriber List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="subscriber-create" id="subscriber-create">
                                                <label class="form-check-label" for="subscriber-create">Subscriber Create</label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Websites Section -->
                                    <div class="row m-2">
                                        <h2>Websites</h2>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="website-list" id="website-list">
                                                <label class="form-check-label" for="website-list">Website List</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="permissions[]" value="website-create" id="website-create">
                                                <label class="form-check-label" for="website-create">Website Create</label>
                                            </div>
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
