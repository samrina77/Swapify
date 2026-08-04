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
.info-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
    margin:20px 0;
}

.info-box{
    background:#F8F2E9;
    border:1px solid #C9DDC3;
    border-radius:12px;
    padding:14px;
}

.info-box strong{
    display:block;
    color:#455947;
    margin-bottom:6px;
    font-size:14px;
}

.bio-box{
    grid-column:1 / -1;
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
 Dashboard
</a>

</div>

<div class="container">

<h1 class="title">My Skill Matches</h1>

@forelse($matches as $match)

<div class="card">
<div style="text-align:center; margin-bottom:20px;">

@if($match->profile_picture)

<img src="{{ Storage::url($match->profile_picture) }}"
     style="
     width:120px;
     height:120px;
     border-radius:50%;
     object-fit:cover;
     border:4px solid #C9DDC3;">

@else

<div style="
width:120px;
height:120px;
margin:auto;
border-radius:50%;
background:#C9DDC3;
display:flex;
align-items:center;
justify-content:center;
font-size:40px;
font-weight:bold;
color:#455947;">

{{ strtoupper(substr($match->user->name,0,1)) }}

</div>

@endif

</div>
<h2>{{ $match->user->name }}</h2>

<a href="{{ route('reviews', $match->user->id) }}">
    Reviews ⭐
</a>
@php

$rating = round(
$match->user->reviewsReceived->avg('rating'),
1
);

$totalReviews =
$match->user->reviewsReceived->count();

@endphp

<p>

⭐

{{ $rating ?: '0.0' }}

({{ $totalReviews }} Reviews)

</p>
<div class="info-grid">

    <div class="info-box">
        <strong>📧 Email</strong>
        {{ $match->user->email }}
    </div>

    <div class="info-box">
        <strong>📱 Contact</strong>
        {{ $match->contact }}
    </div>

    <div class="info-box">
        <strong>👤 Gender</strong>
        {{ $match->gender ?? 'Not Provided' }}
    </div>

    <div class="info-box">
        <strong>📍 Address</strong>
        {{ $match->ward }},
        {{ $match->municipality }},
        {{ $match->district }},
        {{ $match->province }}
    </div>

    <div class="info-box bio-box">
        <strong>📝 Bio</strong>
        {{ $match->bio ?? 'No bio available.' }}
    </div>

</div>

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

<a href="{{ route('messages.chat',$match->user->id) }}">

<button>

💬 Send Message

</button>

</a>
</div>

@empty

<div class="empty">

No matching users found.

</div>

@endforelse

</div>

</body>
</html>