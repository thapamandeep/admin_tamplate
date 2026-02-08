@extends('layout.app')
@section('content')

<div class="content-wrapper">

<style>
body{
    background: linear-gradient(135deg,#eef2f7,#f9fbfd);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.product-container{
    max-width: 900px;
    margin: 50px auto;
    background: rgba(255,255,255,0.9);
    backdrop-filter: blur(12px);
    padding: 35px;
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    border:1px solid rgba(255,255,255,0.3);
}

.product-container h2{
    text-align: center;
    margin-bottom: 25px;
    font-weight: 600;
    color: #111827;
}

.form-grid{
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
}

.form-group{
    display: flex;
    flex-direction: column;
}

.form-group.full{
    grid-column: span 2;
}

label{
    font-weight: 500;
    margin-bottom: 6px;
    color: #374151;
}

input, textarea, select{
    padding: 12px;
    border-radius: 10px;
    border: 1px solid #d1d5db;
    outline: none;
    transition: 0.3s;
    font-size: 14px;
}

input:focus, textarea:focus, select:focus{
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79,70,229,0.1);
}

textarea{
    resize: none;
    height: 120px;
}

.submit-btn{
    margin-top: 25px;
    width: 100%;
    padding: 14px;
    border: none;
    border-radius: 12px;
    background: linear-gradient(135deg,#4f46e5,#6366f1);
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: 0.3s;
}

.submit-btn:hover{
    background: linear-gradient(135deg,#4338ca,#4f46e5);
    transform: translateY(-1px);
}

.invalid-feedback{
    color:red;
    font-size:12px;
}

@media(max-width:768px){
    .form-grid{
        grid-template-columns: 1fr;
    }
    .form-group.full{
        grid-column: span 1;
    }
}

img.current-image{
    border-radius: 12px;
    max-width: 120px;
    margin-top: 8px;
}
.success-msg{
    background: linear-gradient(135deg,#d1fae5,#ecfdf5);
    color: #065f46;
    padding: 14px 18px;
    border-radius: 10px;
    margin-bottom: 18px;
    border: 1px solid #a7f3d0;
    font-weight: 500;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    animation: fadeIn 0.4s ease-in-out;
}

/* Optional animation */
@keyframes fadeIn{
    from{
        opacity:0;
        transform: translateY(-6px);
    }
    to{
        opacity:1;
        transform: translateY(0);
    }
}

</style>

<div class="product-container">

    <h2>✏️ Edit Product</h2>

        {{-- Success Message --}}
    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif
      


    <form action="{{ route('update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

    

        <div class="form-grid">

            <!-- Title -->
            <div class="form-group">
                <label>Product Title</label>
                <input type="text" name="title" placeholder="Enter product title" 
                    value="{{ old('title', $product->title) }}">
                @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Category -->
            <div class="form-group">
                <label>Category</label>
                <select name="category_id">
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
                @error('category_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Image -->
            <div class="form-group">
                <label>Product Image</label>
                @if($product->image)
                    <img src="{{ asset('storage/gallery/'.$product->image) }}" class="current-image">
                    @else
                   <p>No image uploaded yet.</p>
                @endif
                <input type="hidden" name="old_image" value="{{$product->image }}">
                <input type="file" name="image" accept="image/*">
                @error('image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Quantity -->
            <div class="form-group">
                <label>Quantity</label>
                <input type="number" name="quantity" placeholder="Enter quantity" 
                    value="{{ old('quantity', $product->quantity) }}">
                @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Cost -->
            <div class="form-group">
                <label>Cost</label>
                <input type="number" step="0.01" name="cost" placeholder="Enter cost" 
                    value="{{ old('cost', $product->cost) }}">
                @error('cost')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group full">
                <label>Description</label>
                <textarea name="description" placeholder="Write product description...">{{ old('description', $product->description) }}</textarea>
                @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        </div>

        <button type="submit" class="submit-btn">
            💾 Update Product
        </button>

    </form>

</div>
</div>

@endsection
