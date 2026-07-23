<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'telephone' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($data, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('dashboard'));
        }

        return back()->withErrors(['telephone' => 'Identifiants invalides.'])->onlyInput('telephone');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|max:120',
            'telephone' => 'required|string|unique:users,telephone',
            'email' => 'nullable|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'nom' => $data['nom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'status' => 'actif',
        ]);

        Auth::login($user);

        return redirect()->route('dashboard')->with('success', 'Bienvenue sur SikaFlow !');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
