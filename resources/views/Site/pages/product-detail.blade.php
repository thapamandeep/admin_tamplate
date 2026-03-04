@extends('site.layout.tamplate')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/gallery/'.$product->image) }}" class="img-fluid">
        </div>

        <div class="col-md-6">
            <h2>{{ $product->title }}</h2>
            <h4 class="text-success">${{ $product->cost }}</h4>

            <p><strong>Quantity:</strong> {{ $product->quantity }}</p>

            <p>
              {{$product->description}}
            </p>

            <button class="btn btn-primary">Add to Cart</button>
        </div>
    </div>
</div>
@endsection