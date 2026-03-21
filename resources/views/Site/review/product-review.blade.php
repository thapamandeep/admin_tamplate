@extends('site.layout.tamplate')

@section('content')

<div class="container py-5">

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>
    @endif

    <!-- Product Image -->
    <div class="mb-3">
        <img src="{{ asset('storage/gallery/'.$product->image) }}" 
             alt="{{ $product->title }}" 
             class="img-fluid rounded shadow-sm"
             style="max-width: 250px;">
    </div>

    <!-- Product Title -->
    <h2 class="mb-4">{{ $product->title }}</h2>

    <!-- =======================
        REVIEW FORM
    ======================== -->
    <div class="card mb-5 shadow-sm">
        <div class="card-header bg-dark text-white">
            Write a Review
        </div>

   

        <div class="card-body">
            <form action="{{route('post.review',$product->id)}}" method="POST">
                @csrf

                <!-- Rating -->
                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <select name="rate" class="form-control">
                        <option value="">Select Rating</option>
                        <option value="5">⭐⭐⭐⭐⭐ (5)</option>
                        <option value="4">⭐⭐⭐⭐ (4)</option>
                        <option value="3">⭐⭐⭐ (3)</option>
                        <option value="2">⭐⭐ (2)</option>
                        <option value="1">⭐ (1)</option>
                    </select>
                </div>

                <!-- Comment -->
                <div class="mb-3">
                    <label class="form-label">Comment</label>
                    <textarea name="message" rows="4" class="form-control" placeholder="Write your review..."></textarea>
                </div>

                <button class="btn btn-primary">Submit Review</button>
            </form>
        </div>
    </div>

    <!-- =======================
        REVIEW LIST TITLE
    ======================== -->
    <h4 class="mb-3">Customer Reviews</h4>

    <p>No reviews yet. Be the first to review!</p>

</div>

@endsection