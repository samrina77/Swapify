<?php

namespace App\Http\Controllers;

use App\Models\User;

class ReviewController extends Controller
{
    public function index(User $user)
    {
        $reviews = $user->reviewsReceived()
            ->with('reviewer')
            ->latest()
            ->get();

        $averageRating = round(
            $user->reviewsReceived()->avg('rating'),
            1
        );

        return view('reviews', compact(
            'user',
            'reviews',
            'averageRating'
        ));
    }
}