<!DOCTYPE html>
<html>

<head>

<title>Reviews</title>

<style>

body{

font-family:Arial;

background:#F8F2E9;

padding:40px;

}

.card{

background:white;

padding:25px;

margin-bottom:20px;

border-radius:15px;

box-shadow:0 5px 15px rgba(0,0,0,.1);

}

h1{

color:#455947;

}

.rating{

font-size:22px;

color:#f5b301;

margin-bottom:25px;

}

.review{

margin-top:10px;

line-height:1.6;

}

.name{

font-weight:bold;

font-size:18px;

color:#455947;

}

.date{

color:gray;

font-size:13px;

margin-top:8px;

}

.back{

display:inline-block;

margin-bottom:25px;

text-decoration:none;

background:#455947;

color:white;

padding:10px 20px;

border-radius:10px;

}

</style>

</head>

<body>

<a href="{{ url()->previous() }}" class="back">

Back

</a>

<h1>

{{ $user->name }}

Reviews

</h1>

<div class="rating">

⭐ Average Rating:

{{ $averageRating ?: '0.0' }}/5

</div>
@if(session('success'))
<div class="card" style="background:#d4edda;">
    {{ session('success') }}
</div>
@endif

<form method="POST" action="{{ route('reviews.store', $user->id) }}">

    @csrf

    <label>Rating</label>

    <select name="rating">
        <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
        <option value="4">⭐⭐⭐⭐ Good</option>
        <option value="3">⭐⭐⭐ Average</option>
        <option value="2">⭐⭐ Poor</option>
        <option value="1">⭐ Bad</option>
    </select>

    <br><br>

    <label>Review</label>

    <textarea
        name="review"
        rows="5"
        style="width:100%;padding:10px;"
        placeholder="Write your experience..."
    ></textarea>

    <br><br>

    <button type="submit">
        Submit Review
    </button>

</form>

<hr style="margin:30px 0;">

@forelse($review as $review)

<div class="card">

<div class="name">

{{ $review->reviewer->name }}

</div>

<div style="color:#f5b301;">

{{ str_repeat('⭐',$review->rating) }}

</div>

<div class="review">

{{ $review->review }}

</div>

<div class="date">

{{ $review->created_at->format('d M Y') }}

</div>

</div>

@empty

<div class="card">

No review yet.

</div>

@endforelse

</body>

</html>