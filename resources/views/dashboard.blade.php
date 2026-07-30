<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard | Swapify</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #C9D9C3;
            min-height: 100vh;
        }

        nav {
            background: #455947;
            color: white;
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav h2 {
            font-size: 25px;
        }

        .logout-button {
            background: #864622;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 18px;
            font-weight: bold;
            cursor: pointer;
        }

        .container {
            width: 90%;
            max-width: 900px;
            margin: 55px auto;
        }

        .success-message {
            background: #e5f4df;
            color: #2e5a34;
            border: 1px solid #709b72;
            padding: 14px;
            border-radius: 9px;
            margin-bottom: 20px;
        }

        .welcome-card {
            background: #D4BDA1;
            border: 2px solid #455947;
            border-radius: 20px;
            padding: 35px;
            box-shadow: 0 12px 28px rgba(56, 51, 48, 0.18);
        }

        .welcome-card h1 {
            color: #383330;
            margin-bottom: 13px;
        }

        .welcome-card p {
            color: #554942;
            line-height: 1.7;
        }

        .account-box {
            background: white;
            margin-top: 25px;
            padding: 22px;
            border-radius: 12px;
        }

        .account-box h3 {
            color: #455947;
            margin-bottom: 15px;
        }

        .account-box p {
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

<nav>
    <h2>Swapify</h2>

    <form action="{{ route('logout') }}" method="POST">
        @csrf

        <button type="submit" class="logout-button">
            Logout
        </button>
    </form>
</nav>

<main class="container">

    @if (session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <section class="welcome-card">

        <h1>
            Welcome, {{ auth()->user()->name }}!
        </h1>

        <p>
            Your Swapify account has been created successfully.
            You can now continue with your profile setup and add
            the skills you want to teach or learn.
        </p>

        <div class="account-box">

            <h3>Your Account</h3>

            <p>
                <strong>Name:</strong>
                {{ auth()->user()->name }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ auth()->user()->email }}
            </p>

        </div>

    </section>

</main>

</body>
</html>