@extends('layout.app')
@section('content')

<link rel="stylesheet" href="{{asset('assets/css/categoryIndex-style.css')}}">


<div class="content-wrapper">
    <div class="table-container">

        <!-- HEADER -->
     <div class="header-grid">
    <h2 class="page-title">📂 Category List</h2>

    <a href="{{ route('create.category') }}" class="add-btn">
        + Add Category
    </a>
</div>


      <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
           
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
             
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
                    <a href="{{route('edit.category',$category->id)}}" class="btn edit-btn"> Edit</a>

                    <a href="{{route('delete.category',$category->id)}}" class="btn delete-btn" onclick="return confirm('Are you sure?')"> Delete</a>

                    </td>
                </tr>
                @endforeach
            </tbody>

            
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

         
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>

    </div>
</div>

@endsection
