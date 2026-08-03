<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Skill Matches | Swapify</title>

<style>

:root{
    --sage:#C9DDC3;
    --woodland:#455947;
    --vanilla:#D4BDA1;
    --russet:#864622;
    --cream:#F8F2E9;
    --white:#ffffff;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:var(--cream);
}

.navbar{
    background:var(--woodland);
    color:white;
    padding:18px 8%;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.logo{
    color:white;
    font-size:30px;
    font-weight:bold;
    text-decoration:none;
}

.back{
    color:white;
    text-decoration:none;
    border:1px solid white;
    padding:10px 18px;
    border-radius:25px;
}

.container{
    width:90%;
    max-width:1100px;
    margin:40px auto;
}

.title{
    font-size:38px;
    color:var(--woodland);
    margin-bottom:30px;
}

.card{
    background:white;
    border-radius:20px;
    padding:25px;
    margin-bottom:25px;
    box-shadow:0 10px 20px rgba(0,0,0,.08);
}

.card h2{
    color:var(--woodland);
    margin-bottom:10px;
}

.badge{
    display:inline-block;
    background:var(--sage);
    color:var(--woodland);
    padding:8px 15px;
    border-radius:20px;
    margin:5px;
    font-weight:bold;
}

.learn{
    background:var(--vanilla);
}

button{
    margin-top:20px;
    border:none;
    background:var(--russet);
    color:white;
    padding:12px 25px;
    border-radius:25px;
    cursor:pointer;
    font-size:15px;
}

.empty{
    background:white;
    padding:40px;
    border-radius:20px;
    text-align:center;
    font-size:20px;
}

</style>

</head>
<body>

<div class="navbar">

<a href="{{ route('dashboard') }}" class="logo">
Swapify
</a>

<a href="{{ route('dashboard') }}" class="back">
← Dashboard
</a>

</div>

<div class="container">

<h1 class="title">My Skill Matches</h1>

@forelse($matches as $match)

<div class="card">

<h2>{{ $match->user->name }}</h2>

<p><strong>Email:</strong> {{ $match->user->email }}</p>

<br>

<h3>Can Teach</h3>

@foreach($match->skills_to_teach ?? [] as $skill)

<span class="badge">{{ $skill }}</span>

@endforeach

<br><br>

<h3>Wants To Learn</h3>

@foreach($match->skills_to_learn ?? [] as $skill)

<span class="badge learn">{{ $skill }}</span>

@endforeach

<br>

<button>
Send Skill Request
</button>

</div>

@empty

<div class="empty">

No matching users found.

</div>

@endforelse

</div>

</body>
</html>