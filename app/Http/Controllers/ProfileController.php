<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('dashboard.profile');
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . auth()->id(),
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);

        // Auth::user()->picture->update($validated);
        Auth::user()->update($validated);

        return back()->with('success', 'Profile updated successfully!');
    }

    public function updatePicture(Request $request)
    {
        $request->validate([
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('picture', 'public');

            // Delete old picture if exists
            if (Auth::user()->picture) {
                Storage::disk('public')->delete(Auth::user()->picture);
            }

            Auth::user()->picture->update(['picture' => $path]);
            return back()->with('success', 'Profile picture updated successfully!');
        }

        return back()->with('error', 'No image uploaded.');
    }
}
