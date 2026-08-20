<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private function normalizeTelephone(string $value): string
    {
        $digits = preg_replace('/\D/', '', $value);

        if (preg_match('/^\+229\d{8}$/', $value)) {
            return $value;
        }

        if (strlen($digits) === 8) {
            return '+229' . $digits;
        }

        return $value;
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->merge([
            'telephone' => $this->normalizeTelephone($request->input('telephone', '')),
        ]);

        $data = $request->validate([
            'telephone' => ['required', 'string', 'regex:/^\+229\d{8}$/'],
            'password' => 'required|string',
        ], [
            'telephone.required' => 'Le numéro de téléphone est requis.',
            'telephone.regex' => 'Le numéro doit être au format Bénin : 97 00 00 01 ou +22997000001.',
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
        $request->merge([
            'telephone' => $this->normalizeTelephone($request->input('telephone', '')),
        ]);

        $data = $request->validate([
            'nom' => ['required', 'string', 'max:120', 'regex:/^[\pL\s\-]+$/u'],
            'telephone' => ['required', 'string', 'unique:users,telephone', 'regex:/^\+229\d{8}$/'],
            'email' => 'nullable|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[A-Z]/', 'regex:/[0-9]/'],
        ], [
            'nom.required' => 'Le nom complet est requis.',
            'nom.regex' => 'Le nom ne peut contenir que des lettres, espaces et tirets.',
            'telephone.required' => 'Le numéro de téléphone est requis.',
            'telephone.regex' => 'Le numéro doit être au format Bénin : 97 00 00 01 ou +22997000001.',
            'telephone.unique' => 'Ce numéro est déjà utilisé.',
            'password.required' => 'Le mot de passe est requis.',
            'password.min' => 'Le mot de passe doit faire au moins 8 caractères.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.',
            'password.regex' => 'Le mot de passe doit contenir au moins une majuscule et un chiffre.',
        ]);

        $otp = app(\App\Services\OtpService::class);
        $code = $otp->generate();

        $request->session()->put('pending_registration', [
            'nom' => $data['nom'],
            'telephone' => $data['telephone'],
            'email' => $data['email'] ?? null,
            'password' => Hash::make($data['password']),
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(10)->timestamp,
        ]);

        if ($data['email'] ?? null) {
            $otp->sendToEmail($data['email'], $data['nom'], $code);
        }

        return redirect()->route('verification.notice')->with('success', 'Un code de vérification vous a été envoyé par e-mail.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home');
    }
}
