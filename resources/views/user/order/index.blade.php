@extends('user.master')
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
                                <li class="breadcrumb-item"><a class="text-muted " href="{{route('dashboard')}}">Dashboard</a></li>
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
                                        <th>Customer Details</th>
                                        <th>Price</th>
                                        <th>Shipping Address</th>
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <!-- end row -->
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $row)
                                        <!-- start row -->
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
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
                                            <td>
                                                <p>{{$row->payment_method}}</p>
                                            </td>
                                            <td>
                                                @if($row->payment_status == "paid")
                                                    <span class="badge bg-secondary">Paid</span>
                                                @else
                                                    <span class="badge bg-danger">Not Paid</span>
                                                @endif
                                            </td>

                                            <td>
                                                <div class="action-btn">
                                                    <a href="{{route('admin-order.invoice',$row->id)}}" class="btn btn-sm btn-primary">
                                                        <i class="ti ti-file-invoice fs-5"></i>
                                                    </a>
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
