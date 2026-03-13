@extends('layout.app')

@section('content')

<div class="content-wrapper">

<style>
body{
    background: linear-gradient(135deg,#eef2f7,#f9fbfd);
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.category-container{
    max-width: 500px;
    margin: 80px auto;
    background: #fff;
    padding: 40px 35px;
    border-radius: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.1);
    transition: transform 0.3s, box-shadow 0.3s;
}

.category-container:hover{
    transform: translateY(-3px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}

.category-container h2{
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
    color: #4f46e5;
    font-size: 26px;
}

.form-group{
    display: flex;
    flex-direction: column;
    margin-bottom: 25px;
}

label{
    font-weight: 600;
    margin-bottom: 8px;
    color: #4b5563;
    font-size: 14px;
}

input{
    padding: 14px 12px;
    border-radius: 12px;
    border: 1px solid #d1d5db;
    outline: none;
    font-size: 15px;
    transition: all 0.3s ease;
}

input:focus{
    border-color: #6366f1;
    box-shadow: 0 0 0 3px rgba(99,102,241,0.15);
}

.submit-btn{
    width: 100%;
    padding: 16px;
    border: none;
    border-radius: 14px;
    background: linear-gradient(135deg,#4f46e5,#6366f1);
    color: #fff;
    font-size: 16px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 5px 15px rgba(79,70,229,0.3);
}

.submit-btn:hover{
    background: linear-gradient(135deg,#4338ca,#4f46e5);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(79,70,229,0.4);
}

.success-msg{
    background:#e6fffa;
    color:#065f46;
    padding:12px;
    border-radius:10px;
    margin-bottom:20px;
    text-align:center;
    font-size:15px;
    font-weight:500;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

/* Responsive */
@media(max-width:480px){
    .category-container{
        padding: 30px 20px;
        margin: 50px auto;
    }
    .category-container h2{
        font-size: 22px;
    }
    input{
        font-size:14px;
        padding:12px 10px;
    }
    .submit-btn{
        font-size:15px;
        padding:14px;
    }
}
</style>

<div class="category-container">

    <h2>📂 Add Category</h2>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="success-msg">
            {{ session('success') }}
        </div>
    @endif

    {{-- Add enctype for file upload --}}
    <form action="{{ route('store.category') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Category Name</label>
            <input type="text" name="name" placeholder="Enter category name">
        </div>

        {{-- New File Input for Image --}}
        <div class="form-group">
            <label>Category Image</label>
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="submit-btn">
            💾 Save Category
        </button>

    </form>

</div>
</div>

@endsection