<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Swapify Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    margin:0;
    padding:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial,sans-serif;

    background:url('/images/login-bg.jpg');
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
}

.login-box{
    width:400px;

    background:rgba(212,189,161,.30);

    backdrop-filter:blur(18px);

    -webkit-backdrop-filter:blur(18px);

    padding:35px;

    border-radius:20px;

    border:2px solid rgba(255,255,255,.35);

    box-shadow:0 15px 35px rgba(0,0,0,.25);
}

.form-control{

    height:50px;

    margin-bottom:15px;

    border-radius:12px;

    border:none;

    background:rgba(255,255,255,.92);

    color:#383330;

}

.btn-login{

    width:100%;

    height:50px;

    border:none;

    border-radius:12px;

    background:#455947;

    color:white;

    font-size:17px;

    font-weight:bold;

    transition:.3s;

}

.btn-login:hover{

    background:#864622;

}

.phone-btn{

    width:100%;

    height:50px;

    border:none;

    border-radius:12px;

    margin-top:12px;

    background:#864622;

    color:white;

    font-size:17px;

    font-weight:bold;

    transition:.3s;

}

.phone-btn:hover{

    background:#383330;

}
.signup{

    text-align:center;

    margin-top:22px;

    color:white;

    font-weight:600;

}

.signup a{

    color:#FFD79A;

    text-decoration:none;

    font-weight:bold;

}

.signup a:hover{

    color:white;

}

      

</style>

</head>
<body>

<div class="login-box">

<h2>Welcome to Swapify</h2>

<form action="{{ route('login.store') }}" method="POST">
    @csrf

    <input
        type="email"
        name="email"
        class="form-control"
        placeholder="Enter Email"
        required
    >

    <input
        type="password"
        name="password"
        class="form-control"
        placeholder="Enter Password"
        required
    >

    <button type="submit" class="btn-login">
        Login
    </button>
</form>

<hr>



<a href="{{ route('phone.login') }}" class="phone-btn">
    Continue with Phone Number
</a>

<div class="signup">
    Don't have an account?
    <a href="{{ route('signup') }}">Sign Up</a>
</div>

</body>
</html>