<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AfricaTalkingSms;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneVerificationController extends Controller
{
    /**
     * Show the phone verification notice/form.
     */
    public function show(Request $request)
    {
        $user = $request->user();

        // If already verified, go to dashboard
        if ($user->telephone_verified_at) {
            return redirect()->route('dashboard');
        }

        return view('auth.verify-phone', [
            'telephone' => $user->telephone
        ]);
    }

    /**
     * Verify the phone verification code.
     */
    public function verify(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|size:6',
        ]);

        $user = $request->user();

        if ($user->telephone_verified_at) {
            return redirect()->route('dashboard');
        }

        // Check if code matches and is not expired
        if (
            $user->otp_code === $data['code'] &&
            $user->otp_expires_at &&
            Carbon::parse($user->otp_expires_at)->isFuture()
        ) {
            $user->update([
                'telephone_verified_at' => now(),
                'otp_code' => null,
                'otp_expires_at' => null,
            ]);

            return redirect()->route('dashboard')->with('success', 'Votre numéro de téléphone a été vérifié avec succès !');
        }

        return back()->withErrors(['code' => 'Le code saisi est incorrect ou a expiré.']);
    }

    /**
     * Resend the verification SMS.
     */
    public function resend(Request $request)
    {
        $user = $request->user();

        if ($user->telephone_verified_at) {
            return redirect()->route('dashboard');
        }

        // Throttle resending: check if a code was sent less than 1 minute ago
        if (
            $user->otp_expires_at &&
            Carbon::parse($user->otp_expires_at)->subMinutes(9)->isFuture()
        ) {
            return back()->withErrors(['resend' => 'Veuillez attendre avant de demander un nouveau code.']);
        }

        // Generate new code
        $code = str_pad((string) random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
        $user->update([
            'otp_code' => $code,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        // Send SMS
        $message = "SikaFlow : Votre code de verification est {$code}. Valable 10 minutes.";
        $sent = AfricaTalkingSms::send($user->telephone, $message);

        if ($sent) {
            return back()->with('success', 'Un nouveau code de vérification vous a été envoyé par SMS.');
        }

        return back()->withErrors(['resend' => 'Impossible d\'envoyer le SMS. Veuillez réessayer plus tard.']);
    }
}
