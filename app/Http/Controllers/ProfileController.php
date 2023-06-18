<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use PhpParser\Node\Stmt\Return_;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $currentProfilePic = Auth::user()->profile_pic;
        if (!is_null($currentProfilePic)) {
            Storage::disk('public')->delete($currentProfilePic);
        }
        if ($request->hasFile('profile_picture')) {
            $profilePicture = $request->file('profile_picture');
            $imagePath = $profilePicture->store('images/profile_pictures', 'public');

            $request->user()->profile_pic = $imagePath;
        }
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function dompet()
    {
        return view('isi-dompet');
    }
    public function isiDompet(Request $request)
    {
        $user = auth()->user();
        $user->increment('balance', $request->uang);
        $user->save();
        return redirect()->route('dashboard');
    }
}
