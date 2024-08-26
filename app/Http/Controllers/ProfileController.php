<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the user's profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        return view('settings', compact('user'));
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email',
            'profession' => 'required|string|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:102400',
        ]);

        // Get the authenticated user
        $user = Auth::user();

        // Handle the profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete the old profile picture if it exists
            if ($user->profile_picture) {
                Storage::disk('public')->delete($user->profile_picture);
            }

            // Store the new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $validatedData['profile_picture'] = $path;
        }

        // Update the user's information
        try {
            $user->update($validatedData);
            return redirect()->back()->with('success', 'Profile updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the profile.');
        }
    }

    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
            'new_password_confirmation' => 'required|string|min:8',
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the current password matches the one stored in the database
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Failed to change password: the current password is incorrect.');
        }
    
        // Check if the new password and confirmation match
        if ($request->new_password !== $request->new_password_confirmation) {
            return redirect()->back()->with('error', 'Failed to change password: the new passwords do not match.');
        }
    
        // Update the user's password
        try {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->back()->with('success', 'Password updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while updating the password.');
        }
    }
}