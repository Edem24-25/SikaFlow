<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AfricaTalkingSms
{
    /**
     * Send SMS via Africa's Talking API
     *
     * @param string $to Recipient phone number (e.g. +22961000000)
     * @param string $message Message content
     * @return bool
     */
    public static function send(string $to, string $message): bool
    {
        $username = config('services.africastalking.username', 'sandbox');
        $apiKey = config('services.africastalking.api_key');

        if (empty($apiKey)) {
            Log::warning("Africa's Talking SMS API Key is missing. SMS not sent.");
            return true;
        }

        try {
            $endpoint = "https://api.africastalking.com/version1/messaging";
            if ($username === 'sandbox') {
                $endpoint = "https://api.sandbox.africastalking.com/version1/messaging";
            }

            // Normalize phone number (Africa's Talking requires E.164 format e.g. +229...)
            $to = self::formatPhoneNumber($to);

            $response = Http::asForm()
                ->withHeaders([
                    'apiKey' => $apiKey,
                    'Accept' => 'application/json'
                ])
                ->post($endpoint, [
                    'username' => $username,
                    'to' => $to,
                    'message' => $message,
                ]);

            if ($response->successful()) {
                Log::info("SMS sent successfully to {$to} via Africa's Talking.");
                return true;
            }

            Log::error("Failed to send SMS to {$to} via Africa's Talking. Response: " . $response->body());
            return false;
        } catch (\Exception $e) {
            Log::error("Africa's Talking SMS sending exception: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Format phone number to E.164 (defaults to Benin +229 if prefix is missing)
     */
    private static function formatPhoneNumber(string $phone): string
    {
        $phone = preg_replace('/\s+/', '', $phone); // remove spaces
        $phone = str_replace(' ', '', $phone);

        if (str_starts_with($phone, '+')) {
            return $phone;
        }

        if (str_starts_with($phone, '00')) {
            return '+' . substr($phone, 2);
        }

        // If it starts with standard 8 digits or 10 digits without prefix, assume Benin (+229)
        // Adjust this if your userbase has a different country code.
        return '+229' . ltrim($phone, '0');
    }
}
