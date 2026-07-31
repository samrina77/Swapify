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
        135deg,
        rgba(69,89,71,0.85),
        rgba(134,70,34,0.75)
    );

}

/* Login Glass Box */

.login-box{

    width:400px;

    background:
    linear-gradient(
        135deg,
        rgba(255,255,255,0.18),
        rgba(212,189,161,0.25)
    );

    backdrop-filter:blur(22px);
    -webkit-backdrop-filter:blur(22px);

    padding:35px;

    border-radius:20px;

    border:1px solid rgba(255,255,255,0.35);

    box-shadow:
    0 15px 40px rgba(0,0,0,0.3);

}

/* Heading */

.login-box h2{

    text-align:center;

    color:white;

    font-size:32px;

    font-weight:900;

    letter-spacing:1px;

    margin-bottom:30px;

    text-shadow:
    0 3px 10px rgba(0,0,0,0.3);

}

/* Input */

.form-control{

    width:100%;

    height:50px;

    margin-bottom:18px !important;

    border-radius:12px;

    border:none;

    background:rgba(255,255,255,0.85);

    color:#383330;

    padding:0 18px;

    font-size:16px;

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
<div style="text-align:center; margin-top:10px; margin-bottom:15px;">
    <a href="{{ route('forgot.password') }}"
       style="color:white; text-decoration:none; font-weight:bold">
        Forgot Password?
    </a>
</div>

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