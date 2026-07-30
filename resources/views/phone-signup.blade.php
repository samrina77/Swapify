<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up With Phone</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #eef6f4;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px 15px;
        }

        .signup-card {
            width: 430px;
            max-width: 100%;
            background: #eadbd8;
            padding: 35px;
            border-radius: 22px;
            border: 1px solid #567b78;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        h2 {
            text-align: center;
            color: #694b43;
            font-size: 32px;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 17px;
            font-weight: bold;
            color: #222;
        }

        input[type="text"],
        input[type="tel"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            border: 1px solid #bbb;
            border-radius: 12px;
            font-size: 16px;
            outline: none;
            background: white;
        }

        input:focus {
            border-color: #547f7b;
        }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin: 20px 0;
            font-size: 15px;
        }

        .terms input {
            margin-top: 3px;
        }

        .terms label {
            font-weight: normal;
            margin: 0;
            font-size: 15px;
        }

        .terms span {
            color: #a55240;
            font-weight: bold;
        }

        .signup-button {
            width: 100%;
            padding: 15px;
            border: none;
            border-radius: 12px;
            background: #467d7a;
            color: white;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .signup-button:hover {
            background: #356865;
        }

        .login-text {
            margin-top: 22px;
            text-align: center;
        }

        .login-text a {
            color: #8f493b;
            font-weight: bold;
            text-decoration: none;
        }

        .error {
            color: #b42318;
            font-size: 14px;
            margin-top: 6px;
        }
    </style>
</head>

<body>

<div class="signup-card">

    <h2>Sign Up With Phone</h2>

    <form action="{{ route('phone.signup.store') }}" method="POST">
        @csrf

        <div class="input-group">
            <label>Full Name</label>

            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Enter your full name"
                required
            >

            @error('name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-group">
            <label>Phone Number</label>

            <input
                type="tel"
                name="phone"
                value="{{ old('phone') }}"
                placeholder="+977 98XXXXXXXX"
                required
            >

            @error('phone')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-group">
            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                required
            >

            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="input-group">
            <label>Confirm Password</label>

            <input
                type="password"
                name="password_confirmation"
                placeholder="Re-enter your password"
                required
            >
        </div>

        <div class="terms">
            <input type="checkbox" name="terms" value="1" id="terms" required>

            <label for="terms">
                I agree to the
                <span>Terms and Conditions</span>
                and
                <span>Privacy Policy</span>.
            </label>
        </div>

        @error('terms')
            <p class="error">{{ $message }}</p>
        @enderror

        <button type="submit" class="signup-button">
            Create Account
        </button>

    </form>

    <p class="login-text">
        Already have an account?
        <a href="{{ route('login') }}">Login</a>
    </p>

</div>

</body>
</html>