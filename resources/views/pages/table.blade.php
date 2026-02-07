@extends('layout.app') 

@section('content')
<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
         

              <div class="card-header d-flex justify-content-between align-items-center">
     
        <a href="{{route('get.register')}}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add User
        </a>
    </div>

        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Registered Users</h3>
            </div>      

            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Created At</th>
                            <th>Role id</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($allusers as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->role_id }}</td>
                            <td>
                                <a href="{{route('edit.user',$user->id)}}" class="btn btn-sm btn-primary">Edit</a>
                                <a href="{{route('delete.user',$user->id)}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No users found</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>
    </section>

</div>
@endsection