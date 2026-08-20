<?php

namespace App\Services;

use App\Models\User;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Log;
use Resend\Client;
use Resend\Resend;
use Resend\Transporters\HttpTransporter;
use Resend\ValueObjects\ApiKey;
use Resend\ValueObjects\Transporter\BaseUri;
use Resend\ValueObjects\Transporter\Headers;

class OtpService
{
    private ?Client $client = null;

    private function getClient(): Client
    {
        if (!$this->client) {
            $apiKey = ApiKey::from(config('services.resend.api_key'));
            $baseUri = BaseUri::from('api.resend.com');
            $headers = Headers::withAuthorization($apiKey);

            $guzzle = new GuzzleClient([
                'verify' => !app()->environment('local'),
                'curl' => [CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4],
            ]);

            $transporter = new HttpTransporter($guzzle, $baseUri, $headers);
            $this->client = new Client($transporter);
        }
        return $this->client;
    }

    public function generate(): string
    {
        return str_pad((string) random_int(100000, 999999), 6, '0', STR_PAD_LEFT);
    }

    public function send(User $user, string $code): bool
    {
        if ($user->email) {
            return $this->sendToEmail($user->email, $user->nom, $code);
        }

        return $this->sendSms($user->telephone, $code);
    }

    public function sendToEmail(string $email, string $nom, string $code): bool
    {
        if (app()->environment('local')) {
            Log::info("OTP Code pour {$email} ({$nom}) : {$code}");
            return true;
        }

        try {
            $html = view('emails.otp', [
                'nom' => $nom,
                'code' => $code,
            ])->render();

            $this->getClient()->emails->send([
                'from' => 'SikaFlow <onboarding@resend.dev>',
                'to' => [$email],
                'subject' => 'Votre code de vérification SikaFlow',
                'html' => $html,
            ]);

            return true;
        } catch (\Throwable $e) {
            Log::error("Echec de l'envoi de l'OTP par e-mail a {$email} : " . $e->getMessage());
            return false;
        }
    }

    private function sendSms(string $telephone, string $code): bool
    {
        $message = "SikaFlow : Votre code de vérification est {$code}. Valable 10 minutes.";
        return AfricaTalkingSms::send($telephone, $message);
    }
}
