@extends('backEnd.master')
@section('title','Orders List')
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
                                <li class="breadcrumb-item" aria-current="page">Order</li>
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
                            <h2>Orders List</h2>
                        </div>
                        <div class="col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-3 mt-md-0">
                            <a href="{{route('admin-products.create')}}" class="btn btn-info d-flex align-items-center">
                                <i class="ti ti-new-section text-white me-1 fs-5"></i> Add New Product
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
                                        <th>Order No.</th>
                                        <th>Customer Details</th>
                                        <th>Price</th>
                                        <th>Shipping Address</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Order Status</th>
                                        <th>Shiping Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $row)
                                        <!-- start row -->
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$row->order_number}}</td>
                                            <td>
                                                <p>{{$row->user->name}}</p>
                                                <p>{{$row->user->email}}</p>
                                            </td>
                                            <td>
                                                $ {{ $row->total_price }}
                                            </td>
                                            <td>
                                                <p>{{$row->ship?->first_name ." ". $row->ship?->email}}</p>
                                                <p>{{$row->ship?->address}}</p>
                                                <p>{{$row->ship?->phone}}</p>
                                            </td>

                                            <td><p>{{$row->payment_method}}</p></td>

                                            <td>
                                                @if($row->payment_status == "paid")
                                                    <span class="badge bg-secondary">Paid</span>
                                                @else
                                                    <span class="badge bg-danger">Not Paid</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($row->status == App\Enums\Status::IN_PROGRESS)
                                                    <span class="badge bg-secondary">{{ App\Enums\Status::map()[App\Enums\Status::IN_PROGRESS] }}</span>
                                                @elseif($row->status == App\Enums\Status::COMPLETE)
                                                    <span class="badge bg-success">{{ App\Enums\Status::map()[App\Enums\Status::COMPLETE] }}</span>
                                                @elseif($row->status == App\Enums\Status::FAILED)
                                                    <span class="badge bg-danger">{{ App\Enums\Status::map()[App\Enums\Status::FAILED] }}</span>
                                                @elseif($row->status == App\Enums\Status::SHIPPED)
                                                    <span class="badge bg-info">{{ App\Enums\Status::map()[App\Enums\Status::SHIPPED] }}</span>
                                                @elseif($row->status == App\Enums\Status::PENDING)
                                                    <span class="badge bg-warning">{{ App\Enums\Status::map()[App\Enums\Status::PENDING] }}</span>
                                                @elseif($row->status == App\Enums\Status::CANCELED)
                                                    <span class="badge bg-dark">{{ App\Enums\Status::map()[App\Enums\Status::CANCELED] }}</span>
                                                @else
                                                    <span class="badge bg-light text-black">Unknown Status</span>
                                                @endif
                                            </td>


                                            <td>
                                                @if($row->shipping_status == App\Enums\Status::IN_PROGRESS)
                                                    <span class="badge bg-secondary">{{ App\Enums\Status::map()[App\Enums\Status::IN_PROGRESS] }}</span>
                                                @elseif($row->shipping_status == App\Enums\Status::COMPLETE)
                                                    <span class="badge bg-success">{{ App\Enums\Status::map()[App\Enums\Status::COMPLETE] }}</span>
                                                @elseif($row->shipping_status == App\Enums\Status::FAILED)
                                                    <span class="badge bg-danger">{{ App\Enums\Status::map()[App\Enums\Status::FAILED] }}</span>
                                                @elseif($row->shipping_status == App\Enums\Status::SHIPPED)
                                                    <span class="badge bg-info">{{ App\Enums\Status::map()[App\Enums\Status::SHIPPED] }}</span>
                                                @elseif($row->shipping_status == App\Enums\Status::PENDING)
                                                    <span class="badge bg-warning">{{ App\Enums\Status::map()[App\Enums\Status::PENDING] }}</span>
                                                @elseif($row->shipping_status == App\Enums\Status::CANCELED)
                                                    <span class="badge bg-dark">{{ App\Enums\Status::map()[App\Enums\Status::CANCELED] }}</span>
                                                @else
                                                    <span class="badge bg-light text-black">Unknown Status</span>
                                                @endif
                                            </td>


                                            <td>
                                                <div class="action-btn">
                                                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$row->id}}">
                                                        Change Status
                                                     </a>
                                                    <a href="{{route('admin-order.invoice',$row->id)}}" class="btn btn-sm btn-primary">
                                                        <i class="ti ti-file-invoice fs-5"></i>
                                                    </a>
                                                    <a href="#"
                                                       onclick="event.preventDefault();
                                                           if (confirm('Are you sure you want to delete?'))
                                                           document.getElementById('delete-form-{{ $row->id }}').submit();"
                                                       class="btn btn-sm btn-danger text-white delete ms-2">
                                                        <i class="ti ti-trash fs-5"></i>
                                                    </a>

                                                    <form id="delete-form-{{ $row->id }}" action="{{ route('admin-order.orderDelete', $row->id) }}" method="get" style="display: none;">
                                                        @csrf
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                        <!-- end row -->


     <!-- Modal -->
 <div class="modal fade" id="staticBackdrop{{$row->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myLargeModalLabel">
                    Update Order Status [Order Number: {{$row->order_number}}]
                </h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin-order.orderStatus',$row->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Order Status -->
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="status" class="form-label fw-semibold" style="text-align: left;">
                                    Order Status <small class="text-danger">*</small>
                                </label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value=""> Select </option>
                                    @foreach(App\Enums\Status::map() as $value => $label)
                                        <option value="{{ $value }}" @if($row->status == $value) selected @endif >{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Shipping Status -->
                        <div class="col-lg-12">
                            <div class="mb-4">
                                <label for="shipping_status" class="form-label fw-semibold" style="text-align: left;">
                                    Shipping Status <small class="text-danger">*</small>
                                </label>
                                <select name="shipping_status" id="shipping_status" class="form-control" required>
                                    <option value=""> Select </option>
                                    @foreach(App\Enums\Status::map() as $value => $label)
                                        <option value="{{ $value }}" @if($row->shipping_status == $value) selected @endif >{{ $label }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Submit Button -->
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
