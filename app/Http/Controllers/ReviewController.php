<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create(User $user)
{
    $review = $user->reviewsReceived()
        ->with('reviewer')
        ->latest()
        ->get();

    $averageRating = round(
        $user->reviewsReceived()->avg('rating'),
        1
    );

    return view('review', compact(
        'user',
        'review',
        'averageRating'
    ))->with('showForm', true);
}
   
    public function index(User $user)
    {
        $review = $user->reviewsReceived()
            ->with('reviewer')
            ->latest()
            ->get();

        $averageRating = round(
            $user->reviewsReceived()->avg('rating'),
            1
        );

        return view('review', compact(
            'user',
            'review',
            'averageRating'
        ))->with('showForm', false);
    }

    
    public function store(Request $request, User $user)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);

        Review::create([
            'reviewer_id' => auth()->id(),
            'reviewed_user_id' => $user->id,
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()
            ->route('reviews', $user->id)
            ->with('success', 'Review submitted successfully.');
    }
}