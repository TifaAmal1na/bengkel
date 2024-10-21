<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            // add other validation rules as needed
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        // Update other fields as needed
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }
}
