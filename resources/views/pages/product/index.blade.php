@extends('layout.app')
@section('content')

<link rel="stylesheet" href="{{asset('assets/css/productIndex-style.css')}}">

<div class="content-wrapper">

  <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-header custom-header">

    <h3 class="card-title">📦 Products Data</h3>

    <a href="{{ route('create.product') }}" class="add-btn">
        + Add Product
    </a>

</div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
             
                
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
                            <img src="{{ asset('storage/gallery/'.$product->image) }}" style="height:50px; width:50px">
                        @else
                            <img src="https://via.placeholder.com/60">
                        @endif
                    </td>

                    <td>{{ $product->title }}</td>

                    <td>{{ $product->description }}</td>

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
                                    <a href="{{route('detail.product',$product->id)}}"
                                       class="btn btn-sm btn-view">
                                        <i class="fas fa-eye"></i> View
                                    </a>

                                    <a href="{{ route('edit.product', $product->id) }}"
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <a href="{{ route('delete.product',$product->id) }}"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
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
      </div>
      </div>
      <!-- /.container-fluid -->
    </section>
@endsection
