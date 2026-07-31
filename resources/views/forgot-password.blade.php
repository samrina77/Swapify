<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Forgot Password</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;

            background: linear-gradient(
                135deg,
                rgba(69, 89, 71, 0.85),
                rgba(134, 70, 34, 0.75)
            );
        }

        .box {
            width: 400px;
            max-width: 90%;
            padding: 35px;

            background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.18),
                rgba(212, 189, 161, 0.25)
            );

            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);

            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.35);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            color: white;
            font-size: 38px;
            font-weight: 900;
            margin-bottom: 30px;
            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }

        label {
            color: white;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 10px;
            display: block;
        }

        .form-control {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.9);
            padding: 0 18px;
            font-size: 16px;
        }

        .form-control:focus {
            box-shadow: none;
            border: 2px solid #864622;
        }

        .btn-primary {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 12px;
            background: #455947;
            color: white;
            font-size: 17px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background: #864622;
        }

        a {
            color: #FFD79A;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: white;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>Forgot Password</h2>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('check.email') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="email">Email Address</label>

            <input
                type="email"
                id="email"
                name="email"
                class="form-control"
                placeholder="Enter your email"
                value="{{ old('email') }}"
                required
            >

            @error('email')
                <small class="text-warning">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Continue
        </button>
    </form>

    <div style="text-align:center; margin-top:20px;">
        <a href="{{ route('login') }}">
            Back to Login
        </a>
    </div>

</div>

</body>
</html>