<!DOCTYPE html>

<html>

<head>

<title>Reset Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{

display:flex;

justify-content:center;

align-items:center;

height:100vh;

background:#f5f5f5;

}

.box{

width:430px;

background:white;

padding:35px;

border-radius:15px;

box-shadow:0 5px 20px rgba(0,0,0,.2);

}

</style>

</head>

<body>

<div class="box">

<h2 class="text-center">

Reset Password

</h2>

<form action="{{ route('update.password') }}" method="POST">

@csrf

<input
type="hidden"
name="email"
value="{{ $email }}">

<label>New Password</label>

<input
type="password"
name="password"
class="form-control mb-3"
required>

<label>Confirm Password</label>

<input
type="password"
name="password_confirmation"
class="form-control mb-4"
required>

<button class="btn btn-success w-100">

Reset Password

</button>

</form>

</div>

</body>

</html>