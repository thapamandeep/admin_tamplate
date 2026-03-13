<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login | Food Mart</title>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

<style>

/* Reset & Font */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: 'Montserrat', sans-serif;
}

/* Body Background */
body{
    background: linear-gradient(135deg, #43e97b, #38f9d7); /* Fresh green gradient */
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

/* Login Container */
.login-container{
    background:#fff;
    padding:35px 30px;
    width:360px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.1);
    transition: 0.3s;
}

.login-container:hover{
    transform: translateY(-3px);
}

/* Heading */
.login-container h2{
    text-align:center;
    margin-bottom:25px;
    color:#28a745; /* Food Mart green */
    font-weight:600;
}

/* Input Groups */
.input-group{
    margin-bottom:18px;
}

.input-group label{
    display:block;
    margin-bottom:6px;
    font-weight:600;
    font-size:14px;
}

.input-group input{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:14px;
    transition:0.2s;
}

.input-group input:focus{
    border-color:#28a745;
    outline:none;
    box-shadow:0 0 4px rgba(40,167,69,0.3);
}

/* Submit Button */
button[type="submit"]{
    width:100%;
    padding:12px;
    background:#28a745;
    border:none;
    color:white;
    font-size:16px;
    border-radius:6px;
    cursor:pointer;
    transition:0.3s;
}

button[type="submit"]:hover{
    background:#218838;
}

/* Forgot Password */
.forgot-password{
    text-align:right;
    margin-top:-8px;
    margin-bottom:18px;
}

.forgot-password a{
    font-size:13px;
    color:#28a745;
    text-decoration:none;
    transition:0.3s;
}

.forgot-password a:hover{
    text-decoration:underline;
    color:#196f3d;
}

/* Register Link */
.register-link{
    text-align:center;
    margin-top:18px;
    font-size:14px;
}

.register-link a{
    color:#28a745;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
}

.register-link a:hover{
    text-decoration:underline;
    color:#196f3d;
}

/* Alerts */
.alert{
    padding:12px 15px;
    border-radius:6px;
    margin-bottom:18px;
    position:relative;
    font-size:14px;
}

.alert-success{
    background:#d1f7dc;
    color:#155724;
    border:1px solid #c3e6cb;
}

.alert-danger{
    background:#ffd1d1;
    color:#721c24;
    border:1px solid #f5c6cb;
}

.alert h4{
    margin-bottom:5px;
}

.alert .close{
    position:absolute;
    top:6px;
    right:10px;
    background:none;
    border:none;
    font-size:18px;
    cursor:pointer;
}

/* Error Messages */
.error{
    color:red;
    font-size:12px;
    margin-top:3px;
}

/* Mobile Responsiveness */
@media(max-width: 400px){
    .login-container{
        width:90%;
        padding:25px;
    }
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
<button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
</div>
@endif

@if (Session::has('error_message'))
<div class="alert alert-danger">
<h4>Error!</h4>
<p>{{ Session::get('error_message') }}</p>
<button type="button" class="close" onclick="this.parentElement.style.display='none';">&times;</button>
</div>
@endif

<form action="{{ route('post.login') }}" method="post">
@csrf

<div class="input-group">
<label>Email</label>
<input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email">
<div class="error">
@error('email')
<span>{{ $message }}</span>
@enderror
</div>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" placeholder="Enter your password">
<div class="error">
@error('password')
<span>{{ $message }}</span>
@enderror
</div>
</div>

<div class="forgot-password">
<a href="{{ route('forgot.password') }}">Forgot Password?</a>
</div>

<button type="submit">Login</button>

<p class="register-link">
Don't have an account?
<a href="{{ route('get.register') }}">Register</a>
</p>

</form>

</div>

</body>
</html>