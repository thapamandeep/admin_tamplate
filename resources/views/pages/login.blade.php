<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #667eea, #764ba2);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background: #fff;
            padding: 30px;
            width: 350px;
            border-radius: 8px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #667eea;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background: #5a67d8;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
        }

        .register-link a {
            color: #667eea;
            text-decoration: none;
        }

        /* ================= ALERT STYLES ================= */

        .alert {
            padding: 12px 15px;
            border-radius: 5px;
            margin-bottom: 15px;
            position: relative;
            font-size: 14px;
        }

        .alert h4 {
            margin-bottom: 5px;
            font-size: 16px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        .alert .close {
            position: absolute;
            top: 8px;
            right: 10px;
            background: none;
            border: none;
            font-size: 20px;
            cursor: pointer;
            color: inherit;
        }
        .input-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

    </style>
</head>

<body>

<div class="login-container">
    <h2>Login</h2>

    @if (Session::has('success'))
        <div class="alert alert-success">
            <h4>Success!</h4>
            <p>{{ Session::get('success') }}</p>
            <button type="button" class="close" onclick="this.parentElement.style.display='none';">
                &times;
            </button>
        </div>
    @endif

    @if (Session::has('error_message'))
        <div class="alert alert-danger">
            <h4>Error!</h4>
            <p>{{ Session::get('error_message') }}</p>
            <button type="button" class="close" onclick="this.parentElement.style.display='none';">
                &times;
            </button>
        </div>
    @endif

    <form action="{{ route('post.login') }}" method="post">
        @csrf

        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="Enter your email">
            @error('email')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" placeholder="Enter your password">
            @error('password')
            <span>{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Login</button>

        <p class="register-link">
            Don't have an account? <a href="#">Register</a>
        </p>

        <div class="input-group">
    
</div>

    </form>
</div>

</body>
</html>