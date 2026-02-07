@extends('layout.app')
@section('content')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  

<style>
    body{
        background: linear-gradient(135deg,#eef2f7,#f9fbfd);
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .product-container{
        max-width: 900px;
        margin: 50px auto;
        background: #fff;
        padding: 35px;
        border-radius: 16px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .product-container h2{
        text-align: center;
        margin-bottom: 25px;
        font-weight: 600;
        color: #333;
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
        color: #555;
    }

    input, textarea, select{
        padding: 12px;
        border-radius: 10px;
        border: 1px solid #dcdcdc;
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

    @media(max-width:768px){
        .form-grid{
            grid-template-columns: 1fr;
        }
        .form-group.full{
            grid-column: span 1;
        }
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

    <h2>➕ Add New Product</h2>

    
        {{-- Success Message --}}
    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif
       
    <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
        @csrf

      

        <div class="form-grid">

            <!-- Title -->
            <div class="form-group">
                <label>Product Title</label>
                <input type="text" name="title" placeholder="Enter product title">

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

                    {{-- Example loop --}}
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">
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
                <input type="number" name="quantity" placeholder="Enter quantity">

                    @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Cost -->
            <div class="form-group">
                <label>Cost</label>
                <input type="number" step="0.01" name="cost" placeholder="Enter cost">

                    @error('cost')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <!-- Description -->
            <div class="form-group full">
                <label>Description</label>
                <textarea name="description" placeholder="Write product description..."></textarea>
            </div>

        </div>

        <button type="submit" class="submit-btn">
            💾 Save Product
        </button>

    </form>

</div>



</div>
    @endsection