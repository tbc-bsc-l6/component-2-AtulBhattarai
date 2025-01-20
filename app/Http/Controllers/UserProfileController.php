<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserProfileController extends Controller
{
    // Display the profile edit form
    public function edit()
    {
        $user = Auth::user();  // Get the authenticated user
        return view('setting', compact('user'));
    }

    // Update profile (name and/or password)
    public function update(Request $request)
    {
        $user = Auth::user(); // Get the authenticated user

        // Validation rules
        $rules = [
            'name' => 'required|string|max:255', // Validation rule for name
            'current_password' => 'required', // Current password for verification
            'password' => 'nullable|min:5|confirmed', // Validation rule for new password (nullable)
        ];

        // Validate the input
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('userprofile.edit')
                ->withInput()
                ->withErrors($validator);
        }

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->route('userprofile.edit')
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        // Update name if changed
        $user->name = $request->name;

        // Update the password if a new password is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save(); // Save the changes

        return redirect()
            ->route('home')
            ->with('success', 'Profile updated successfully.');
    }
}
