<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Reset Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

margin:0;
padding:0;

display:flex;
justify-content:center;
align-items:center;

height:100vh;

background:linear-gradient(135deg,#667eea,#764ba2);

font-family:Arial,sans-serif;

}

.box{

width:420px;

background:white;

padding:35px;

border-radius:15px;

box-shadow:0 10px 30px rgba(0,0,0,.2);

}

h2{

text-align:center;

margin-bottom:25px;

color:#667eea;

}

.btn-success{

width:100%;

height:45px;

}

</style>

</head>

<body>

<div class="box">

<h2>Reset Password</h2>

<form action="{{ route('update.password') }}" method="POST">

@csrf

<input
type="hidden"
name="email"
value="{{ $email }}">

<div class="mb-3">

<label>New Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input
type="password"
name="password_confirmation"
class="form-control"
required>

</div>

<button
type="submit"
class="btn btn-success">

Reset Password

</button>

</form>

<br>

<a href="{{ route('login') }}">

Back to Login

</a>

</div>

</body>

</html>