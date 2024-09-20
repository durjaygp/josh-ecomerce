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
{{--                            <a href="{{route('admin-products.create')}}" class="btn btn-info d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">--}}
{{--                                <i class="ti ti-new-section text-white me-1 fs-5"></i> Create New Ticket--}}
{{--                            </a>--}}


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
                                                        <i class="ti ti-message-chatbot fs-5"></i>
                                                    </a>
                                                    @else

                                                    @endif
                                                    <a href="#" class="btn btn btn-primary"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$row->id}}">
                                                        <i class="ti ti-corner-right-up fs-5"></i>
                                                    </a>

                                                        <a href="#"
                                                           onclick="event.preventDefault();
                                                               if (confirm('Are you sure you want to delete?'))
                                                               document.getElementById('delete-form-{{ $row->id }}').submit();"
                                                           class="text-white btn btn-danger delete ms-2">
                                                            <i class="ti ti-trash fs-5"></i>
                                                        </a>

                                                        <form id="delete-form-{{ $row->id }}" action="{{ route('admin-chat-delete', $row->id) }}" method="post" style="display: none;">
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

@foreach($support as $row)
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center">
                    <h4 class="modal-title" id="myLargeModalLabel">
                        Close This Ticket
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin-support-close',$row->id)}}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="order_item_id" class="form-label fw-semibold" style="text-align: left;">Update Status <small class="text-danger">*</small></label>
                                    <select name="status" id="order_item_id" class="form-control" required>
                                        <option value="">Select Status</option>
                                        <option value="1" >Open</option>
                                        <option value="2" >Close</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="mb-4">
                                    <label for="close_description" class="form-label fw-semibold">Description</label>
                                    <textarea name="close_description" id="close_description" class="form-control" placeholder="Description" required></textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="gap-3 d-flex align-items-center">
                                    <button class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

                @if($row->status == 2)
                    <h3 class="text-success">{{$row->close_description}}</h3>
                @endif

                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-start" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Button trigger modal -->
@endforeach


@endsection
