@extends('layout.app')

@section('content')

<link rel="stylesheet" href="{{asset('assets/css/detail-style.css')}}">

<div class="content-wrapper">
<section class="content">

<div class="card card-solid">
<div class="card-body">

<div class="row">

{{-- Product Image --}}
<div class="col-md-5 text-center">

@if($product->image)
<img src="{{ asset('storage/gallery/'.$product->image) }}"
class="img-fluid product-image"
style="max-height:400px;">
@else
<img src="https://via.placeholder.com/400"
class="img-fluid">
@endif

</div>


{{-- Product Information --}}
<div class="col-md-7">

<h2 class="mb-3">{{$product->title}}</h2>

<p class="text-muted">
{{$product->description}}
</p>


{{-- Price Section --}}
<div class="price-box p-3 mt-4 bg-light rounded">

<h3 class="text-success mb-0">
Rs {{$product->cost}}
</h3>

<small class="text-muted">
Inclusive of all taxes
</small>

</div>


{{-- Buttons --}}
<div class="mt-4">

<a href="#" class="btn btn-primary btn-lg">
<i class="fas fa-cart-plus"></i> Add to Cart
</a>

<a href="#" class="btn btn-outline-danger btn-lg">
<i class="fas fa-heart"></i> Wishlist
</a>

</div>


{{-- Share Icons --}}
<div class="mt-4">

<strong>Share :</strong>

<a href="#" class="text-primary ml-2">
<i class="fab fa-facebook fa-lg"></i>
</a>

<a href="#" class="text-info ml-2">
<i class="fab fa-twitter fa-lg"></i>
</a>

<a href="#" class="text-danger ml-2">
<i class="fas fa-envelope fa-lg"></i>
</a>

</div>

</div>

</div>


{{-- Product Tabs --}}
<div class="row mt-5">

<div class="col-12">

<ul class="nav nav-tabs" id="productTab">

<li class="nav-item">
<a class="nav-link active" data-toggle="tab" href="#description">
Description
</a>
</li>

<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#comments">
Comments
</a>
</li>

<li class="nav-item">
<a class="nav-link" data-toggle="tab" href="#rating">
Rating
</a>
</li>

</ul>


<div class="tab-content p-3 border">

<div class="tab-pane fade show active" id="description">
{{$product->description}}
</div>

<div class="tab-pane fade" id="comments">
No comments yet.
</div>

<div class="tab-pane fade" id="rating">
No ratings available.
</div>

</div>

</div>

</div>


</div>
</div>

</section>
</div>

@endsection