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
body{
    background:#F8F2E9;
    font-family:Arial,Helvetica,sans-serif;
}

.review-container{
    max-width:850px;
    margin:40px auto;
    background:#fff;
    padding:35px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

.back-btn{
    display:inline-block;
    margin-bottom:25px;
    background:#455947;
    color:#fff;
    padding:10px 20px;
    border-radius:10px;
    text-decoration:none;
    font-weight:bold;
}

.review-title{
    color:#455947;
    font-size:32px;
    margin-bottom:25px;
}

.average-box{
    background:#C9DDC3;
    padding:18px;
    border-radius:15px;
    text-align:center;
    margin-bottom:25px;
}

.average-box h2{
    color:#455947;
    margin:0;
}

.average-box p{
    color:#864622;
    font-size:26px;
    font-weight:bold;
    margin-top:8px;
}

.review-form label{
    display:block;
    margin-bottom:8px;
    font-weight:bold;
    color:#455947;
}

.review-form select,
.review-form textarea{
    width:100%;
    padding:14px;
    border:1px solid #ddd;
    border-radius:10px;
    margin-bottom:20px;
    font-size:15px;
}

.review-form textarea{
    height:130px;
    resize:none;
}

.submit-btn{
    background:#864622;
    color:#fff;
    border:none;
    padding:13px 30px;
    border-radius:10px;
    cursor:pointer;
    font-weight:bold;
    font-size:16px;
}

.submit-btn:hover{
    background:#455947;
}

.review-card{
    margin-top:25px;
    padding:20px;
    border-radius:15px;
    background:#F8F2E9;
    border-left:6px solid #864622;
}

.review-card h4{
    color:#455947;
    margin-bottom:8px;
}

.review-card p{
    color:#555;
    margin:8px 0;
}

.review-stars{
    color:#f4b400;
    font-size:18px;
}

</style>

</head>

<body>

<div class="review-container">

<a href="{{ url()->previous() }}" class="back-btn">
 Back
</a>

<h1 class="review-title">
{{ $user->name }} Reviews
</h1>

<div class="average-box">
    <h2>Average Rating</h2>
    <p>
        ⭐ {{ number_format($averageRating,1) }}/5
    </p>
</div>
@if(session('success'))
<div class="card" style="background:#d4edda;">
    {{ session('success') }}
</div>
@endif

@if($showForm)

<form method="POST"
      action="{{ route('reviews.store',$user->id) }}"
      class="review-form">

@csrf

<label>Rating</label>

<select name="rating" required>
    <option value="">Select Rating</option>
    <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
    <option value="4">⭐⭐⭐⭐ Good</option>
    <option value="3">⭐⭐⭐ Average</option>
    <option value="2">⭐⭐ Poor</option>
    <option value="1">⭐ Bad</option>
</select>

<label>Review</label>

<textarea
name="review"
placeholder="Write your experience..."
required></textarea>

<button type="submit" class="submit-btn">
⭐ Submit Review
</button>

</form>

@endif

<hr style="margin:35px 0;">

@forelse($review as $review)

<div class="review-card">

<h4>{{ $review->reviewer->name }}</h4>

<div class="review-stars">
{{ str_repeat('⭐',$review->rating) }}
</div>

<p>
{{ $review->review }}
</p>

<small style="color:gray;">
{{ $review->created_at->format('d M Y') }}
</small>

</div>

@empty

<div class="review-card">
No reviews yet.
</div>

@endforelse

</div>

</body>

</html>