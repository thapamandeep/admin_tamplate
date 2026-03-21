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

    <h3 class="card-title">Review Data</h3>



</div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
             
                
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>User Name</th>
                    <th>Review</th>
                    <th>Rate/th>
                    <th>Category</th>
                    <th>Created</th>
                   
                </tr>
            </thead>

            <tbody>
                @foreach($reviews as $review)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($review->product->image)
                            <img src="{{ asset('storage/gallery/'.$review->product->image) }}" style="height:50px; width:50px">
                        @else
                            <img src="https://via.placeholder.com/60">
                        @endif
                    </td>

                    <td>{{ $review->product->title }}</td>
                    <td>{{ $review->user->name }}</td>

  <td>
    <p class="text-secondary mb-0"
       style="max-width:250px; word-wrap:break-word;">
        {{ \Illuminate\Support\Str::words($review->message, 20, '...') }}
    </p>
</td>

                    <td>
                        <span class="badge qty-badge">
                            {{ $review->rate }}
                        </span>
                    </td>

                    
                 

                 

                

                    <td>{{ $review->product->category_id }}</td>

                    <td>
                        {{ $review->product->created_at->format('d M Y') }}
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
