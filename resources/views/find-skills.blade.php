<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Find Skills | Swapify</title>

    <style>
        :root {
            --sage: #C9DDC3;
            --woodland: #455947;
            --vanilla: #D4BDA1;
            --russet: #864622;
            --cream: #F8F2E9;
            --white: #FFFFFF;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: var(--cream);
            color: #333;
        }

        /* Navbar */

        .navbar {
            background: var(--woodland);
            color: white;
            padding: 18px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 30px;
            font-weight: bold;
            text-decoration: none;
        }

        .back {
            color: white;
            text-decoration: none;
            border: 1px solid white;
            padding: 10px 18px;
            border-radius: 25px;
            transition: 0.3s;
        }

        .back:hover {
            background: white;
            color: var(--woodland);
        }

        /* Main container */

        .container {
            width: 90%;
            max-width: 1100px;
            margin: 40px auto;
        }

        .title {
            font-size: 38px;
            color: var(--woodland);
            margin-bottom: 25px;
        }

        /* Search */

        .search-box {
            display: flex;
            gap: 12px;
            margin-bottom: 35px;
        }

        .search-box input {
            flex: 1;
            padding: 15px 18px;
            border: 1px solid #d5d5d5;
            border-radius: 12px;
            font-size: 16px;
            outline: none;
            background: white;
        }

        .search-box input:focus {
            border-color: var(--woodland);
            box-shadow: 0 0 0 3px rgba(69, 89, 71, 0.12);
        }

        .search-box button {
            background: var(--russet);
            color: white;
            border: none;
            padding: 15px 28px;
            border-radius: 12px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        .search-box button:hover {
            background: #6d3416;
        }

        /* User cards */

        .card {
            background: white;
            border: 1px solid rgba(69, 89, 71, 0.12);
            border-radius: 20px;
            padding: 28px;
            margin-bottom: 25px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(0, 0, 0, 0.10);
        }

        .card h2 {
            color: var(--woodland);
            font-size: 27px;
            margin-bottom: 16px;
            text-transform: capitalize;
        }

        .skills-title {
            color: #444;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .skills {
            margin-bottom: 20px;
        }

        .badge {
            display: inline-block;
            background: var(--sage);
            color: var(--woodland);
            padding: 8px 15px;
            border-radius: 20px;
            margin: 5px 5px 5px 0;
            font-size: 14px;
            font-weight: 600;
        }

        .no-skills {
            color: #777;
            margin: 10px 0 20px;
        }

        /* View profile button */

        .btn {
            display: inline-block;
            background: var(--russet);
            color: white;
            text-decoration: none;
            padding: 11px 23px;
            border-radius: 25px;
            font-size: 15px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn:hover {
            background: #6d3416;
            transform: translateY(-1px);
        }

        /* No results */

        .empty {
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            font-size: 20px;
            color: var(--woodland);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.07);
        }

        /* Mobile */

        @media (max-width: 650px) {
            .navbar {
                padding: 16px 5%;
            }

            .logo {
                font-size: 25px;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .title {
                font-size: 31px;
            }

            .search-box {
                flex-direction: column;
            }

            .search-box button {
                width: 100%;
            }

            .card {
                padding: 22px;
            }

            .card h2 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">

        <a href="{{ route('dashboard') }}" class="logo">
            Swapify
        </a>

        <a href="{{ route('dashboard') }}" class="back">
            Dashboard
        </a>

    </div>

    <div class="container">

        <h1 class="title">Find Skills</h1>

        <form method="GET"
              action="{{ route('find.skills') }}"
              class="search-box">

            <input
                type="text"
                name="search"
                placeholder="Search skills..."
                value="{{ $search ?? '' }}">

            <button type="submit">
                Search
            </button>

        </form>

        @if($users->count())

            @foreach($users as $user)

                @php
                    $skills = [];

                    if ($user->profile && $user->profile->skills_to_teach) {
                        $skills = is_array($user->profile->skills_to_teach)
                            ? $user->profile->skills_to_teach
                            : json_decode(
                                $user->profile->skills_to_teach,
                                true
                            ) ?? [];
                    }
                @endphp

                <div class="card">

                    <h2>{{ $user->name }}</h2>

                    <p class="skills-title">
                        <strong>Skills:</strong>
                    </p>

                    @if(count($skills) > 0)

                        <div class="skills">

                            @foreach($skills as $skill)

                                <span class="badge">
                                    {{ $skill }}
                                </span>

                            @endforeach

                        </div>

                    @else

                        <p class="no-skills">
                            No skills added.
                        </p>

                    @endif

                    <a href="{{ route('profile.view', $user->id) }}"
                       class="btn">

                        View Profile

                    </a>

                </div>

            @endforeach

        @else

            <div class="empty">
                No users found with this skill.
            </div>

        @endif

    </div>

</body>
</html>