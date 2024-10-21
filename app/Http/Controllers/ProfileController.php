<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        // Get the authenticated user's data
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validate and update the user's profile
        $request->validate([
            'name' => 'required|string|max:255',
            'old_password' => 'nullable|string|min:8', // Validate old password if provided
            'password' => 'nullable|string|min:8|confirmed', // Validate new password if provided
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        // Check if the user wants to change the password
        if ($request->filled('password')) {
            // Verify the old password
            if (!Hash::check($request->old_password, $user->password)) {
                return back()->withErrors(['old_password' => 'The old password is incorrect.']);
            }
            // Set the new password
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
