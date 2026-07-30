<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Create Account | Swapify</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: #C9D9C3;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 25px;
        }

        .signup-card {
            width: 100%;
            max-width: 470px;
            background: #D4BDA1;
            padding: 38px;
            border-radius: 22px;
            border: 2px solid #455947;
            box-shadow: 0 15px 35px rgba(56, 51, 48, 0.22);
        }

        .logo {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: #864622;
            margin-bottom: 8px;
            letter-spacing: 2px;
        }

        .signup-card h1 {
            text-align: center;
            color: #383330;
            font-size: 32px;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #5f514a;
            font-size: 15px;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 17px;
        }

        .form-group label {
            display: block;
            color: #383330;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 7px;
        }

        .form-group input {
            width: 100%;
            padding: 14px 15px;
            background: #ffffff;
            border: 1px solid #8e796b;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            color: #383330;
            transition: 0.3s;
        }

        .form-group input:focus {
            border: 2px solid #455947;
            box-shadow: 0 0 0 3px rgba(69, 89, 71, 0.15);
        }

        .password-wrapper {
            position: relative;
        }

        .password-wrapper input {
            padding-right: 70px;
        }

        .show-password {
            position: absolute;
            right: 14px;
            top: 50%;
            transform: translateY(-50%);
            border: none;
            background: transparent;
            color: #864622;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
        }

        .terms {
            display: flex;
            align-items: flex-start;
            gap: 9px;
            margin: 5px 0 20px;
            color: #383330;
            font-size: 14px;
            line-height: 1.5;
        }

        .terms input {
            margin-top: 3px;
            accent-color: #455947;
        }

        .terms a {
            color: #864622;
            font-weight: bold;
            text-decoration: none;
        }

        .signup-button {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 10px;
            background: #455947;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
        }

        .signup-button:hover {
            background: #344537;
            transform: translateY(-1px);
        }

        .divider {
            display: flex;
            align-items: center;
            gap: 12px;
            margin: 23px 0;
            color: #6c5d54;
            font-size: 13px;
        }

        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            height: 1px;
            background: #9d8678;
        }

        .social-button {
            width: 100%;
            padding: 13px;
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 15px;
            font-weight: bold;
            cursor: pointer;
            margin-bottom: 12px;
        }

        
        .phone-button {
            background: #864622;
        }
        .phone-button {
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    text-decoration: none;
        }

        

        .phone-button:hover {
            background: #703919;
        }

        .login-text {
            text-align: center;
            margin-top: 18px;
            color: #383330;
            font-size: 14px;
        }

        .login-text a {
            color: #864622;
            font-weight: bold;
            text-decoration: none;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        .error-box {
            background: #ffe2df;
            border: 1px solid #b94235;
            color: #8c261d;
            padding: 13px 16px;
            border-radius: 9px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .error-box ul {
            padding-left: 19px;
        }

        .field-error {
            color: #9c291e;
            display: block;
            font-size: 12px;
            margin-top: 5px;
        }

        @media (max-width: 520px) {
            body {
                padding: 15px;
            }

            .signup-card {
                padding: 28px 20px;
            }

            .signup-card h1 {
                font-size: 27px;
            }
        }
    </style>
</head>

<body>

<div class="signup-card">

    <div class="logo">SWAPIFY</div>

    <h1>Create Account</h1>

    <p class="subtitle">
        Join Swapify and start exchanging your skills
    </p>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('signup.store') }}" method="POST">

        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>

            <input
                type="text"
                id="name"
                name="name"
                placeholder="Enter your full name"
                value="{{ old('name') }}"
                required
            >

            @error('name')
                <span class="field-error">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email Address</label>

            <input
                type="email"
                id="email"
                name="email"
                placeholder="Enter your email address"
                value="{{ old('email') }}"
                required
            >

            @error('email')
                <span class="field-error">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Create a password"
                    required
                >

                <button
                    type="button"
                    class="show-password"
                    onclick="togglePassword('password', this)"
                >
                    Show
                </button>
            </div>

            @error('password')
                <span class="field-error">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">
                Confirm Password
            </label>

            <div class="password-wrapper">
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Re-enter your password"
                    required
                >

                <button
                    type="button"
                    class="show-password"
                    onclick="togglePassword('password_confirmation', this)"
                >
                    Show
                </button>
            </div>
        </div>

        <div class="terms">
            <input
                type="checkbox"
                id="terms"
                name="terms"
                required
            >

            <label for="terms">
                I agree to the
                <a href="#">Terms and Conditions</a>
                and
                <a href="#">Privacy Policy</a>.
            </label>
        </div>

        <button type="submit" class="signup-button">
            Create Account
        </button>

    </form>

    <div class="divider">
        OR
    </div>

    

    <a href="{{ route('phone.signup') }}" class="social-button phone-button">
    Continue with Phone Number
</a>
    <p class="login-text">
        Already have an account?

        <a href="{{ route('login') }}">
            Login
        </a>
    </p>

</div>

<script>
    function togglePassword(inputId, button) {
        const passwordInput = document.getElementById(inputId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            button.textContent = "Hide";
        } else {
            passwordInput.type = "password";
            button.textContent = "Show";
        }
    }
</script>

</body>
</html>