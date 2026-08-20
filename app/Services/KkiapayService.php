<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class KkiapayService
{
    private string $publicKey;
    private string $privateKey;
    private string $secret;
    private bool $sandbox;
    private string $baseUrl;

    public function __construct()
    {
        $this->publicKey  = config('services.kkiapay.public_key');
        $this->privateKey = config('services.kkiapay.private_key');
        $this->secret     = config('services.kkiapay.secret');
        $this->sandbox    = config('services.kkiapay.sandbox', true);
        $this->baseUrl    = $this->sandbox
            ? 'https://api-sandbox.kkiapay.me'
            : 'https://api.kkiapay.me';
    }

    public function getPublicKey(): string
    {
        return $this->publicKey;
    }

    public function isSandbox(): bool
    {
        return $this->sandbox;
    }

    public function verifyTransaction(string $transactionId): ?array
    {
        $url = "{$this->baseUrl}/api/v1/transactions/status";

        Log::info('Kkiapay API request', [
            'url'            => $url,
            'sandbox'        => $this->sandbox,
            'transaction_id' => $transactionId,
            'has_public'     => !empty($this->publicKey),
            'has_private'    => !empty($this->privateKey),
            'has_secret'     => !empty($this->secret),
        ]);

        try {
            $response = Http::withHeaders([
                'Accept'        => 'application/json',
                'X-API-KEY'     => $this->publicKey,
                'X-PRIVATE-KEY' => $this->privateKey,
                'X-SECRET-KEY'  => $this->secret,
            ])->timeout(30)->post($url, [
                'transactionId' => $transactionId,
            ]);

            $body = $response->body();

            Log::info('Kkiapay API response', [
                'status'         => $response->status(),
                'successful'     => $response->successful(),
                'body_raw'       => $body,
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            return null;
        } catch (\Exception $e) {
            Log::error('Kkiapay verify exception', [
                'transaction_id' => $transactionId,
                'class'          => get_class($e),
                'message'        => $e->getMessage(),
                'trace'          => $e->getTraceAsString(),
            ]);

            return null;
        }
    }

    public function refundTransaction(string $transactionId): ?array
    {
        try {
            $response = Http::withHeaders([
                'x-private-key' => $this->privateKey,
                'x-secret-key'  => $this->secret,
            ])->post("{$this->baseUrl}/api/v1/transactions/refund", [
                'transactionId' => $transactionId,
            ]);

            if ($response->successful()) {
                return $response->json();
            }

            Log::warning('Kkiapay refund failed', [
                'transaction_id' => $transactionId,
                'status'         => $response->status(),
                'body'           => $response->body(),
            ]);

            return null;
        } catch (\Exception $e) {
            Log::error('Kkiapay refund exception', [
                'transaction_id' => $transactionId,
                'message'        => $e->getMessage(),
            ]);

            return null;
        }
    }
}
