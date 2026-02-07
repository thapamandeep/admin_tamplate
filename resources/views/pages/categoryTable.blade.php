@extends('layout.app')
@section('content')

<style>
body{
    background: #f4f7fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.content-wrapper{
    padding: 50px;
}

.table-container{
    max-width: 800px;
    margin: 0 auto;
    background: #fff;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    overflow-x: auto;
}

/* HEADER FLEX */
.header-flex{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.table-container h2{
    font-weight: 600;
    color: #333;
    margin:0;
}

/* ADD CATEGORY BUTTON */
.add-btn{
    padding:10px 18px;
    background:linear-gradient(135deg,#10b981,#34d399);
    color:#fff;
    border:none;
    border-radius:10px;
    font-size:14px;
    font-weight:500;
    text-decoration:none;
    transition:0.3s;
    box-shadow:0 5px 15px rgba(0,0,0,0.1);
}

.add-btn:hover{
    background:linear-gradient(135deg,#059669,#10b981);
    transform:translateY(-1px);
    color:#fff;
}

/* TABLE STYLING */
table{
    width: 100%;
    border-collapse: collapse;
    min-width: 600px;
}

th, td{
    text-align: left;
    padding: 12px 15px;
    border-bottom: 1px solid #e0e0e0;
}

th{
    background: #4f46e5;
    color: #fff;
    font-weight: 600;
}

tr:hover{
    background: #f0f4ff;
    transition: 0.2s;
}

/* ACTION BUTTONS */
.action-btn{
    padding:6px 12px;
    border-radius:8px;
    text-decoration:none;
    color:#fff;
    font-size:13px;
    margin-right:5px;
    transition:0.3s;
}

.edit-btn{
    background: #10b981;
}

.edit-btn:hover{
    background: #059669;
}

.delete-btn{
    background: #ef4444;
}

.delete-btn:hover{
    background: #b91c1c;
}

@media(max-width:768px){
    table, th, td{
        font-size: 12px;
    }
    .header-flex{
        flex-direction:column;
        gap:10px;
        align-items:flex-start;
    }
}
</style>

<div class="content-wrapper">
    <div class="table-container">

        <!-- HEADER -->
        <div class="header-flex">
            <h2>📂 Category List</h2>
            <a href="{{ route('create.category') }}" class="add-btn">+ Add Category</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at->format('d-M-Y') }}</td>
                    <td>
                        <a href="{{route('edit.category',$category->id)}}" class="action-btn edit-btn">Edit</a>
                        <a href="{{route('delete.category',$category->id)}}" class="action-btn delete-btn" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@endsection
