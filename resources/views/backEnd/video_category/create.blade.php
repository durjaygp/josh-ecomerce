@extends('backEnd.master')
@section('title','Create Video Category')
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
                                <li class="breadcrumb-item" aria-current="page">Product Category</li>
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
            <div class="card card-body">
                <div class="row">
                    <div class="col-md-4 col-xl-3">
                        <form class="position-relative">
                            <input type="text" class="form-control product-search ps-5" id="input-search" placeholder="Search..." />
                            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                        </form>
                    </div>
                    <div class="col-md-8 col-xl-9 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">

                        <a href="{{route('category.index')}}" class="btn btn-info d-flex align-items-center">
                            <i class="ti ti-list text-white me-1 fs-5"></i>Product Category List
                        </a>
                    </div>
                </div>
            </div>
            <!-- ---------------------
                            end Contact
                        ---------------- -->
             <div class="card card-body">

                 <form action="{{ route('upload.view') }}" method="POST" enctype="multipart/form-data">
                     @csrf
                     <input type="file" name="file" class="form-control">
                     <button type="submit" class="btn btn-primary">Upload</button>
                 </form>

                 <form method="post" action="{{route('admin-product-category.store')}}">
                     @csrf
                     <div class="row">


                         <div class="col-lg-6">
                             <div class="mb-4">
                                 <label for="Name" class="form-label fw-semibold">Product Category Name</label>
                                 <input type="text" name="name" class="form-control" id="Name" placeholder="Product Category Name">
                             </div>
                         </div>
                         <div class="col-lg-6">
                             <div class="mb-4">
                                 <label for="Status" class="form-label fw-semibold">Status</label>
                                 <select name="status" id="Status" class="form-select">
                                     <option value="1">Publish</option>
                                     <option value="2">Unpublished</option>
                                 </select>
                             </div>
                         </div>

                         <div class="col-lg-12">
                             <div class="mb-4">
                                 <label for="exampleInputPassword1" class="form-label fw-semibold">Description</label>
                                 <textarea type="text" name="description" class="form-control" placeholder="Short Description"></textarea>
                             </div>
                         </div>
                         <div class="col-12 mt-2">
                                 <div class="ms-auto mt-3 mt-md-0">
                                     <button
                                         type="submit"
                                         class="btn btn-info font-medium rounded-pill px-4"
                                     >
                                         <div class="d-flex align-items-center">
                                             <i class="ti ti-send me-2 fs-4"></i>
                                             Save
                                         </div>
                                     </button>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
            </div>
        </div>
    </div>
@endsection
