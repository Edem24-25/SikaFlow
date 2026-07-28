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

        // Generate random 6-digit OTP code
        $code = str_pad((string) random_int(100000, 999999), 6, '0', STR_PAD_LEFT);

        $user = User::create([
            'nom' => $data['nom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'status' => 'actif',
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Auth::login($user);

        // Send SMS with OTP
        $message = "SikaFlow : Votre code de verification est {$code}. Valable 10 minutes.";
        \App\Services\AfricaTalkingSms::send($user->telephone, $message);

        return redirect()->route('verification.notice')->with('success', 'Un code de vérification vous a été envoyé par SMS.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
