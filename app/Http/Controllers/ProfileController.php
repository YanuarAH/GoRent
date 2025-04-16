<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        $user = $request->user();

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($user->role !== 'admin' && $request->hasAny(['name','nik', 'phone', 'address', 'gender'])) {
            $request->validate([
                'name'=> 'nullable|string|max:255',
                'nik' => 'nullable|string|unique:customers,nik,' . $user->id . ',user_id',
                'phone' => 'nullable|string|max:15',
                'address' => 'nullable|string',
                'gender' => 'nullable|in:male,female',
            ]);

            if (!$user->customer) {
                $user->customer()->create([
                    'name' => $request->name,
                    'nik' => $request->nik,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'gender' => $request->gender,
                ]);
            } else {
                $user->customer->update([
                    'name' => $request->name,
                    'nik' => $request->nik,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'gender' => $request->gender,
                ]);
            }
        }

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
}
