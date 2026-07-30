<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Swapify Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

*{
    box-sizing:border-box;
}

body{
    margin:0;
    padding:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    font-family:Arial,sans-serif;

    background:
    linear-gradient(
        rgba(255,255,255,0.30),
        rgba(255,255,255,0.30)
    ),
    url('/images/login-bg.jpg');

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
}


/* Login Glass Box */

.login-box{

    width:400px;

    background:rgba(212,189,161,0.30);

    backdrop-filter:blur(18px);
    -webkit-backdrop-filter:blur(18px);

    padding:35px;

    border-radius:20px;

    border:2px solid rgba(255,255,255,0.35);

    box-shadow:
    0 15px 35px rgba(0,0,0,0.25);

}


/* Heading */

.login-box h2{

    text-align:center;

    color:#383330;

    font-weight:bold;

    margin-bottom:30px;

}



/* Input */

.form-control{

    height:50px;

    margin-bottom:15px;

    border-radius:12px;

    border:none;

    background:rgba(255,255,255,0.92);

    color:#383330;

    padding-left:18px;

}


.form-control:focus{

    box-shadow:none;

    border:2px solid #864622;

}



/* Login Button */

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



/* Divider */

hr{

    margin:25px 0;

    border:1px solid rgba(255,255,255,0.5);

}



/* Phone Button */

.phone-btn{

    display:flex;

    justify-content:center;

    align-items:center;

    width:100%;

    height:50px;

    border-radius:12px;

    background:#864622;

    color:white;

    font-size:17px;

    font-weight:bold;

    text-decoration:none;

    transition:.3s;

}


.phone-btn:hover{

    background:#383330;

    color:white;

}



/* Signup */

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


<h2>
Welcome to Swapify
</h2>


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

<a href="{{ route('signup') }}">
Sign Up
</a>


</div>


</div>


</body>

</html>