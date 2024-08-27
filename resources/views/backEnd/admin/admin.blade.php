@extends('backEnd.master')
@section('title','Admin Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 d-flex align-items-stretch">
                <div class="card w-100 bg-light-info overflow-hidden shadow-none">
                    <div class="card-body position-relative">
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="d-flex align-items-center mb-7">
                                    <div class="rounded-circle overflow-hidden me-6">
                                        <img src="{{asset('back')}}/assets/images/profile/user-1.jpg" alt="" width="40" height="40">
                                    </div>
                                    <h5 class="fw-semibold mb-0 fs-5">Welcome back {{auth()->user()->name}}!</h5>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="welcome-bg-img mb-n7 text-end">
                                    <img src="{{asset('back')}}/assets/images/backgrounds/welcome-bg.svg" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @php
                $totalgame = \App\Models\Category::count();
                $totaluser = \App\Models\User::count();
                $totalblog = \App\Models\Blog::count();
                $totalproduct = \App\Models\Product::count();
                $totalService = \App\Models\Service::count();
                $totalsale = \App\Models\Order::sum('total_price');
            @endphp

            <div class="col-md-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-success shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('back/assets/images/svgs/icon-cart.svg')}}" width="50" height="50" class="mb-3" alt="" />
                                <p class="fw-semibold fs-3 text-warning mb-1">Total Sale</p>
                                <h5 class="fw-semibold text-warning mb-0">$ {{$totalsale}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-success shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('back/assets/images/svgs/icon-database.svg')}}" width="50" height="50" class="mb-3" alt="" />
                                <p class="fw-semibold fs-3 text-warning mb-1">Total Product</p>
                                <h5 class="fw-semibold text-warning mb-0">{{$totalproduct}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-success shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('back/assets/images/svgs/icon-dd-application.svg')}}" width="50" height="50" class="mb-3" alt="" />
                                <p class="fw-semibold fs-3 text-warning mb-1">Total Service</p>
                                <h5 class="fw-semibold text-warning mb-0">{{$totalService}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-warning shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('back')}}/assets/images/svgs/icon-user-male.svg" width="50" height="50" class="mb-3" alt="" />
                                <p class="fw-semibold fs-3 text-warning mb-1">Total User</p>
                                <h5 class="fw-semibold text-warning mb-0">{{$totaluser}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-success shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('back')}}/assets/images/svgs/icon-briefcase.svg" width="50" height="50" class="mb-3" alt="" />
                                <p class="fw-semibold fs-3 text-warning mb-1">Total Category</p>
                                <h5 class="fw-semibold text-warning mb-0">{{$totalgame}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="item">
                    <div class="card border-0 zoom-in bg-light-warning shadow-none">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{asset('back')}}/assets/images/svgs/icon-connect.svg" width="50" height="50" class="mb-3" alt="" />
                                <p class="fw-semibold fs-3 text-warning mb-1">Total Blog</p>
                                <h5 class="fw-semibold text-warning mb-0">{{$totalblog}}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        A basic column chart comparing estimated corn and wheat production
                        in some countries.

                        The chart is making use of the axis crosshair feature, to highlight
                        the hovered country.
                    </p>
                </figure>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <style>
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 100%;
            max-width: 100%;
            margin: 1em auto;
        }

        #container {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Convert all elements in salesData to numbers
            var salesData = @json(array_values($salesData)).map(Number);

            // console.log(salesData); // Debug: Log salesData to ensure it's numeric

            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Monthly Sales This Year',
                    align: 'left'
                },
                xAxis: {
                    categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Sales'
                    }
                },
                tooltip: {
                    valueSuffix: ' USD'
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Total Sales',
                    data: salesData
                }]
            });
        });
    </script>
@endsection
