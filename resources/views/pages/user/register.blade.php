<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register | Food Mart</title>

<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Montserrat',sans-serif;
}

body{
background: linear-gradient(135deg,#43e97b,#38f9d7);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

/* Register Box */

.register-container{
background:#fff;
padding:35px 30px;
width:380px;
border-radius:12px;
box-shadow:0 8px 20px rgba(0,0,0,0.1);
transition:0.3s;
}

.register-container:hover{
transform:translateY(-3px);
}

.register-container h2{
text-align:center;
margin-bottom:25px;
color:#28a745;
font-weight:600;
}

.input-group{
margin-bottom:16px;
}

.input-group label{
display:block;
margin-bottom:5px;
font-size:14px;
font-weight:600;
}

.input-group input,
.input-group select{
width:100%;
padding:10px;
border:1px solid #ccc;
border-radius:6px;
font-size:14px;
transition:0.2s;
}

.input-group input:focus,
.input-group select:focus{
border-color:#28a745;
outline:none;
box-shadow:0 0 4px rgba(40,167,69,0.3);
}

/* Button */

button{
width:100%;
padding:12px;
background:#28a745;
border:none;
color:#fff;
font-size:16px;
border-radius:6px;
cursor:pointer;
transition:0.3s;
}

button:hover{
background:#218838;
}

/* Alerts */

.alert{
padding:12px;
border-radius:6px;
margin-bottom:15px;
position:relative;
}

.alert-success{
background:#d1f7dc;
color:#155724;
border:1px solid #c3e6cb;
}

.alert .close{
position:absolute;
top:5px;
right:10px;
border:none;
background:none;
font-size:18px;
cursor:pointer;
}

/* error */

.error{
color:red;
font-size:12px;
margin-top:4px;
}

/* Login link */

.login-link{
text-align:center;
margin-top:15px;
font-size:14px;
}

.login-link a{
color:#28a745;
text-decoration:none;
font-weight:600;
}

.login-link a:hover{
text-decoration:underline;
}

/* responsive */

@media(max-width:420px){
.register-container{
width:90%;
}
}

</style>
</head>

<body>

<div class="register-container">

<h2>Create Account</h2>

@if (Session::has('success'))
<div class="alert alert-success">
{{ Session::get('success') }}
<button class="close" onclick="this.parentElement.style.display='none'">&times;</button>
</div>
@endif

<form action="{{route('store-user')}}" method="post" enctype="multipart/form-data">
@csrf

<div class="input-group">
<label>Full Name</label>
<input type="text" name="fullname" placeholder="Enter your full name">
<div class="error">@error('fullname') {{$message}} @enderror</div>
</div>

<div class="input-group">
<label>Email</label>
<input type="email" name="email" placeholder="Enter your email">
<div class="error">@error('email') {{$message}} @enderror</div>
</div>

<div class="input-group">
<label>Password</label>
<input type="password" name="password" placeholder="Enter password">
<div class="error">@error('password') {{$message}} @enderror</div>
</div>

<div class="input-group">
<label>Confirm Password</label>
<input type="password" name="password_confirmation" placeholder="Confirm password">
</div>

<div class="input-group">
<label>Select Role</label>
<select name="role_id">
<option value="">-- Select Role --</option>
@foreach($roles as $role)
<option value="{{$role->id}}">{{$role->name}}</option>
@endforeach
</select>
<div class="error">@error('role_id') {{$message}} @enderror</div>
</div>

<div class="input-group">
<label>Upload Profile Image</label>
<input type="file" name="image">
<div class="error">@error('image') {{$message}} @enderror</div>
</div>

<button type="submit">Register</button>

<div class="login-link">
Already have an account?
<a href="{{route('get.login')}}">Login</a>
</div>

</form>

</div>

</body>
</html>