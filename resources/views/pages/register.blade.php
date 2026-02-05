<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Registration Page (v2)</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">

  
    @if (Session::has('success'))
        <div class="alert alert-success">
            <h4>Success!</h4>
            <p>{{ Session::get('success') }}</p>
            <button type="button" class="close" onclick="this.parentElement.style.display='none';">
                &times;
            </button>
        </div>
    @endif

  
    <div class="card-header text-center">
      <b>User</b>Register
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="{{route('store-user')}}" method="post" enctype="multipart/form-data">@csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Full name" name="fullname">

          @error('fullname')
  <span class="invalid-feedback d-block">{{ $message }}</span>
@enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">

                 @error('email')
  <span class="invalid-feedback d-block">{{ $message }}</span>
@enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">

                 @error('password')
  <span class="invalid-feedback d-block">{{ $message }}</span>
@enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Retype password" name="password_confirmation">

                 @error('password_confirmation')
  <span class="invalid-feedback d-block">{{ $message }}</span>
@enderror

          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
          
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>

             <div class="input-group">
    <label>choose here</label>
    <select name="role_id" id="role">
        <option value="">-- Select Role --</option>
        @foreach($roles as $role)
        <option value="{{$role->id}}">{{$role->name}}</option>
      @endforeach
    </select>
    @error('role')
        <span>{{ $message }}</span>
    @enderror
</div>

<div class="input-group mb-3">
  <input type="file" class="form-control" name="image" accept="image/*">

  <div class="input-group-append">
    <div class="input-group-text">
      <span class="fas fa-image"></span>
    </div>
  </div>
</div>

@error('image')
  <span class="invalid-feedback d-block">{{ $message }}</span>
@enderror



        
      </form>

    
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- jQuery -->
<script src="{{ asset('dist/js/jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset('dist/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- AdminLTE -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>


</body>
<!-- /.register-box -->


</html>
