@extends('backEnd.master')
@section('title','Create Admin')
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
                                <li class="breadcrumb-item" aria-current="page">Admin</li>
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
                <div class="row">
                    <div class="col-md-4 ">
                        <h2>Create Admin
                        </h2>
                    </div>

                </div>
                <div class="card-body">


                    <form method="post" action="{{ route('save-admin') }}">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Select Role <small class="text-danger">*</small></label>
                                    <select name="role_id" id="" class="form-select">
                                        <option name="">Select</option>
                                        @foreach($roles as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Name</label>
                                    <input type="text" name="name" class="form-control" id="exampleInputtext" placeholder="Name" value="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label fw-semibold">Email</label>
                                    <input type="text" name="email" class="form-control" id="exampleInputtext"  value="">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-4">
                                <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1">
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
