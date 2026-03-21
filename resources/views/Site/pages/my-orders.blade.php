@extends('Site.layout.tamplate')

@section('content')

<section class="py-5">
<div class="container">

<h3 class="mb-4">My Orders</h3>

<div class="table-responsive">

<table class="table align-middle table-bordered">

<thead class="table-light">
<tr>
<th>Product Name</th>
<th>Quantity</th>
<th>Price</th>
<th>Status</th>
<th>Action</th>

</tr>
</thead>

<tbody>

{{--@php
use App\Models\Product;

if(Auth::check()){
    $product = Product::find($order->product_id);
    
}else{
    $total_cost = "";
}
@endphp--}}

@foreach($orders as $order)

<tr>

<td>
<div class="d-flex align-items-center">

<img src="{{ asset('storage/gallery/'.$order->product->image) }}" 
width="60" class="me-3">

<span>{{ $order->product->title }}</span>

</div>
</td>

<td>
{{ $order->quantity }}
</td>

<td>{{$order->quantity * $order->product->cost}}</td>

<td>{{$order->status}}</td>

<td>
    
@if(Auth::check())
@if($order->status =='delivered')

<a href="{{route('get.product.review',$order->product->id)}}" class="btn btn-sm btn-success">Review</a>


  
@else

<a href="{{route('get.myorder.delete',$order->id)}}" class="btn btn-sm btn-danger">
Remove
</a>
@endif
@endif

</td>

</tr>

@endforeach

</tbody>

</table>

</div>

</div>
</section>

@endsection