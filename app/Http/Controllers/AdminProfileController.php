<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminProfileController extends Controller
{
    // Display the profile edit form
    public function edit()
    {
        $user = Auth::guard('admin')->user();  // Get the authenticated user
        // Check if the user is authenticated
        return view('admin.setting', compact('user'));
    }

    public function update(Request $request)
    {
        $user = User::findOrFail(Auth::guard('admin')->user()->id);

        // Validation rules
        $rules = [
            'name' => 'required|string|max:255',  // Allow name to be updated
            'current_password' => 'required',  // Ensure current password is provided
            'password' => 'nullable|min:5|confirmed',  // New password is optional
        ];

        // Validate the input
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->route('profile.edit', $user->id)
                ->withInput()
                ->withErrors($validator);
        }

        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()
                ->route('profile.edit', $user->id)
                ->withErrors(['current_password' => 'The current password is incorrect.'])
                ->withInput();
        }

        // Update the name
        $user->name = $request->name;

        // Only update the password if the new one is provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        // Save the user
        $user->save();

        return redirect()
            ->route('admin.dashboard')
            ->with('success', 'Profile updated successfully.');
    }
}
