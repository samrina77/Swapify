<!DOCTYPE html>
<html>
<head>
    <title>{{ $user->name }} Reviews</title>

    <style>
        body{
            font-family: Arial;
            background:#F8F2E9;
            padding:40px;
        }

        .box{
            background:white;
            width:600px;
            margin:auto;
            padding:30px;
            border-radius:18px;
            box-shadow:0 8px 20px rgba(0,0,0,.1);
        }

        h2{
            color:#455947;
        }

        .review{
            border-bottom:1px solid #ddd;
            padding:15px 0;
        }

        .stars{
            color:#864622;
            font-size:20px;
        }
    </style>
</head>

<body>

<div class="box">

<h2>
{{ $user->name }}'s Reviews
</h2>

<h3>
Average Rating: ⭐ {{ $averageRating }}/5
</h3>


@forelse($reviews as $review)

<div class="review">

<h4>
{{ $review->reviewer->name }}
</h4>

<div class="stars">
{{ str_repeat('⭐', $review->rating) }}
</div>

<p>
{{ $review->review }}
</p>

</div>

@empty

<p>No reviews yet.</p>

@endforelse


</div>

</body>
</html>