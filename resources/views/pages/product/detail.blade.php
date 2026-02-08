@extends('layout.app')

@section('content')


<link rel="stylesheet" href="{{asset('assets/css/detail-style.css')}}">
<div class="content-wrapper">

    <div class="container mt-4">

        <!-- Header -->
        <div class="detail-header">
            <h2>📦 Product Details</h2>

            <a href="{{ route('get.productTable') }}" class="back-btn">
                ← Back
            </a>
        </div>

        <!-- Product Card -->
        <div class="product-card">

            <div class="row">

                <!-- Product Image -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('storage/gallery/'.$product->image) }}"
                         class="product-img">
                </div>

                <!-- Product Info -->
                <div class="col-md-8">

                    <div class="detail-row">
                        <label>Product Name :</label>
                        <span>{{ $product->title }}</span>
                    </div>

                    <div class="detail-row">
                        <label>Category :</label>
                        <span>{{ $product->category->name ?? 'N/A' }}</span>
                    </div>

                    <div class="detail-row">
                        <label>Price :</label>
                        <span> Rs {{ $product->cost }}</span>
                    </div>

                    <div class="detail-row">
                        <label>Quantity :</label>
                        <span>{{ $product->quantity }}</span>
                    </div>

                    <div class="detail-row">
                        <label>Description :</label>
                        <span>{{ $product->description }}</span>
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
