@extends('Site.layout.tamplate')

@section('content')

<section class="py-5">
<div class="container">

<h3 class="mb-4">My Orders</h3>

<div class="table-responsive">

<table class="table align-middle table-bordered">

<thead class="table-light">
<tr>
<th>User</th>
<th>Product</th>
<th>Quantity</th>
</tr>
</thead>

<tbody>

@foreach($orders as $order)

<tr>

<td>
<div class="d-flex align-items-center">

<img src="{{ asset('product/'.$order->product->image) }}" 
width="60" class="me-3">

<span>{{ $order->user->name }}</span>

</div>
</td>

<td>
${{ $order->product->title }}
</td>

<td>
{{ $order->quantity }}
</td>



</tr>

@endforeach

</tbody>

</table>

</div>

</div>
</section>

@endsection