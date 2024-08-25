<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <link href="{{asset(setting()->fav_icon ?? "")}}" rel="icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .confirmation-box {
            max-width: 450px;
            margin: 100px auto;
            padding: 30px;
            border-radius: 15px;
            background-color: #ffffff;
            box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .confirmation-box .icon {
            font-size: 60px;
            color: #ff6a00;
            margin-bottom: 20px;
            position: relative;
        }

        .confirmation-box .icon::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 80px;
            height: 80px;
            background: rgba(255, 106, 0, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            z-index: -1;
        }

        .confirmation-box .message {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .confirmation-box .subtext {
            font-size: 14px;
            color: #999999;
            margin-bottom: 30px;
        }

        .confirmation-box .btn-primary {
            background-color: #ff6a00;
            border-color: #ff6a00;
        }

        .confirmation-box .btn-outline-secondary {
            border-color: #cccccc;
            color: #555555;
        }
    </style>
</head>

<body>

<div class="confirmation-box">
    <div class="icon">
        <i class="bi bi-check-circle-fill"></i>
        <img src="{{asset('order.gif')}}" alt="">
    </div>
    <div class="message">Thank you for ordering!</div>
    <div class="subtext">
        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.
    </div>
    <div class="d-grid gap-2 d-md-block">
        <a href="{{route('my-orders')}}" class="btn btn-outline-secondary" type="button">View Order</a>
        <a href="{{route('home.products')}}" class="btn btn-primary" type="button">Continue Shopping</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
