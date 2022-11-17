<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    <h1>Order Details</h1>

    Customer Name :<h3>{{ $order->cust_name }}</h3>
    Customer Address :<h3>{{ $order->cust_address }}</h3>
    Customer Email :<h3>{{ $order->cust_email }}</h3>
    Customer Phone :<h3 Name :h3>{{ $order->cust_phone }}</h3>
    Customer Product Title :<h3>{{ $order->prod_title }}</h3>
    <img src="/products/{{ $order->prod_image }}" width="100" alt="">



</body>
</html>