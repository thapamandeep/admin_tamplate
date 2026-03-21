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

    <a href="{{ route('get.hero.section') }}" class="add-btn">
        + Add Hero
    </a>

</div>

              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
             
                
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($heroes as $hero)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if($hero->image)
                            <img src="{{ asset('storage/gallery/'.$hero->image) }}" style="height:50px; width:50px">
                        @else
                            <img src="https://via.placeholder.com/60">
                        @endif
                    </td>

                    <td>{{ $hero->name }}</td>

  <td>
    <p class="text-secondary mb-0"
       style="max-width:250px; word-wrap:break-word;">
        {{ \Illuminate\Support\Str::words($hero->description, 20, '...') }}
    </p>
</td>



                    <td>
                        {{ $hero->created_at->format('d M Y') }}
                    </td>


                
   <td style="white-space:nowrap;">
   
                                    <a href="{{route('get.hero.edit',$hero->id)}}"
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
