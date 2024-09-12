@extends('backEnd.master')
@section('title','Support Tickets')
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
                                <li class="breadcrumb-item" aria-current="page">Support Tickets</li>
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
                            <h2>Support Tickets</h2>
                        </div>
                        <div class="col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="{{route('admin-products.create')}}" class="btn btn-info d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="ti ti-new-section text-white me-1 fs-5"></i> Create New Ticket
                            </a>


                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="zero_config"
                                       class="table border table-striped table-bordered text-nowrap table-responsive">
                                    <thead>
                                    <!-- start row -->
                                    <tr>
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Reason</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($support as $row)
                                        <!-- start row -->
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $row->title }}</td>
                                            <td>{{ $row->reason }}</td>
                                            <td>{{ $row->description }}</td>

                                            <td>
                                                @if($row->status == 1)
                                                    <span class="badge bg-secondary">Open</span>
                                                @elseif($row->status == 2)
                                                    <span class="badge bg-success">Solved and Closed</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="action-btn">
                                                    @if($row->status == 1)
                                                    <a href="{{route('admin-chat',$row->id)}}" class="btn btn btn-primary">
                                                        <i class="ti ti-message-2-check fs-5"></i>
                                                    </a>
                                                    @else
                                                    @endif
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
