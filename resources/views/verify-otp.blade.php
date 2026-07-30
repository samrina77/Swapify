<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Verify OTP</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #fdf3f2;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .otp-container {
            width: 420px;
            max-width: 90%;
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
            text-align: center;
        }

        h2 {
            color: #8b4c39;
            font-size: 34px;
            margin-bottom: 12px;
        }

        .description {
            color: #777;
            margin-bottom: 10px;
        }

        .phone-number {
            color: #8b4c39;
            font-weight: bold;
            margin-bottom: 25px;
        }

        .otp-input {
            width: 100%;
            padding: 16px;
            border: 1px solid #ccc;
            border-radius: 12px;
            text-align: center;
            font-size: 25px;
            letter-spacing: 10px;
        }

        .otp-input:focus {
            outline: none;
            border-color: #8b4c39;
        }

        .verify-btn {
            width: 100%;
            margin-top: 20px;
            padding: 15px;
            background: #8b4c39;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .verify-btn:hover {
            background: #6e3d30;
        }

        .error {
            color: red;
            margin-top: 10px;
        }

        .demo-code {
            margin-top: 20px;
            padding: 12px;
            background: #f8eeee;
            border-radius: 10px;
            color: #555;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #8b4c39;
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="otp-container">

    <h2>Verify OTP</h2>

    <p class="description">
        Enter the 6-digit code sent to
    </p>

    <p class="phone-number">
        {{ session('phone_number') }}
    </p>

    <form action="{{ route('verify.otp.submit') }}" method="POST">

        @csrf

        <input
            type="text"
            name="otp"
            maxlength="6"
            inputmode="numeric"
            class="otp-input"
            placeholder="000000"
            required
        >

        @error('otp')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <button type="submit" class="verify-btn">
            Verify OTP
        </button>

    </form>

    <div class="demo-code">
        Demo OTP: <strong>123456</strong>
    </div>

    <a href="{{ route('phone.login') }}" class="back-link">
        Change Phone Number
    </a>

</div>

</body>
</html>
