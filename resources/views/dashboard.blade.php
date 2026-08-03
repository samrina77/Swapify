<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Dashboard | Swapify</title>

    <style>
        :root {
            --sage: #C9DDC3;
            --woodland: #455947;
            --vanilla: #D4BDA1;
            --russet: #864622;
            --deer: #C78B53;
            --coffee: #3B3330;
            --cream: #F8F2E9;
            --white: #FFFFFF;
            --border: rgba(69, 89, 71, 0.18);
            --shadow: 0 10px 28px rgba(59, 51, 48, 0.10);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            min-height: 100vh;
            background: var(--cream);
            color: var(--coffee);
        }

        a {
            text-decoration: none;
        }

        button {
            font-family: inherit;
        }

        /* Navbar */

        .navbar {
            min-height: 76px;
            background: var(--woodland);
            padding: 14px 6%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
            box-shadow: 0 4px 16px rgba(59, 51, 48, 0.18);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo {
            color: var(--cream);
            font-size: 29px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 23px;
        }

        .nav-links a {
            color: var(--cream);
            font-size: 15px;
            font-weight: 700;
            position: relative;
            transition: 0.2s ease;
        }

        .nav-links a::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: -7px;
            width: 0;
            height: 2px;
            background: var(--deer);
            transition: width 0.2s ease;
        }

        .nav-links a:hover {
            color: var(--vanilla);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .profile-area {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .profile-circle {
            width: 45px;
            height: 45px;
            min-width: 45px;
            border-radius: 50%;
            background: var(--vanilla);
            color: var(--woodland);
            border: 2px solid rgba(255, 255, 255, 0.55);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            font-weight: 800;
        }

        .profile-circle img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .profile-name {
            color: var(--cream);
            font-size: 14px;
            font-weight: 700;
            max-width: 135px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .logout-button {
            border: 1px solid rgba(255, 255, 255, 0.45);
            background: transparent;
            color: var(--cream);
            padding: 9px 15px;
            border-radius: 24px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s ease;
        }

        .logout-button:hover {
            background: var(--russet);
            border-color: var(--russet);
        }

        /* Main container */

        .dashboard-container {
            width: min(1200px, 90%);
            margin: 34px auto 55px;
        }

        /* Messages */

        .success-alert {
            background: var(--sage);
            color: var(--woodland);
            border-left: 5px solid var(--woodland);
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 11px;
            font-size: 15px;
            font-weight: 700;
            box-shadow: var(--shadow);
        }

        .error-alert {
            background: #F3D8CB;
            color: var(--russet);
            border-left: 5px solid var(--russet);
            padding: 15px 18px;
            margin-bottom: 22px;
            border-radius: 11px;
            font-size: 15px;
            font-weight: 700;
        }

        /* Welcome section */

        .welcome-section {
            background:
                linear-gradient(
                    135deg,
                    var(--sage),
                    var(--cream),
                    var(--vanilla)
                );
            border: 1px solid rgba(69, 89, 71, 0.15);
            padding: 38px;
            border-radius: 24px;
            display: grid;
            grid-template-columns: 1.4fr 0.6fr;
            align-items: center;
            gap: 35px;
            box-shadow: var(--shadow);
        }

        .welcome-content h1 {
            color: var(--woodland);
            font-size: 38px;
            margin-bottom: 12px;
        }

        .welcome-content p {
            color: var(--coffee);
            font-size: 16px;
            line-height: 1.7;
            max-width: 660px;
        }

        .complete-profile-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 23px;
            padding: 14px 27px;
            background: linear-gradient(
                135deg,
                var(--russet),
                var(--deer)
            );
            color: var(--white);
            font-size: 16px;
            font-weight: 800;
            border-radius: 30px;
            box-shadow: 0 8px 20px rgba(134, 70, 34, 0.25);
            transition: 0.25s ease;
        }

        .complete-profile-btn:hover {
            background: var(--woodland);
            transform: translateY(-3px);
            box-shadow: 0 12px 25px rgba(69, 89, 71, 0.28);
        }

        .complete-profile-btn span {
            font-size: 21px;
            transition: transform 0.25s ease;
        }

        .complete-profile-btn:hover span {
            transform: translateX(4px);
        }

        /* Profile progress */

        .profile-progress-card {
            background: rgba(255, 255, 255, 0.78);
            border: 1px solid rgba(69, 89, 71, 0.15);
            padding: 24px;
            border-radius: 19px;
            text-align: center;
        }

        .progress-circle {
            width: 115px;
            height: 115px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: conic-gradient(
                var(--woodland) var(--progress),
                rgba(69, 89, 71, 0.13) 0
            );
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .progress-circle::before {
            content: "";
            width: 88px;
            height: 88px;
            border-radius: 50%;
            background: var(--cream);
            position: absolute;
        }

        .progress-number {
            position: relative;
            z-index: 1;
            color: var(--woodland);
            font-size: 25px;
            font-weight: 800;
        }

        .profile-progress-card h3 {
            color: var(--woodland);
            font-size: 17px;
            margin-bottom: 6px;
        }

        .profile-progress-card p {
            color: #6E655F;
            font-size: 13px;
            line-height: 1.5;
        }

        /* Statistics */

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 20px;
            margin-top: 27px;
        }

        .stat-card {
            background: var(--white);
            padding: 25px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            gap: 18px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
            transition: 0.25s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .stat-icon {
            width: 58px;
            height: 58px;
            min-width: 58px;
            border-radius: 16px;
            background: var(--sage);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .stat-details h3 {
            color: var(--woodland);
            font-size: 30px;
            margin-bottom: 4px;
        }

        .stat-details p {
            color: #716861;
            font-size: 14px;
        }

        /* General sections */

        .section-heading-row {
            margin: 39px 0 18px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .section-title {
            color: var(--woodland);
            font-size: 26px;
        }

        .view-all-link {
            color: var(--russet);
            font-size: 14px;
            font-weight: 700;
        }

        .view-all-link:hover {
            color: var(--woodland);
        }

        /* Quick actions */

        .action-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 20px;
        }

        .action-card {
            background: var(--white);
            border: 1px solid var(--border);
            padding: 25px 18px;
            border-radius: 18px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: 0.25s ease;
        }

        .action-card:hover {
            transform: translateY(-5px);
            border-color: var(--deer);
        }

        .action-icon {
            width: 64px;
            height: 64px;
            margin: 0 auto 16px;
            border-radius: 18px;
            background: var(--sage);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
        }

        .action-card:nth-child(2) .action-icon {
            background: var(--vanilla);
        }

        .action-card:nth-child(3) .action-icon {
            background: #E4D9CA;
        }

        .action-card:nth-child(4) .action-icon {
            background: #D9E6D5;
        }

        .action-card h3 {
            color: var(--woodland);
            margin-bottom: 9px;
            font-size: 18px;
        }

        .action-card p {
            min-height: 64px;
            color: #706761;
            font-size: 14px;
            line-height: 1.55;
        }

        .action-button {
            display: inline-block;
            margin-top: 15px;
            background: var(--russet);
            color: var(--white);
            padding: 10px 17px;
            border-radius: 23px;
            font-size: 14px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .action-button:hover {
            background: var(--woodland);
        }

        /* Skills */

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 24px;
        }

        .skills-card {
            background: var(--white);
            padding: 26px;
            border-radius: 19px;
            border: 1px solid var(--border);
            box-shadow: var(--shadow);
        }

        .skills-card-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 16px;
            margin-bottom: 17px;
            border-bottom: 2px solid var(--sage);
        }

        .skills-card-header .icon {
            width: 43px;
            height: 43px;
            border-radius: 13px;
            background: var(--sage);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
        }

        .skills-card-header h3 {
            color: var(--woodland);
            font-size: 19px;
        }

        .skill-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            background: var(--sage);
            color: var(--woodland);
            padding: 10px 14px;
            border-radius: 24px;
            font-size: 14px;
            font-weight: 700;
        }

        .learning-tag {
            background: var(--vanilla);
            color: var(--coffee);
        }

        .empty-skills {
            width: 100%;
            padding: 20px;
            background: var(--cream);
            color: #706761;
            border: 1px dashed rgba(69, 89, 71, 0.32);
            border-radius: 13px;
            text-align: center;
            font-size: 14px;
            line-height: 1.6;
        }

        .empty-skills a {
            color: var(--russet);
            font-weight: 700;
        }

        /* Footer */

        footer {
            background: var(--woodland);
            color: var(--cream);
            text-align: center;
            padding: 20px;
            font-size: 14px;
        }

        /* Responsive design */

        @media (max-width: 1050px) {
            .nav-links {
                display: none;
            }

            .action-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 850px) {
            .welcome-section {
                grid-template-columns: 1fr;
            }

            .profile-progress-card {
                max-width: 350px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .skills-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 13px 4%;
            }

            .logo {
                font-size: 25px;
            }

            .profile-name {
                display: none;
            }

            .logout-button {
                padding: 8px 11px;
            }

            .dashboard-container {
                width: 93%;
                margin-top: 22px;
            }

            .welcome-section {
                padding: 26px 20px;
                border-radius: 18px;
            }

            .welcome-content h1 {
                font-size: 29px;
            }

            .welcome-content p {
                font-size: 15px;
            }

            .complete-profile-btn {
                width: 100%;
            }

            .action-grid {
                grid-template-columns: 1fr;
            }

            .action-card p {
                min-height: auto;
            }

            .section-title {
                font-size: 23px;
            }

            .stat-card {
                padding: 20px;
            }
        }

        .logo {
    display: flex;
    align-items: center;
    gap: 10px;
    color: white;
    text-decoration: none;
    font-size: 36px;
    font-weight: bold;
}

.logo img {
    width: 55px;
    height: 55px;
    object-fit: contain;
    border-radius: 14px;
    display: block;
}
    </style>
</head>

<body>

@php
    $user = auth()->user();

    /*
    |--------------------------------------------------------------------------
    | User initials
    |--------------------------------------------------------------------------
    */

    $nameParts = preg_split(
        '/\s+/',
        trim($user->name ?? 'User')
    );

    $initials = collect($nameParts)
        ->filter()
        ->take(2)
        ->map(function ($part) {
            return strtoupper(substr($part, 0, 1));
        })
        ->implode('');

    /*
    |--------------------------------------------------------------------------
    | Teaching skills
    |--------------------------------------------------------------------------
    */
    $profile = \App\Models\Profile::where('user_id', $user->id)->first();

$teachSkills = $profile?->skills_to_teach ?? [];

if (is_string($teachSkills)) {
    $teachSkills = json_decode($teachSkills, true) ?: [];
}

$learnSkills = $profile?->skills_to_learn ?? [];

if (is_string($learnSkills)) {
    $learnSkills = json_decode($learnSkills, true) ?: [];
}

$profilePicture = $profile?->profile_picture;

    /*
    |--------------------------------------------------------------------------
    | Profile completion percentage
    |--------------------------------------------------------------------------
    */

    $profileInformation = [
        $user->name ?? null,
        $user->contact ?? null,
        $user->email ?? null,
        $user->gender ?? null,
        $user->bio ?? null,
        $user->province ?? null,
        $user->district ?? null,
        $user->municipality ?? null,
        count($teachSkills) ? $teachSkills : null,
        count($learnSkills) ? $learnSkills : null,
    ];

    $completedInformation = collect($profileInformation)
        ->filter(function ($value) {
            return filled($value);
        })
        ->count();

    $profilePercentage = round(
        ($completedInformation / count($profileInformation)) * 100
    );

    $skillCredits = $user->skill_credits ?? 100;

    $profilePicture = $user->profile_picture ?? null;
@endphp

<nav class="navbar">

    <a href="{{ route('home') }}" class="logo">
    <img src="{{ asset('images/swapify-logo.jpeg') }}"
         alt="Swapify Logo">

    <span>Swapify</span>
</a>

    <div class="nav-right">

        <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>

            <a href="#">Find Skills</a>

            <a href="#">Messages</a>

            <a href="#">Notifications</a>
        </div>

        <div class="profile-area">

            <a
                href="{{ route('profile.setup') }}"
                class="profile-circle"
                title="Complete profile"
            >
                @if ($profilePicture)
                    <img
                        src="{{ \Illuminate\Support\Facades\Storage::url($profilePicture) }}"
                        alt="{{ $user->name }} profile picture"
                    >
                @else
                    {{ $initials ?: 'U' }}
                @endif
            </a>

            <span class="profile-name">
                {{ $user->name ?? 'Swapify User' }}
            </span>

            <form
                action="{{ route('logout') }}"
                method="POST"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-button"
                >
                    Logout
                </button>
            </form>

        </div>

    </div>

</nav>

<main class="dashboard-container">

    @if (session('success'))
        <div class="success-alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="error-alert">
            {{ $errors->first() }}
        </div>
    @endif

    <section class="welcome-section">

        <div class="welcome-content">

            <h1>
                Welcome, {{ $user->name ?? 'Swapify User' }}!
            </h1>

            <p>
                Share your skills, learn something new and connect
                with people who have similar interests. Complete your
                profile to get better skill recommendations and connect
                with the right Swapify members.
            </p>

            <a
                href="{{ route('profile.setup') }}"
                class="complete-profile-btn"
            >
                @if ($profilePercentage >= 100)
                    Edit Your Profile
                @else
                    Complete Your Profile
                @endif

                <span>→</span>
            </a>

        </div>

        <div class="profile-progress-card">

            <div
                class="progress-circle"
                style="--progress: {{ $profilePercentage }}%;"
            >
                <span class="progress-number">
                    {{ $profilePercentage }}%
                </span>
            </div>

            <h3>Profile Completion</h3>

            <p>
                Complete your information and skills to improve
                your Swapify experience.
            </p>

        </div>

    </section>

    <section class="stats-grid">

        <a href="{{ route('profile.setup') }}" class="stat-card">

    <div class="stat-icon">
        🧑‍🏫
    </div>

    <div class="stat-details">
        <h3>{{ count($teachSkills) }}</h3>
        <p>Skills Offered</p>
    </div>

</a>

<a href="{{ route('profile.setup') }}" class="stat-card">

    <div class="stat-icon">
        📚
    </div>

    <div class="stat-details">
        <h3>{{ count($learnSkills) }}</h3>
        <p>Skills Learning</p>
    </div>

</a>

        <div class="stat-card">

            <div class="stat-icon">
                🪙
            </div>

            <div class="stat-details">
                <h3>{{ $skillCredits }}</h3>
                <p>Skill Credits</p>
            </div>

        </div>

    </section>

    <div class="section-heading-row">

        <h2 class="section-title">
            Quick Actions
        </h2>

    </div>

    <section class="action-grid">

        <article class="action-card">

            <div class="action-icon">
                🔍
            </div>

            <h3>Find Skills</h3>

            <p>
                Search for Swapify members who can teach the
                skills you want to learn.
            </p>

            <a href="{{ route('matches') }}" class="action-button">
    Find Matches
</a>

        </article>

        <article class="action-card">

            <div class="action-icon">
                ➕
            </div>

            <h3>Add Skills</h3>

            <p>
                Add or update the skills that you can teach
                and want to learn.
            </p>

            <a
                href="{{ route('profile.setup') }}"
                class="action-button"
            >
                Add Skills
            </a>

        </article>

        <article class="action-card">

            <div class="action-icon">
                💬
            </div>

            <h3>Messages</h3>

            <p>
                Talk with other members and arrange your
                skill exchange sessions.
            </p>

            <a href="#" class="action-button">
                Open Messages
            </a>

        </article>

        <article class="action-card">

            <div class="action-icon">
                🎥
            </div>

            <h3>Video Classes</h3>

            <p>
                Join live skill classes or watch available
                recorded learning videos.
            </p>

            <a href="#" class="action-button">
                View Classes
            </a>

        </article>

    </section>

    <div class="section-heading-row">

        <h2 class="section-title">
            My Skills
        </h2>

        <a
            href="{{ route('profile.setup') }}"
            class="view-all-link"
        >
            Edit Skills
        </a>

    </div>

    <section class="skills-grid">

        <article class="skills-card">

            <div class="skills-card-header">

                <div class="icon">
                    🧑‍🏫
                </div>

                <h3>
                    Skills I Can Teach
                </h3>

            </div>

            <div class="skill-list">

                @forelse ($teachSkills as $skill)

                    <span class="skill-tag">
                        {{ $skill }}
                    </span>

                @empty

                    <div class="empty-skills">
                        You have not added any teaching skills yet.
                        <br>

                        <a href="{{ route('profile.setup') }}">
                            Add a teaching skill
                        </a>
                    </div>

                @endforelse

            </div>

        </article>

        <article class="skills-card">

            <div class="skills-card-header">

                <div class="icon">
                    📖
                </div>

                <h3>
                    Skills I Want to Learn
                </h3>

            </div>

            <div class="skill-list">

                @forelse ($learnSkills as $skill)

                    <span class="skill-tag learning-tag">
                        {{ $skill }}
                    </span>

                @empty

                    <div class="empty-skills">
                        You have not added any learning skills yet.
                        <br>

                        <a href="{{ route('profile.setup') }}">
                            Add a learning skill
                        </a>
                    </div>

                @endforelse

            </div>

        </article>

    </section>

</main>

<footer>
    © {{ date('Y') }} Swapify. Learn, Share and Grow Together.
</footer>

</body>
</html>