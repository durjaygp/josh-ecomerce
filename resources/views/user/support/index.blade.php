@extends('user.master')
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
                            <a href="#" class="btn btn-info d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="ti ti-new-section text-white me-1 fs-5"></i> Create New Ticket
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
                                        <th>Title</th>
                                        <th>Reason</th>
                                        <th>Support Type </th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Priority</th>
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
                                            <td>
                                                <!-- Support Type Badge -->
                                                @if($row->type == 'Billing')
                                                    <span class="badge bg-info">Billing</span>
                                                @elseif($row->type == 'Technical Support')
                                                    <span class="badge bg-warning">Technical Support</span>
                                                @elseif($row->type == 'Sales')
                                                    <span class="badge bg-success">Sales</span>
                                                @endif
                                            </td>
                                            <td>{{ Str::limit($row->description, 25, '...') }}</td>

                                            <td>
                                                <!-- Status Badge -->
                                                @if($row->status == 1)
                                                    <span class="badge bg-secondary">Open</span>
                                                @elseif($row->status == 2)
                                                    <span class="badge bg-success">Closed</span>
                                                @endif
                                            </td>

                                            <td>
                                                <!-- Priority Badge -->
                                                @if($row->priority == 'Critical')
                                                    <span class="badge bg-danger">Critical</span>
                                                @elseif($row->priority == 'High')
                                                    <span class="badge bg-warning">High</span>
                                                @elseif($row->priority == 'Normal')
                                                    <span class="badge bg-success">Normal</span>
                                                @elseif($row->priority == 'Low')
                                                    <span class="badge bg-secondary">Low</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="action-btn">
                                                    @if($row->status == 1)
                                                    <a href="{{route('chat.index',$row->id)}}" class="btn btn btn-primary">
                                                        <i class="ti ti-message-2-check fs-5"></i>
                                                    </a>
                                                    @endif
                                                    <a href="#" class="btn btn-info " data-bs-toggle="modal" data-bs-target="#staticBackdropddd{{$row->id}}">
                                                        <i class="ti ti-eye text-white"></i>
                                                    </a>
                                                    <a href="#" class="btn btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdropt{{$row->id}}">
                                                        <i class="ti ti-corner-right-up fs-5"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->

                                    <!-- View Ticket Modal -->
                                    <div class="modal fade" id="staticBackdropddd{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex align-items-center">
                                                    <h4 class="modal-title" id="myLargeModalLabel">
                                                {{$row->title}}
                                                    </h4>

                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="{{asset($row->image ?? "")}}" alt="">
                                                    <p>Reason: {{$row->reason}}</p>
                                                    <p>Type: {{$row->type}}</p>
                                                    <p>Priority: {{$row->priority}}</p>
                                                    <p>Description: {{$row->description}}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-start" data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Button trigger modal -->

                                    <!-- Modal -->
                                        <div class="modal fade" id="staticBackdropt{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header d-flex align-items-center">
                                                        <h4 class="modal-title" id="myLargeModalLabel">
                                                            Close This Ticket
                                                        </h4>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>

                                                    @if($row->status == 2)
                                                        <h3 class="text-success">{{$row->close_description}}</h3>
                                                    @else
                                                        <div class="modal-body">
                                                            <form method="post" action="{{route('admin-support-close',$row->id)}}" enctype="multipart/form-data">
                                                                @csrf

                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                                            <label for="order_item_id" class="form-label fw-semibold" style="text-align: left;">Update Status <small class="text-danger">*</small></label>
                                                                            <select name="status" id="order_item_id" class="form-control" required>
                                                                                {{-- <option value="">Select Status</option>
                                                                                <option value="1" >Open</option> --}}
                                                                                <option value="2" >Close</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-lg-12">
                                                                        <div class="mb-4">
                                                                            <label for="close_description" class="form-label fw-semibold">Description  <small class="text-danger">*</small></label>
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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
 <!-- Modal -->
 <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Create Support Ticket
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('user-support.store')}}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="type" class="form-label fw-semibold" style="text-align: left;">Support Type <small class="text-danger">*</small></label>
                                <select name="type" id="type" class="form-control" required>
                                    <option value=""> Select </option>
                                    <option value="Billing">Billing</option>
                                    <option value="Technical Support">Technical Support</option>
                                    <option value="Sales">Sales</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-4">
                                <label for="priority" class="form-label fw-semibold" style="text-align: left;">Priority <small class="text-danger">*</small></label>
                                <select name="priority" id="priority" class="form-control" required>
                                    <option value=""> Select </option>
                                    <option value="Critical">Critical</option>
                                    <option value="High">High</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Low">Low</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="title" class="form-label fw-semibold" style="text-align: left;">Title <small class="text-danger">*</small></label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Title" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="reason" class="form-label fw-semibold" style="text-align: left;">Reason <small class="text-danger">*</small></label>
                                <input type="text" name="reason" class="form-control" id="reason" placeholder="Reason" required>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="description" class="form-label fw-semibold">Description</label>
                                <textarea name="description" id="description" class="form-control" placeholder="Description" required></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="Image" class="form-label fw-semibold">Image</label>
                                <input type="file" name="image" class="form-control" id="Image">
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
            <div class="modal-footer">
                <button type="button" class="btn bg-danger-subtle text-danger waves-effect text-start" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->


@endsection
