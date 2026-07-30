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
    background:#CDD9C3; /* Shamrock Shake */
}

.login-box{
    width:400px;
    background:#D4BDA1; /* Dark Vanilla */
    padding:35px;
    border-radius:18px;
    box-shadow:0 10px 25px rgba(56,51,48,.25);
    border:2px solid #455947;
}

.login-box h2{
    text-align:center;
    color:#455947; /* Woodlands */
    margin-bottom:25px;
    font-weight:bold;
}

.form-control{
    height:48px;
    margin-bottom:15px;
    border-radius:10px;
    border:1px solid #455947;
    background:#fffaf5;
}

.form-control:focus{
    border-color:#864622;
    box-shadow:0 0 8px rgba(134,70,34,.3);
}

.btn-login{
    width:100%;
    height:48px;
    border:none;
    border-radius:10px;
    background:#455947; /* Woodlands */
    color:white;
    font-weight:bold;
    transition:0.3s;
}

.btn-login:hover{
    background:#383330; /* Black Coffee */
}

.phone-btn{
    display:block;
    width:100%;
    padding:16px;
    margin-top:20px;
    background:#9b4f3f;
    color:white;
    text-align:center;
    text-decoration:none;
    border-radius:15px;
    font-size:20px;
    font-weight:bold;
}

.phone-btn:hover{
    background:#7f3f33;
    color:white;
}

.signup{
    text-align:center;
    margin-top:20px;
}

.signup a{
    color:#455947;
    font-weight:bold;
    text-decoration:none;
}

.signup a:hover{
    color:#864622;
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

<button class="google-btn">
Continue with Google
</button>

<a href="{{ route('phone.login') }}" class="phone-btn">
    Continue with Phone Number
</a>

<div class="signup">
    Don't have an account?
    <a href="{{ route('signup') }}">Sign Up</a>
</div>

</body>
</html>