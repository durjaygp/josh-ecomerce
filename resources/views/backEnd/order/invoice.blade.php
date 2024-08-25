<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset(setting()->fav_icon ?? "")}}" rel="icon" />
    <title>Order Invoice</title>
    <meta name="author" content="harnishdesign.net">

    <!-- Web Fonts
    ======================= -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900' type='text/css'>

    <!-- Stylesheet
    ======================= -->
    <link rel="stylesheet" type="text/css" href="{{asset('homePage/invoice/bootstrap.min.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('homePage/invoice/stylesheet.css')}}"/>
</head>
<body>
<!-- Container -->
<div class="container-fluid invoice-container">
    <!-- Header -->
    <header>
        <div class="row align-items-center gy-3">
            <div class="col-sm-7 text-center text-sm-start">
                <img id="logo" src="{{asset(optional(setting())->website_logo)}}" title="Koice" alt="Koice" class="img-fluid w-50" />
            </div>
            <div class="col-sm-5 text-center text-sm-end">
                <h4 class="text-7 mb-0">Invoice</h4>
            </div>
        </div>
        <hr>
    </header>

    <!-- Main Content -->
    <main>
        <div class="row">
            <div class="col-sm-6"><strong>Date:</strong> {{$order->created_at->format('d M Y')}}</div>
            <div class="col-sm-6 text-sm-end"> <strong>Invoice No:</strong> 16835</div>

        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 text-sm-end order-sm-1"> <strong>Pay To:</strong>
                <address>
                    {{ optional(setting())->name ?? ""}}<br />
                    {{ optional(setting())->address ?? ""}}<br />
                    {{ optional(setting())->email ?? ""}}<br />
                    {{ optional(setting())->phone ?? ""}}
                    {{ optional(setting())->phone ?? ""}}
                </address>
            </div>
            <div class="col-sm-6 order-sm-0"> <strong>Invoiced To:</strong>
                <address>
                    {{$order->ship?->first_name .' '.$order->ship?->last_name}}<br />
                    {{$order->ship?->address}}<br />
                    {{$order->ship?->town}}, {{$order->ship?->state}}, {{$order->ship?->postal_code}}<br />
                    {{$order->ship?->email}}<br />
                    {{$order->ship?->phone}}
                </address>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table border mb-0">
                <thead>
                <tr class="bg-light">
                    <td class="col-4"><strong>Description</strong></td>
                    <td class="col-2 text-center"><strong>Rate</strong></td>
                    <td class="col-1 text-center"><strong>QTY</strong></td>
                    <td class="col-2 text-end"><strong>Amount</strong></td>
                </tr>
                </thead>
                <tbody>
                @foreach($orderItems as $row)
                    <tr>
                        <td class="col-4 text-1">{{ $row->product?->name }}</td>
                        <td class="col-2 text-center">${{ number_format($row->product?->price, 2) }}</td>
                        <td class="col-1 text-center">{{ $row->quantity }}</td>
                        <td class="col-2 text-end">${{ number_format($row->product?->price * $row->quantity, 2) }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="table-responsive">
            <table class="table border border-top-0 mb-0">
                <tr class="bg-light">
                    <td class="text-end"><strong>Sub Total:</strong></td>
                    <td class="col-sm-2 text-end">${{ number_format($subTotal, 2) }}</td>
                </tr>

                @if($discount > 0)
                    <tr class="bg-light">
                        <td class="text-end"><strong>Discount:</strong></td>
                        <td class="col-sm-2 text-end">- ${{ number_format($discount, 2) }}</td>
                    </tr>
                @endif

                <tr class="bg-light">
                    <td class="text-end"><strong>Total:</strong></td>
                    <td class="col-sm-2 text-end">${{ number_format($total, 2) }}</td>
                </tr>
            </table>
        </div>

    </main>
    <!-- Footer -->
    <footer class="text-center mt-4">
        <p class="text-1"><strong>NOTE :</strong> This is computer generated receipt and does not require physical signature.</p>
        <div class="btn-group btn-group-sm d-print-none">

            <a class="btn btn-primary" href="{{route('admin-order.index')}}">Back</a>

            <a href="javascript:window.print()" class="btn btn-success border text-white shadow-none">
                &#128438; Print & Download</a>
            <br>

        </div>

    </footer>
</div>
</body>
</html>
