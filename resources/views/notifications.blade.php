<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

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

        /* Main Content */

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

        /* Notification Card */

        .notification-card {
            background: white;
            border-radius: 18px;
            padding: 22px;

            box-shadow:
                0 10px 25px rgba(59, 51, 48, 0.12);

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

        /* Request Information */

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

        /* Actions */

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

        .read-button:hover {
            background: #344536;
        }

        /* Delete Button */

        .delete-form {
            display: inline-block;
            margin: 0;
        }

        .delete-btn {
            background: var(--russet);
            color: white;

            border: none;

            padding: 11px 20px;
            border-radius: 10px;

            font-size: 14px;
            font-weight: 600;

            cursor: pointer;
            transition: 0.3s ease;
        }

        .delete-btn:hover {
            background: #6d3519;
            transform: translateY(-2px);

            box-shadow:
                0 5px 12px rgba(134, 70, 34, 0.25);
        }

        .delete-btn:active {
            transform: translateY(0);
        }

        /* Empty Notifications */

        .empty-box {
            background: white;

            padding: 60px 20px;
            border-radius: 18px;

            text-align: center;

            box-shadow:
                0 10px 25px rgba(59, 51, 48, 0.12);
        }

        .empty-box h2 {
            color: var(--woodland);
            margin-bottom: 8px;
        }

        /* Success Message */

        .success-message {
            background: #dff0d8;
            color: var(--woodland);

            padding: 13px;
            border-radius: 10px;

            margin-bottom: 20px;
        }

        /* Mobile */

        @media (max-width: 760px) {
            .navbar {
                padding: 16px 5%;
            }

            .logo {
                font-size: 25px;
            }

            .back {
                padding: 9px 15px;
                font-size: 14px;
            }

            .container {
                width: 92%;
                margin: 30px auto;
            }

            .page-title {
                font-size: 30px;
            }

            .request-details {
                grid-template-columns: 1fr;
            }

            .notes {
                grid-column: auto;
            }

            .notification-header {
                flex-direction: column;
            }

            .actions {
                justify-content: flex-start;
                flex-wrap: wrap;
            }
        }
        .approve-button {
    background: #455947;
    color: white;
}

.approve-button:hover {
    background: #344436;
}
    </style>
</head>

<body>

    <!-- Navbar -->

    <div class="navbar">

        <a href="{{ route('dashboard') }}"
           class="logo">
            Swapify
        </a>

        <a href="{{ route('dashboard') }}"
           class="back">
            Dashboard
        </a>

    </div>

    <!-- Main Content -->

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
                    $data = is_array($notification->data)
                        ? $notification->data
                        : json_decode(
                            $notification->data,
                            true
                        );
                @endphp

                <div class="notification-card
                    {{ is_null($notification->read_at)
                        ? 'unread'
                        : '' }}">

                    <div class="notification-header">

                        <div>

                            <h3>
                                {{ $data['student_name']
                                    ?? 'Swapify User' }}
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

                            {{ $data['skill']
                                ?? 'Not provided' }}

                        </div>

                        <div class="detail">

                            <strong>Date and Time:</strong>

                            @if(!empty($data['date_time']))

                                {{ \Carbon\Carbon::parse(
                                    $data['date_time']
                                )->format(
                                    'M d, Y · h:i A'
                                ) }}

                            @else

                                Not provided

                            @endif

                        </div>

                        <div class="detail">

                            <strong>Duration:</strong>

                            {{ $data['duration']
                                ?? 'Not provided' }}

                        </div>

                        <div class="detail">

                            <strong>Class Type:</strong>

                            {{ $data['class_type']
                                ?? 'Not provided' }}

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
                        @php
    $data = is_array($notification->data)
        ? $notification->data
        : json_decode($notification->data, true);
@endphp

@if(
    isset($data['schedule_id']) &&
    ($data['status'] ?? '') === 'pending'
)
    <form
        action="{{ route('schedule.approve', [
            'scheduleId' => $data['schedule_id'],
            'notificationId' => $notification->id
        ]) }}"
        method="POST"
    >
        @csrf

        <button
            type="submit"
            class="action-button approve-button"
        >
            Approve
        </button>
    </form>
@endif

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
                            class="delete-form"
                            onsubmit="return confirm(
                                'Are you sure you want to delete this notification?'
                            )"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @empty

                <div class="empty-box">

                    <h2>
                        No notifications yet
                    </h2>

                    <p>
                        New schedule requests will appear here.
                    </p>

                </div>

            @endforelse

        </div>

    </main>

</body>
</html>