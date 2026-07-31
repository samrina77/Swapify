<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Login</title>

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial,sans-serif;
        }

        body{
            background:#fdf3f2;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .container{
            width:420px;
            background:#fff;
            padding:40px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.1);
        }

        h2{
            text-align:center;
            color:#8B4C39;
            margin-bottom:10px;
        }

        p{
            text-align:center;
            color:#777;
            margin-bottom:25px;
        }

        label{
            font-weight:bold;
        }

        input{
            width:100%;
            padding:15px;
            margin-top:10px;
            border:1px solid #ccc;
            border-radius:10px;
            font-size:16px;
        }

        button{
            width:100%;
            margin-top:20px;
            padding:15px;
            background:#8B4C39;
            color:white;
            border:none;
            border-radius:10px;
            font-size:18px;
            cursor:pointer;
        }

        button:hover{
            background:#6e3d30;
        }

        a{
            display:block;
            text-align:center;
            margin-top:20px;
            color:#8B4C39;
            text-decoration:none;
        }
    </style>

</head>
<body>

<div class="container">

    <h2>Phone Login</h2>

    <p>Enter your phone number</p>



       <form action="{{ route('phone.sendOtp') }}" method="POST">

    @csrf

    <label for="phone">Phone Number</label>

    <input
        type="tel"
        id="phone"
        name="phone"
        value="{{ old('phone') }}"
        placeholder="+977 98XXXXXXXX"
        required
    >

    @error('phone')
        <p style="color:red; text-align:left; margin-top:8px;">
            {{ $message }}
        </p>
    @enderror

    <button type="submit">
        Continue
    </button>

</form>
    <a href="{{ route('login') }}">
        Back to Login
    </a>

</div>
<div class="text-end mt-2">
    <a href="{{ route('forgot.password') }}"
       style="text-decoration:none;color:white;font-size:14px;">
        Forgot Password?
    </a>
</div>

</body>
</html>