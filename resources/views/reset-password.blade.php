<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Reset Password | Swapify</title>

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
            padding: 20px;
            min-height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;

            font-family: Arial, sans-serif;

            background: linear-gradient(
                135deg,
                rgba(69, 89, 71, 0.90),
                rgba(134, 70, 34, 0.80)
            );
        }

        .box {
            width: 430px;
            max-width: 100%;
            padding: 35px;

            background: linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.18),
                rgba(212, 189, 161, 0.25)
            );

            backdrop-filter: blur(22px);
            -webkit-backdrop-filter: blur(22px);

            border: 1px solid rgba(255, 255, 255, 0.35);
            border-radius: 20px;

            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.30);
        }

        h2 {
            text-align: center;
            color: white;
            font-size: 36px;
            font-weight: 900;
            margin-bottom: 30px;

            text-shadow: 0 4px 12px rgba(0, 0, 0, 0.40);
        }

        label {
            display: block;
            color: white;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            height: 50px;
            padding: 0 18px;

            background: rgba(255, 255, 255, 0.90);

            border: none;
            border-radius: 12px;

            font-size: 16px;
        }

        .form-control:focus {
            border: 2px solid #864622;
            box-shadow: none;
        }

        .btn-reset {
            width: 100%;
            height: 50px;

            border: none;
            border-radius: 12px;

            background: #455947;
            color: white;

            font-size: 17px;
            font-weight: bold;

            transition: 0.3s;
        }

        .btn-reset:hover {
            background: #864622;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #FFD79A;
            text-decoration: none;
            font-weight: bold;
        }

        .back-link a:hover {
            color: white;
        }

        .error-message {
            display: block;
            color: #FFE0D6;
            margin-top: -10px;
            margin-bottom: 15px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>Reset Password</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            Please check the information below.
        </div>
    @endif

    <form action="{{ route('update.password') }}" method="POST">
        @csrf

        <input
            type="hidden"
            name="email"
            value="{{ $email }}"
        >

        <label for="password">New Password</label>

        <input
            type="password"
            id="password"
            name="password"
            class="form-control mb-3"
            placeholder="Enter new password"
            required
        >

        @error('password')
            <span class="error-message">
                {{ $message }}
            </span>
        @enderror

        <label for="password_confirmation">
            Confirm Password
        </label>

        <input
            type="password"
            id="password_confirmation"
            name="password_confirmation"
            class="form-control mb-4"
            placeholder="Confirm new password"
            required
        >

        <button type="submit" class="btn-reset">
            Reset Password
        </button>

    </form>

    <div class="back-link">
        <a href="{{ route('login') }}">
            Back to Login
        </a>
    </div>

</div>

</body>
</html>