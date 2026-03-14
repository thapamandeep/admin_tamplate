<!DOCTYPE html>
<html>
<head>
    <title>Contact Message</title>
</head>
<body style="font-family:Arial;background:#f4f4f4;padding:30px;">

    <div style="
        max-width:500px;
        margin:auto;
        background:#fff;
        padding:25px;
        border-radius:10px;
    ">

        <h2 style="color:#28a745;">FoodMart order updated Message</h2>

       <h2>Hello {{ $user->name }}</h2>

        <p>Your order has been updated.</p>

       @foreach($data as $order)
    <li>{{ $order->product->title }} - Quantity: {{ $order->quantity }}</li>
       @endforeach

        <p>Status: {{ $data[0]->status ?? ''}}</p>

        <p>Thank you for shopping with us.</p>
        <div style="
            background:#f7f7f7;
            padding:15px;
            border-radius:8px;
        ">
            {{ $customMessage }}
        </div>

    </div>

</body>
</html>
