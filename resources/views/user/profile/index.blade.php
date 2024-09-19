@extends('user.master')
@section('title')
    Update Profile Information
@endsection
@section('content')
    <div class="container-fluid">
        <div class="card bg-light-info shadow-none position-relative overflow-hidden">
            <div class="card-body px-4 py-3">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="fw-semibold mb-8">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted " href="{{route('dashboard')}}">Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Profile</li>
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

            </div>
            <div class="card">
                <div class="row">
                    <div class="col-md-4 ">
                        <h2>Update Personal Details</h2>
                    </div>
                    <div class="col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                        <a href="{{route('blog.list')}}" class="btn btn-info d-flex align-items-center">
                            <i class="ti ti-list-details text-white me-1 fs-5"></i> Blog List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $person = \App\Models\User::find(auth()->user()->id);
                    @endphp

                    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputtext" placeholder="Name" value="{{$person->name}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputtext"  value="{{$person->email}}">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="description" class="form-label fw-semibold">Personal Details (Short Description)</label>
                                    <textarea name="description" id="description" class="form-control" cols="5" rows="5">{{$person->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Image</label>
                                    <input type="file" name="image" class="form-control" id="exampleInputtext">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Existing Image</label>
                                    <br>
                                    <img src="{{asset($person->image)}}" class="img-thumbnail" width="250px" alt="">
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
                <div class="card-body">
                    <h3>Update Password</h3>
                    <form method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="row">

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Current Password</label>
                                    <input type="password" name="current_password" class="form-control" id="exampleInputtext" >
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">New Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputtext" >
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Confirm Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputtext">
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
