<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calendar | Swapify</title>
</head>

<body>
    <h1>Swapify Class Calendar</h1>

    <p>The calendar page is connected successfully.</p>

    <p>Available users: {{ $users->count() }}</p>

    <p>Your sessions: {{ $sessions->count() }}</p>
</body>
</html>