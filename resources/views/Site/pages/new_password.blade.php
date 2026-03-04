<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #36b9cc, #1cc88a);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .reset-box{
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .reset-box h3{
            font-weight: 600;
            margin-bottom: 10px;
        }

        .btn-primary{
            width: 100%;
        }
    </style>
</head>
<body>

<div class="reset-box">

    <h3 class="text-center">Reset Password</h3>
    <p class="text-center text-muted">
        Enter OTP and your new password
    </p>

    {{-- Success Message --}}
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('post.reset.password') }}">
        @csrf

        <!-- OTP -->
        <div class="mb-3">
            <label>Enter OTP</label>
            <input 
                type="text" 
                name="otp" 
                class="form-control"
                placeholder="Enter 6 digit code"
              
            >
        </div>
<!-- email -->
          <div class="mb-3">
            <label>Email:</label>
            <input 
                type="email" 
                name="email" 
                class="form-control"
                placeholder="Enter your email"
          
            >
        </div>

        <!-- New Password -->
        <div class="mb-3">
            <label>New Password</label>
            <input 
                type="password" 
                name="new_password" 
                class="form-control"
                placeholder="Enter new password"
          
            >
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label>Confirm Password</label>
            <input 
                type="password" 
                name="confirm_password" 
                class="form-control"
                placeholder="Confirm password"
            
            >
        </div>

        <!-- Submit -->
        <button type="submit" class="btn btn-primary">
            Reset Password
        </button>

    </form>

</div>

</body>
</html>
