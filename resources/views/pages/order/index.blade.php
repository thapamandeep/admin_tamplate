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

    <h3 class="card-title">📦 Orders slift Data</h3>



</div>
          
@foreach($userOrder as $userId => $userOrders)
    @php $userName = $userOrders->first()->user?->name ?? 'Unknown User'; @endphp
    <h4 style="background-color:#f1f8ff; color:#0d6efd; font-weight:bold; padding:10px; border-radius:5px;">
        User: {{ $userName }}
    </h4>

    @foreach($userOrders as $order)
        <!-- each order row -->
    @endforeach

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
            
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>
                
            <tbody>
   

                @foreach($userOrders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($order->product->image)
                            <img src="{{ asset('storage/gallery/'.$order->product->image) }}" style="height:50px; width:50px">
                        @else
                            <img src="https://via.placeholder.com/60">
                        @endif
                    </td>

                    <td>{{ $order->product->title }}</td>

                    <td>
                        <span class="badge qty-badge">
                            {{ $order->quantity }}
                        </span>
                    </td>

                    <td>
                        <span class="badge cost-badge">
                            Rs {{$order->product->cost }}
                        </span>
                    </td>

                    <td>{{$order->product->category_id }}</td>

                    <td>
                        {{$order->product->created_at->format('d M Y') }}
                    </td>


                 
   <td style="white-space:nowrap;">
    <a href="#"
       class="btn btn-sm btn-view">
        <i class="fas fa-eye"></i> View
    </a>

                                    <a href="#"
                                       class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <a href="#"
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

             @endforeach
         
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
