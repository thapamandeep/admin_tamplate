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
          

   <h4 style="background-color:#198754; color:#fff; font-weight:bold; padding:10px; border-radius:5px;">

</h4>
   

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
            
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>User Name</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Cost</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th>Action</th>
                
                </tr>
            </thead>
    
            <tbody>
       @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if($order->product->image)
                            <img src="{{ asset('storage/gallery/'.$order->product->image) }}" style="height:50px; width:50px">
                        @else
                            <img src="https://via.placeholder.com/60">
                        @endif
                    </td>
                    <td>{{$order->user->name}}</td>
                    <td>{{ $order->product->title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>Rs {{ $order->product->cost * $order->quantity }}</td>
                    <td>{{ $order->product->category_id }}</td>
                    <td>{{ $order->product->created_at->format('d M Y') }}</td>
                    <td>{{$order->status}}</td>
                     <td style="white-space:nowrap;">
        <a href="{{route('order.shipping.user',$order->id)}}" 
           class="btn btn-warning btn-sm" 
           onclick="return confirm('Mark this order as Shipping?')">
           Shipping
        </a>

        <a href="{{route('order.delivered.user',$order->id)}}" 
           class="btn btn-success btn-sm" 
           onclick="return confirm('Mark this order as Delivered?')">
           Delivered
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
