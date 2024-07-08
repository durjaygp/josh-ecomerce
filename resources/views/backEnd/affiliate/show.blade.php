@extends('backEnd.master')
@section('title')
    {{ $affiliateProduct->name }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="overflow-hidden shadow-none card bg-light-info position-relative">
            <div class="px-4 py-3 card-body">
                <div class="row align-items-center">
                    <div class="col-9">
                        <h4 class="mb-8 fw-semibold">@yield('title')</h4>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('admin.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a class="text-muted" href="{{ route('affiliate.index') }}">Affiliate Products</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $affiliateProduct->name }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-3">
                        <div class="text-center mb-n5">
                            <img src="{{ asset('back/assets/images/breadcrumb/ChatBc.png') }}" alt="" class="img-fluid mb-n4">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="widget-content searchable-container list">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h2>{{ $affiliateProduct->name }}</h2>
                        </div>
                        <div class="mt-3 col-md-8 text-end d-flex justify-content-md-end justify-content-center mt-md-0">
                            <a href="{{ route('affiliate.index') }}" class="btn btn-info d-flex align-items-center">
                                <i class="text-white ti ti-list-details me-1 fs-5"></i> Affiliate Product List
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-responsive table-hover">
                        <tr>
                            <th>Blogs</th>
                            <td>
                                @foreach($blogs as $blog)
                                    {{ $blog->name }}@if (!$loop->last), @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $affiliateProduct->name }}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{ $affiliateProduct->price }}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td><a href="{{ $affiliateProduct->link }}" target="_blank">{{ $affiliateProduct->link }}</a></td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{{ $affiliateProduct->description }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>{{ $affiliateProduct->status == 1 ? 'Publish' : 'Draft/Unpublished' }}</td>
                        </tr>
                        <tr>
                            <th>Image</th>
                            <td><img src="{{ asset($affiliateProduct->image) }}" alt="{{ $affiliateProduct->name }}" style="max-width: 200px;"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
