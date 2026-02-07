@extends('layout.app')
@section('content')

<style>
/* PAGE BG */
body{
    background: linear-gradient(135deg,#eef2f7,#e0e7ff);
    font-family: 'Poppins', sans-serif;
}

.content-wrapper{
    padding:40px 20px;
}

/* CARD CONTAINER */
.table-container{
    max-width:1200px;
    margin:auto;
    background:rgba(255,255,255,0.9);
    backdrop-filter: blur(12px);
    border-radius:18px;
    padding:30px;
    box-shadow:0 10px 35px rgba(0,0,0,0.08);
    overflow-x:auto;
    border:1px solid rgba(255,255,255,0.3);
}

/* HEADER */
.header-flex{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.table-title{
    font-size:22px;
    font-weight:600;
    color:#111827;
}

/* ADD BUTTON */
.add-btn{
    padding:10px 20px;
    background:linear-gradient(135deg,#6366f1,#4f46e5);
    color:#fff;
    border:none;
    border-radius:12px;
    font-size:14px;
    font-weight:500;
    text-decoration:none;
    display:inline-flex;
    align-items:center;
    gap:6px;
    box-shadow:0 6px 18px rgba(79,70,229,0.25);
    transition:0.3s;
}

.add-btn:hover{
    transform:translateY(-2px);
    box-shadow:0 10px 22px rgba(79,70,229,0.35);
}

/* TABLE */
table{
    width:100%;
    border-collapse:separate;
    border-spacing:0;
    min-width:800px;
}

/* HEADER */
th{
    background:linear-gradient(135deg,#4f46e5,#6366f1);
    color:#fff;
    font-weight:500;
    padding:14px;
    font-size:14px;
}

/* BODY */
td{
    padding:14px;
    border-bottom:1px solid #eef2f7;
    font-size:14px;
    color:#374151;
}

/* ROW HOVER */
tr{
    transition:0.2s;
}

tbody tr:hover{
    background:#f9faff;
}

/* IMAGE */
td img{
    width:55px;
    height:55px;
    object-fit:cover;
    border-radius:12px;
    border:2px solid #e5e7eb;
}

/* BADGES */
.badge{
    padding:5px 10px;
    border-radius:20px;
    font-size:12px;
    font-weight:500;
}

.qty-badge{
    background:#ecfdf5;
    color:#059669;
}

.cost-badge{
    background:#eff6ff;
    color:#2563eb;
}

/* ACTION BUTTONS */
.action-btn{
    padding:6px 14px;
    border-radius:8px;
    text-decoration:none;
    font-size:12px;
    font-weight:500;
    color:#fff;
    transition:0.3s;
}

.edit-btn{
    background:linear-gradient(135deg,#10b981,#059669);
}

.delete-btn{
    background:linear-gradient(135deg,#ef4444,#dc2626);
}

.action-btn:hover{
    transform:translateY(-1px);
    box-shadow:0 4px 12px rgba(0,0,0,0.15);
}

/* RESPONSIVE */
@media(max-width:768px){

    .header-flex{
        flex-direction:column;
        align-items:flex-start;
        gap:12px;
    }

    table{
        font-size:12px;
    }

    td img{
        width:40px;
        height:40px;
    }
}
</style>

<div class="content-wrapper">
    <div class="table-container">

        <!-- HEADER -->
        <div class="header-flex">
            <h2 class="table-title">📦 Product List</h2>
            <a href="{{ route('create.product') }}" class="add-btn">
                + Add Product
            </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/gallery/'.$product->image) }}">
                        @else
                            <img src="https://via.placeholder.com/60">
                        @endif
                    </td>

                    <td>{{ $product->title }}</td>

                    <td>{{ Str::limit($product->description,40) }}</td>

                    <td>
                        <span class="badge qty-badge">
                            {{ $product->quantity }}
                        </span>
                    </td>

                    <td>
                        <span class="badge cost-badge">
                            Rs {{ $product->cost }}
                        </span>
                    </td>

                    <td>{{ $product->category_id }}</td>

                    <td>
                        {{ $product->created_at->format('d M Y') }}
                    </td>

                    <td>
                        <a href="{{route('edit.product',$product->id)}}" class="action-btn edit-btn">Edit</a>
                        <a href="{{route('delete.product',$product->id)}}" class="action-btn delete-btn"
                           onclick="return confirm('Are you sure?')">
                           Delete
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endsection
