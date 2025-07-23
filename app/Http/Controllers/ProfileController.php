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
    public function index()
{
    $user = auth()->user();
    return view('profile.index', compact('user'));
}

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }
//     use Illuminate\Support\Facades\Auth;

// public function edit()
// {
//     $user = Auth::user();
//     return view('profile.edit', compact('user'));
// }


    /**
     * Update the user's profile information.
     */
 

public function update(Request $request)
{
    $user = auth()->user();

    $data = $request->validate([
        'name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        'telephone' => 'nullable|string|max:20',
        'profile_photo' => 'nullable|image|max:2048',
    ]);

        if ($request->hasFile('profile_photo')) {
    $path = $request->file('profile_photo')->store('profile-photos', 'public');
    $data['profile_photo_path'] = $path;

}


    $user->update($data);

    return redirect()->route('profile.edit')->with('success', 'Profil mis à jour avec succès.');
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
