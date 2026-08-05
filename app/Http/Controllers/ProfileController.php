<?php

namespace App\Http\Controllers;


use App\Models\Profile;
use Illuminate\Http\Request;
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
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        $currentProfile = Profile::where('user_id', $user->id)->first();

        $profilePicture = $currentProfile?->profile_picture;

        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request
                ->file('profile_picture')
                ->store('profile-pictures', 'public');
        }

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
                'skills_to_teach' => $validated['skills_to_teach'] ?? [],
                'skills_to_learn' => $validated['skills_to_learn'] ?? [],
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
        return redirect()->route('profile.setup')
            ->with('error', 'Please complete your profile first.');
    }

    $myTeach = $myProfile->skills_to_teach ?? [];
    $myLearn = $myProfile->skills_to_learn ?? [];

    $matches = Profile::with([
'user',
'user.reviewsReceived'
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

            return count($teachMatch) > 0 || count($learnMatch) > 0;
        });

    return view('matches', compact('matches'));
}
public function viewProfile($id)
{
    $match = Profile::with([
        'user',
        'user.reviewsReceived'
    ])->where('user_id', $id)->firstOrFail();

    $matches = collect([$match]);

    return view('matches', compact('matches'));
}

}