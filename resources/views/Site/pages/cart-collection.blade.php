@extends('Site.layout.tamplate')

@section('content')

<style>

.cart-page{
max-width:1100px;
margin:auto;
}

.cart-table{
width:100%;
background:#fff;
border-collapse:collapse;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
border-radius:10px;
overflow:hidden;
}

.cart-table th{
background:#f3f4f6;
padding:15px;
text-align:left;
}

.cart-table td{
padding:15px;
border-bottom:1px solid #eee;
}

.product-box{
display:flex;
align-items:center;
gap:12px;
}

.product-box img{
width:70px;
height:70px;
object-fit:cover;
border-radius:6px;
}

.remove-btn{
background:#e74c3c;
color:#fff;
padding:6px 10px;
border-radius:4px;
text-decoration:none;
}

.summary-box{
margin-top:30px;
width:350px;
margin-left:auto;
background:#fff;
padding:20px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
border-radius:10px;
}

.checkout-btn{
width:100%;
background:#27ae60;
color:#fff;
border:none;
padding:10px;
border-radius:6px;
cursor:pointer;
}

</style>

<section class="py-5">
<div class="container cart-page">

<h3 class="mb-4">Your Cart</h3>

@if(session('success'))
<div class="alert alert-success">
{{ session('success') }}
</div>
@endif

<div class="table-responsive">

<table class="cart-table">

<thead>
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th>Remove</th>
</tr>
</thead>

<tbody>

@php
$grandTotal = 0;
@endphp

@foreach($carts as $cart)

@php
$total = $cart->product->cost * $cart->quantity;
$grandTotal += $total;
@endphp

<tr>

<td>
<div class="product-box">

<img src="{{ asset('storage/gallery/'.$cart->product->image) }}">

<div>
<b>{{ $cart->product->title }}</b>
</div>

</div>
</td>

<td>
{{ $cart->product->cost }}
</td>

<td>
{{ $cart->quantity }}
</td>

<td>
{{ $total }}
</td>

<td>
<a href="{{route('get.delete.cart', $cart->id)}}" class="remove-btn">
Remove
</a>
</td>

</tr>

@endforeach

</tbody>

</table>

</div>


<div class="summary-box">

<h4>Cart Summary</h4>

<hr>

<div class="d-flex justify-content-between mb-2">
<span>Subtotal</span>
<span>{{ $grandTotal }}</span>
</div>

<div class="d-flex justify-content-between mb-2">
<span>Delivery</span>
<span>Free</span>
</div>

<hr>

<div class="d-flex justify-content-between mb-3">
<strong>Total</strong>
<strong>{{ $grandTotal }}</strong>
</div>
<form action="{{route('post.purchase')}}" method = "post">@csrf
<button class="checkout-btn">
Purchase
</button>
</form>
</div>

</div>
</section>

@endsection