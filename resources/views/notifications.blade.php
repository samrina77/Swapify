<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Notifications | Swapify</title>

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
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(
                135deg,
                var(--sage),
                var(--cream),
                var(--vanilla)
            );
            color: var(--coffee);
        }

        .navbar {
            background: var(--woodland);
            padding: 18px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .brand {
            color: white;
            font-size: 32px;
            font-weight: bold;
            text-decoration: none;
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

        .nav-links .active {
            color: var(--deer);
            border-bottom: 3px solid var(--deer);
            padding-bottom: 7px;
        }

        .logout-button {
            border: 1px solid white;
            background: transparent;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

        .container {
            width: min(900px, 92%);
            margin: 45px auto;
        }

        .page-title {
            color: var(--woodland);
            font-size: 35px;
            margin-bottom: 8px;
        }

        .page-description {
            color: #675f5a;
            margin-bottom: 25px;
        }

        .notification-list {
            display: grid;
            gap: 18px;
        }

        .notification-card {
            background: white;
            border-radius: 18px;
            padding: 22px;
            box-shadow: 0 10px 25px rgba(59, 51, 48, 0.12);
            border-left: 6px solid transparent;
        }

        .notification-card.unread {
            border-left-color: var(--russet);
        }

        .notification-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            gap: 15px;
        }

        .notification-header h3 {
            color: var(--woodland);
            margin-bottom: 6px;
        }

        .new-badge {
            background: var(--russet);
            color: white;
            font-size: 11px;
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .message {
            color: #625a55;
            line-height: 1.5;
        }

        .request-details {
            margin-top: 17px;
            padding: 16px;
            background: var(--cream);
            border-radius: 12px;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        .detail {
            font-size: 14px;
            color: #625a55;
        }

        .detail strong {
            color: var(--coffee);
        }

        .notes {
            grid-column: 1 / -1;
        }

        .notification-time {
            display: block;
            margin-top: 14px;
            color: #8b817b;
            font-size: 12px;
        }

        .actions {
            margin-top: 17px;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .action-button {
            border: none;
            border-radius: 9px;
            padding: 10px 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .read-button {
            background: var(--woodland);
            color: white;
        }

        .delete-button {
            background: #f5dddd;
            color: #8b3030;
        }

        .empty-box {
            background: white;
            padding: 60px 20px;
            border-radius: 18px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(59, 51, 48, 0.12);
        }

        .empty-box h2 {
            color: var(--woodland);
            margin-bottom: 8px;
        }

        .success-message {
            background: #dff0d8;
            color: var(--woodland);
            padding: 13px;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        @media (max-width: 760px) {
            .navbar {
                flex-direction: column;
                gap: 17px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 14px;
            }

            .request-details {
                grid-template-columns: 1fr;
            }

            .notes {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

<nav class="navbar">

    <a href="{{ route('dashboard') }}" class="brand">
        Swapify
    </a>

    <div class="nav-links">

        <a href="{{ route('dashboard') }}">
            Home
        </a>

        <a href="#">
            Find Skills
        </a>

        <a href="#">
            Messages
        </a>

        <a
            href="{{ route('notifications.index') }}"
            class="active"
        >
            Notifications
        </a>

        <span style="color: white;">
            {{ auth()->user()->name }}
        </span>

        <form action="{{ route('logout') }}" method="POST">
            @csrf

            <button type="submit" class="logout-button">
                Logout
            </button>
        </form>

    </div>

</nav>

<main class="container">

    <h1 class="page-title">
        Notifications
    </h1>

    <p class="page-description">
        Schedule requests sent to you will appear here.
    </p>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <div class="notification-list">

        @forelse($notifications as $notification)

            @php
                $data = json_decode($notification->data, true);
            @endphp

            <div class="notification-card
                {{ is_null($notification->read_at) ? 'unread' : '' }}">

                <div class="notification-header">

                    <div>
                        <h3>
                            {{ $data['student_name'] ?? 'Swapify User' }}
                        </h3>

                        <p class="message">
                            {{ $data['message']
                                ?? 'Sent you a schedule request.' }}
                        </p>
                    </div>

                    @if(is_null($notification->read_at))
                        <span class="new-badge">
                            NEW
                        </span>
                    @endif

                </div>

                <div class="request-details">

                    <div class="detail">
                        <strong>Skill:</strong>

                        {{ $data['skill'] ?? 'Not provided' }}
                    </div>

                    <div class="detail">
                        <strong>Date and Time:</strong>

                        @if(!empty($data['date_time']))
                            {{ \Carbon\Carbon::parse(
                                $data['date_time']
                            )->format('M d, Y · h:i A') }}
                        @else
                            Not provided
                        @endif
                    </div>

                    <div class="detail">
                        <strong>Duration:</strong>

                        {{ $data['duration'] ?? 'Not provided' }}
                    </div>

                    <div class="detail">
                        <strong>Class Type:</strong>

                        {{ $data['class_type'] ?? 'Not provided' }}
                    </div>

                    @if(!empty($data['notes']))
                        <div class="detail notes">
                            <strong>Notes:</strong>

                            {{ $data['notes'] }}
                        </div>
                    @endif

                </div>

                <span class="notification-time">
                    Received
                    {{ \Carbon\Carbon::parse(
                        $notification->created_at
                    )->diffForHumans() }}
                </span>

                <div class="actions">

                    @if(is_null($notification->read_at))
                        <form
                            action="{{ route(
                                'notifications.read',
                                $notification->id
                            ) }}"
                            method="POST"
                        >
                            @csrf

                            <button
                                type="submit"
                                class="action-button read-button"
                            >
                                Mark as Read
                            </button>
                        </form>
                    @endif

                    <form
                        action="{{ route(
                            'notifications.delete',
                            $notification->id
                        ) }}"
                        method="POST"
                    >
                        @csrf
                        @method('DELETE')

                        <button
                            type="submit"
                            class="action-button delete-button"
                        >
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        @empty

            <div class="empty-box">
                <h2>No notifications yet</h2>

                <p>
                    New schedule requests will appear here.
                </p>
            </div>

        @endforelse

    </div>

</main>

</body>
</html>