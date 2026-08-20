<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PhoneVerificationController extends Controller
{
    public function show(Request $request)
    {
        $pending = $request->session()->get('pending_registration');

        if (!$pending) {
            return redirect()->route('register');
        }

        if (now()->timestamp > $pending['otp_expires_at']) {
            $request->session()->forget('pending_registration');
            return redirect()->route('register')->withErrors(['email' => 'Le code a expiré. Veuillez vous réinscrire.']);
        }

        return view('auth.verify-phone', [
            'telephone' => $pending['telephone'],
        ]);
    }

    public function verify(Request $request)
    {
        $pending = $request->session()->get('pending_registration');

        if (!$pending) {
            return redirect()->route('register');
        }

        $data = $request->validate([
            'code' => 'required|numeric|digits:6',
        ], [
            'code.required' => 'Le code de vérification est requis.',
            'code.numeric' => 'Le code doit être un nombre à 6 chiffres.',
            'code.digits' => 'Le code doit contenir exactement 6 chiffres.',
        ]);

        $codeValid = $pending['otp_code'] === $data['code'];
        $codeNotExpired = now()->timestamp <= $pending['otp_expires_at'];

        if ($codeValid && $codeNotExpired) {
            $user = User::create([
                'nom' => $pending['nom'],
                'telephone' => $pending['telephone'],
                'email' => $pending['email'],
                'password' => $pending['password'],
                'telephone_verified_at' => now(),
            ]);

            $request->session()->forget('pending_registration');
            $request->session()->forget('otp_attempts');

            Auth::login($user);

            return redirect()->route('dashboard')->with('success', 'Votre compte a été créé et vérifié avec succès !');
        }

        if (!$codeNotExpired) {
            $request->session()->forget('pending_registration');
            return back()->withErrors(['code' => 'Le code a expiré. Veuillez vous réinscrire.']);
        }

        $attempts = (int) $request->session()->get('otp_attempts', 0) + 1;
        $request->session()->put('otp_attempts', $attempts);

        if ($attempts > 5) {
            $request->session()->forget('pending_registration');
            $request->session()->forget('otp_attempts');
            return back()->withErrors(['code' => 'Trop de tentatives. Veuillez vous réinscrire.']);
        }

        return back()->withErrors(['code' => 'Le code saisi est incorrect.']);
    }

    public function resend(Request $request)
    {
        $pending = $request->session()->get('pending_registration');

        if (!$pending) {
            return redirect()->route('register');
        }

        if (now()->timestamp <= $pending['otp_expires_at'] - 540) {
            return back()->withErrors(['resend' => 'Veuillez attendre 1 minute avant de demander un nouveau code.']);
        }

        $otp = app(\App\Services\OtpService::class);
        $code = $otp->generate();

        $request->session()->put('pending_registration', array_merge($pending, [
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(10)->timestamp,
        ]));

        $sent = false;
        if ($pending['email']) {
            $sent = $otp->sendToEmail($pending['email'], $pending['nom'], $code);
        }

        if ($sent) {
            return back()->with('success', 'Un nouveau code de vérification vous a été envoyé par e-mail.');
        }

        return back()->withErrors(['resend' => 'Impossible d\'envoyer le code. Veuillez réessayer plus tard.']);
    }
}
