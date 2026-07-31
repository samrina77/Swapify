<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Swapify Dashboard</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f6efed;
            color: #2d2d2d;
        }

        /* Navbar */

        .navbar {
            background: #527d7a;
            color: white;
            padding: 16px 6%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 600;
        }

        .profile-circle {
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: #e6c7bf;
            color: #754b40;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }

        /* Main area */

        .container {
            width: 90%;
            max-width: 1200px;
            margin: 35px auto;
        }

        .welcome-section {
            background: linear-gradient(135deg, #e6cbc5, #d9ebe7);
            padding: 35px;
            border-radius: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .welcome-section h1 {
            color: #684a42;
            margin-bottom: 10px;
            font-size: 34px;
        }

        .welcome-section p {
            color: #555;
            line-height: 1.6;
        }

        .edit-profile-btn {
            display: inline-block;
            margin-top: 18px;
            background: #527d7a;
            color: white;
            padding: 12px 22px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: bold;
        }

        /* Statistics */

        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-top: 30px;
        }

        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .stat-card h3 {
            font-size: 30px;
            color: #527d7a;
            margin-bottom: 8px;
        }

        .stat-card p {
            color: #666;
        }

        /* Sections */

        .section-title {
            margin: 35px 0 18px;
            color: #684a42;
            font-size: 25px;
        }

        .action-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .action-card {
            background: white;
            padding: 25px 18px;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            transition: 0.3s;
        }

        .action-card:hover {
            transform: translateY(-5px);
        }

        .action-icon {
            font-size: 38px;
            margin-bottom: 15px;
        }

        .action-card h3 {
            color: #527d7a;
            margin-bottom: 10px;
        }

        .action-card p {
            font-size: 14px;
            color: #666;
            line-height: 1.5;
        }

        .action-card a {
            display: inline-block;
            margin-top: 15px;
            background: #b66d58;
            color: white;
            padding: 9px 16px;
            border-radius: 8px;
            text-decoration: none;
        }

        /* Skills */

        .skills-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
        }

        .skills-card {
            background: white;
            padding: 25px;
            border-radius: 16px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .skills-card h3 {
            color: #684a42;
            margin-bottom: 18px;
        }

        .skill {
            background: #f2e2de;
            padding: 12px;
            margin-bottom: 10px;
            border-radius: 8px;
        }

        .learning {
            background: #dcece8;
        }

        footer {
            background: #527d7a;
            color: white;
            text-align: center;
            padding: 18px;
            margin-top: 50px;
        }

        @media (max-width: 900px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .action-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .skills-container {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 15px;
            }

            .welcome-section {
                padding: 25px;
            }

            .welcome-section h1 {
                font-size: 27px;
            }

            .action-grid {
                grid-template-columns: 1fr;
            }
        }
        .complete-profile-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 10px;

    margin-top: 25px;
    padding: 15px 30px;

    background: linear-gradient(
        135deg,
        #864622,
        #C78B53
    );

    color: white;
    text-decoration: none;

    font-size: 17px;
    font-weight: 700;

    border: 2px solid transparent;
    border-radius: 30px;

    box-shadow: 0 8px 20px rgba(134, 70, 34, 0.28);

    transition: all 0.25s ease;
}

.complete-profile-btn span {
    font-size: 21px;
    transition: transform 0.25s ease;
}

.complete-profile-btn:hover {
    background: #455947;
    color: white;

    border-color: #D4BDA1;

    transform: translateY(-3px);

    box-shadow: 0 12px 25px rgba(69, 89, 71, 0.32);
}

.complete-profile-btn:hover span {
    transform: translateX(5px);
}

.complete-profile-btn:active {
    transform: translateY(0);
}
        
    </style>
</head>

<body>

<nav class="navbar">

    <div class="logo">Swapify</div>

    <div class="nav-links">
        <a href="#">Home</a>
        <a href="#">Find Skills</a>
        <a href="#">Messages</a>
        <a href="#">Notifications</a>

        <div class="profile-circle">SS</div>
    </div>

</nav>

<main class="container">

    <section class="welcome-section">

        <div>
            <h1>Welcome to Swapify!</h1>

            <p>
                Share your skills, learn something new and connect with
                people who have similar interests.
            </p>

            <a href="{{ route('profile.setup') }}" class="complete-profile-btn">
                Complete Your Profile
                  <span>→</span>
             </a>
        </div>

    </section>

    <section class="stats">

        <div class="stat-card">
            <h3>0</h3>
            <p>Skills Offered</p>
        </div>

        <div class="stat-card">
            <h3>0</h3>
            <p>Skills Learning</p>
        </div>

        <div class="stat-card">
            <h3>100</h3>
            <p>Skill Credits</p>
        </div>

    </section>

    <h2 class="section-title">Quick Actions</h2>

    <section class="action-grid">

        <div class="action-card">
            <div class="action-icon">🔍</div>
            <h3>Find Skills</h3>
            <p>Search for people who can teach the skills you want.</p>
            <a href="#">Explore</a>
        </div>

        <div class="action-card">
            <div class="action-icon">➕</div>
            <h3>Add Skill</h3>
            <p>Add the skills that you can teach to other users.</p>
            <a href="#">Add Skill</a>
        </div>

        <div class="action-card">
            <div class="action-icon">💬</div>
            <h3>Messages</h3>
            <p>Talk with other users and arrange skill exchanges.</p>
            <a href="#">Open Messages</a>
        </div>

        <div class="action-card">
            <div class="action-icon">🎥</div>
            <h3>Video Classes</h3>
            <p>Join live classes or watch recorded learning videos.</p>
            <a href="#">View Classes</a>
        </div>

    </section>

    <h2 class="section-title">My Skills</h2>

    <section class="skills-container">

        <div class="skills-card">
            <h3>Skills I Can Teach</h3>

            <div class="skill">
                No skills added yet.
            </div>
        </div>

        <div class="skills-card">
            <h3>Skills I Want to Learn</h3>

            <div class="skill learning">
                No learning skills added yet.
            </div>
        </div>

    </section>

</main>

<footer>
    © {{ date('Y') }} Swapify. Learn, Share and Grow Together.
</footer>

</body>
</html>