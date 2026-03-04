<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: linear-gradient(135deg, #4e73df, #224abe);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, Helvetica, sans-serif;
        }

        .forgot-box{
            background: #fff;
            padding: 40px;
            border-radius: 12px;
            width: 100%;
            max-width: 420px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .forgot-box h3{
            font-weight: 600;
            margin-bottom: 10px;
        }

        .btn-primary{
            width: 100%;
        }

        .back-login{
            text-align: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="forgot-box">

    <h3 class="text-center">Forgot Password</h3>
    <p class="text-center text-muted">
        Enter your email to receive password reset link
    </p>

    {{-- Success Message --}}
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{route('forgot.password')}}">
        @csrf

        <!-- Email Input -->
        <div class="mb-3">
            <label>Email Address</label>
            <input 
                type="email" 
                name="email" 
                class="form-control" 
                placeholder="Enter your email"
              
            >
        </div>

        <!-- Submit Button -->
       <button type="submit" class="btn btn-primary">
            Submit
        </button>
    </form>

    <!-- Back to Login -->
    <div class="back-login">
        <a href="">← Back to Login</a>
    </div>

</div>

</body>
</html>
