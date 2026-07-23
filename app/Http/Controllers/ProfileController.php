<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('profile.edit', ['user' => auth()->user()]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $data = $request->validate([
            'nom' => 'required|string|max:120',
            'telephone' => 'required|string|unique:users,telephone,' . $user->id,
            'email' => 'nullable|email|unique:users,email,' . $user->id,
        ]);
        $user->update($data);
        return back()->with('success', 'Profil mis à jour.');
    }

    public function password(Request $request)
    {
        $data = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);
        auth()->user()->update(['password' => Hash::make($data['password'])]);
        return back()->with('success', 'Mot de passe mis à jour.');
    }
}
