<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit(Request $request)
    {
        $user = $request->user();

        $profile = Profile::where('user_id', $user->id)->first();

        return view('complete-profile', compact('user', 'profile'));
    }

    public function update(Request $request)
    {
        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Validate profile information
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],

            'contact' => [
                'required',
                'string',
                'max:30',
            ],

            'gender' => [
                'nullable',
                'string',
                'max:30',
            ],

            'bio' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'profile_picture' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:2048',
            ],

            'province' => [
                'required',
                'string',
                'max:100',
            ],

            'district' => [
                'required',
                'string',
                'max:100',
            ],

            'municipality' => [
                'required',
                'string',
                'max:150',
            ],

            'ward' => [
                'required',
                'string',
                'max:20',
            ],

            'skills_to_teach' => [
                'nullable',
                'array',
            ],

            'skills_to_teach.*' => [
                'string',
                'max:100',
            ],

            'skills_to_learn' => [
                'nullable',
                'array',
            ],

            'skills_to_learn.*' => [
                'string',
                'max:100',
            ],

            'certificate' => [
                'nullable',
                'file',
                'mimes:pdf,jpg,jpeg,png',
                'max:5120',
            ],

            'portfolio' => [
                'nullable',
                'file',
                'mimes:pdf,zip,jpg,jpeg,png',
                'max:10240',
            ],

            'portfolio_link' => [
                'nullable',
                'url',
                'max:500',
            ],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Update user account
        |--------------------------------------------------------------------------
        */

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        /*
        |--------------------------------------------------------------------------
        | Get current profile
        |--------------------------------------------------------------------------
        */

        $currentProfile = Profile::where('user_id', $user->id)->first();

        /*
        |--------------------------------------------------------------------------
        | Save profile picture
        |--------------------------------------------------------------------------
        */

        $profilePicture = $currentProfile?->profile_picture;

        if ($request->hasFile('profile_picture')) {
            if ($profilePicture) {
                Storage::disk('public')->delete($profilePicture);
            }

            $profilePicture = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Save certificate
        |--------------------------------------------------------------------------
        */

        $certificate = $currentProfile?->certificate;

        if ($request->hasFile('certificate')) {
            if ($certificate) {
                Storage::disk('public')->delete($certificate);
            }

            $certificate = $request
                ->file('certificate')
                ->store('certificates', 'public');
        }

        /*
        |--------------------------------------------------------------------------
        | Save portfolio
        |--------------------------------------------------------------------------
        */

        $portfolio = $currentProfile?->portfolio;

        if ($request->hasFile('portfolio')) {
            if ($portfolio) {
                Storage::disk('public')->delete($portfolio);
            }

            $portfolio = $request
                ->file('portfolio')
                ->store('portfolios', 'public');
        }

        $portfolioLink = $validated['portfolio_link'] ?? null;

        /*
        |--------------------------------------------------------------------------
        | Verification status
        |--------------------------------------------------------------------------
        |
        | When a new certificate, portfolio or portfolio link is added or changed,
        | verification status becomes pending.
        |
        */

        $verificationStatus =
            $currentProfile?->verification_status ?? 'pending';

        $portfolioLinkChanged =
            ($currentProfile?->portfolio_link ?? null) !== $portfolioLink;

        if (
            $request->hasFile('certificate') ||
            $request->hasFile('portfolio') ||
            $portfolioLinkChanged
        ) {
            $verificationStatus = 'pending';
        }

        /*
        |--------------------------------------------------------------------------
        | Save profile
        |--------------------------------------------------------------------------
        */

        Profile::updateOrCreate(
            [
                'user_id' => $user->id,
            ],
            [
                'contact' => $validated['contact'],
                'gender' => $validated['gender'] ?? null,
                'bio' => $validated['bio'] ?? null,
                'profile_picture' => $profilePicture,

                'province' => $validated['province'],
                'district' => $validated['district'],
                'municipality' => $validated['municipality'],
                'ward' => $validated['ward'],

                'skills_to_teach' =>
                    $validated['skills_to_teach'] ?? [],

                'skills_to_learn' =>
                    $validated['skills_to_learn'] ?? [],

                'certificate' => $certificate,
                'portfolio' => $portfolio,
                'portfolio_link' => $portfolioLink,
                'verification_status' => $verificationStatus,
            ]
        );

        return redirect()
            ->route('dashboard')
            ->with('success', 'Profile saved successfully!');
    }

    public function findMatches()
    {
        $myProfile = auth()->user()->profile;

        if (!$myProfile) {
            return redirect()
                ->route('profile.setup')
                ->with(
                    'error',
                    'Please complete your profile first.'
                );
        }

        $myTeach = $myProfile->skills_to_teach ?? [];
        $myLearn = $myProfile->skills_to_learn ?? [];

        $matches = Profile::with([
            'user',
            'user.reviewsReceived',
        ])
            ->where('user_id', '!=', auth()->id())
            ->get()
            ->filter(function ($profile) use ($myTeach, $myLearn) {
                $teachMatch = array_intersect(
                    $myLearn,
                    $profile->skills_to_teach ?? []
                );

                $learnMatch = array_intersect(
                    $myTeach,
                    $profile->skills_to_learn ?? []
                );

                return count($teachMatch) > 0 ||
                    count($learnMatch) > 0;
            });

        return view('matches', compact('matches'));
    }

    public function viewProfile($id)
    {
        $match = Profile::with([
            'user',
            'user.reviewsReceived',
        ])
            ->where('user_id', $id)
            ->firstOrFail();

        $matches = collect([$match]);

        return view('matches', compact('matches'));
    }
}