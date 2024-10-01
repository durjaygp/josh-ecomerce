@extends('backEnd.master')
@section('title','FAQ')
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
                                <li class="breadcrumb-item" aria-current="page">FAQ</li>
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
                            <h2>FAQ List</h2>
                        </div>
                        <div class="mt-3 col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-md-0">
                            <a href="{{route('admin-faq.create')}}" class="btn btn-info d-flex align-items-center">
                                <i class="text-white ti ti-new-section me-1 fs-5"></i> New FAQ
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table width="100%" id="zero_config" class="table border table-striped table-bordered text-nowrap table-responsive">
                                    <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                    </thead>
                                    <tbody>
                                    @foreach($faqs as $row)
                                    <!-- start row -->
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{\Illuminate\Support\Str::limit($row->question,50)}}</td>
                                        <td>{!!  \Illuminate\Support\Str::limit($row->answer,50) !!}</td>
                                        <td>
                                            @if($row->status == 1)
                                                <span class="badge bg-secondary">Active</span>
                                            @elseif($row->status == 2)
                                                <span class="badge bg-danger">Inactive</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="action-btn">
                                                <a href="{{route('admin-faq.edit',$row->id)}}" class="btn btn-sm btn-primary">
                                                    <i class="ti ti-pencil fs-5"></i>
                                                </a>
                                                <a href="#"
                                                   onclick="event.preventDefault();
                                                       if (confirm('Are you sure you want to delete?'))
                                                       document.getElementById('delete-form-{{ $row->id }}').submit();"
                                                   class="text-white btn btn-sm btn-danger delete ms-2">
                                                    <i class="ti ti-trash fs-5"></i>
                                                </a>

                                                <form id="delete-form-{{ $row->id }}" action="{{ route('admin-faq.destroy', $row->id) }}" method="post" style="display: none;">
                                                    @csrf
                                             @method('delete')
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                    <!-- end row -->
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
