@extends('layout.app')

@section('content')
<div class="content-wrapper">

    <!-- Page Header (optional) -->
    <section class="content-header">
        <div class="container-fluid">
            <h1>My Profile</h1>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <!-- LEFT: PROFILE CARD -->
                <div class="col-md-4">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

        <!-- Top Cover -->
        <div style="height:120px; background:linear-gradient(135deg,#4e73df,#1cc88a);">
        </div>

        <div class="card-body text-center" style="margin-top:-70px;">

            <!-- Profile Image -->
            @if(Auth::user()->image)
                <img class="img-fluid img-circle shadow"
                     style="width:130px; height:130px; object-fit:cover; border:5px solid white;"
                     src="{{ asset('storage/photos/' . Auth::user()->image) }}">
            @else
                <img class="img-fluid img-circle shadow"
                     style="width:130px; height:130px; object-fit:cover; border:5px solid white;"
                     src="{{ asset('assets/img/user2-160x160.jpg') }}">
            @endif

            <!-- User Name -->
            <h4 class="mt-3 font-weight-bold">
                {{ Auth::user()->name }}
            </h4>

            <!-- Role Badge -->
            <span class="badge badge-pill badge-primary px-3 py-2">
                {{ Auth::user()->role?->name ?? 'User' }}
            </span>

            <!-- Extra Info -->
            <div class="mt-4 text-left">

                <p class="mb-2">
                    <i class="fas fa-envelope text-primary mr-2"></i>
                    {{ Auth::user()->email }}
                </p>

                <p class="mb-2">
                    <i class="fas fa-id-badge text-success mr-2"></i>
                    Role ID: {{ Auth::user()->role?->id }}
                </p>

            </div>

        </div>
    </div>
</div>

                <!-- RIGHT: EDIT PROFILE -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Profile</h3>
                </div>

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- Full Name --}}
                        <div class="form-group">
                            <!-- <label>Full Name</label>
                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   value="{{ old('name', Auth::user()->name) }}">
                        </div>

                        {{-- Email (readonly) --}}
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email"
                                   class="form-control"
                                   value="{{ Auth::user()->email }}"
                                   readonly>
                        </div>

                        {{-- Phone --}}
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   value="{{ old('phone', Auth::user()->phone) }}">
                        </div>

                        {{-- Address --}}
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text"
                                   name="address"
                                   class="form-control"
                                   value="{{ old('address', Auth::user()->address) }}">
                        </div>

                        {{-- Bio --}}
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea name="bio"
                                      class="form-control"
                                      rows="4">{{ old('bio', Auth::user()->bio) }}</textarea>
                        </div>

                        {{-- Profile Image --}}
                        <div class="form-group">
                            <label>Profile Image</label>
                            <input type="file"
                                   name="image"
                                   class="form-control-file">
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                Update Profile
                            </button>
                        </div> -->
    </section>

</div>
@endsection
