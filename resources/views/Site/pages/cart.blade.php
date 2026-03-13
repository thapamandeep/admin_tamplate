@extends('Site.layout.tamplate')

@section('content')

<section class="py-5">
<div class="container">

<h3 class="mb-4">Shopping Cart</h3>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
@endif

<form action="{{route('post.add.cart',$product->id)}}" method="post" enctype="multipart/form-data">@csrf
<div class="table-responsive">

<table class="table align-middle">
<thead class="table-light">
<tr>
<th>Product</th>
<th>Price</th>
<th>Quantity</th>
<th>Total</th>
<th>Remove</th>
</tr>
</thead>

<tbody>



<tr>

<td class="d-flex align-items-center">

<img src="{{asset('storage/gallery/'.$product->image)}}" width="70" class="me-3">

<div>
<h6 class="mb-0"></h6>
<small>{{$product->title}}</small>
</div>

</td>

<td>
{{$product->cost}}
</td>

<td>

<div class="input-group" style="width:130px">

<button class="btn btn-danger">-</button>

<input type="number" value="1" name="quantity" class="form-control text-center">

<button class="btn btn-success">+</button>

</div>

</td>

<td>
{{ $product->cost * 1}}
</td>

<td>

<a href="#" class="btn btn-sm btn-danger">
Remove
</a>

</td>

</tr>



</tbody>

</table>

</div>

<div class="row justify-content-end">

<div class="col-md-4">

<div class="card p-4">

<h5 class="mb-3">Cart Summary</h5>

<div class="d-flex justify-content-between mb-2">
<span>Subtotal</span>
<span>{{$product->cost * 1}}</span>
</div>

<div class="d-flex justify-content-between mb-3">
<span>Delivery</span>
<span>Free</span>
</div>

<hr>

<div class="d-flex justify-content-between fw-bold mb-3">
<span>Total</span>
<span>{{$product->cost * 1}}</span>
</div>

<button type="submit" class="btn btn-success w-100">
add cart
</button>

</div>

</div>

</div>
</form>
</div>
</section>

@endsection