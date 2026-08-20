<?php

namespace App\Http\Controllers;

use App\Services\PaiementGateway;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KkiapayCallbackController extends Controller
{
    public function handle(Request $request, PaiementGateway $gw, NotificationService $notif)
    {
        $transactionId = $request->query('transaction_id')
            ?? $request->input('transaction_id')
            ?? $request->input('transactionId');

        $reference = $request->query('reference')
            ?? $request->input('reference')
            ?? session('kkiapay_reference');

        Log::info('Kkiapay callback received', [
            'transaction_id' => $transactionId,
            'reference'      => $reference,
            'query_params'   => $request->query(),
            'all_params'     => $request->all(),
        ]);

        if (!$transactionId || !$reference) {
            Log::warning('Kkiapay callback: missing params', [
                'transaction_id' => $transactionId,
                'reference'      => $reference,
            ]);

            return redirect()->route('dashboard')
                ->with('error', 'Paramètres de paiement invalides.');
        }

        $paiement = $gw->confirmerPaiement($transactionId, $reference);

        if ($paiement && $paiement->statut === 'reussi') {
            $notif->push(
                auth()->user(),
                'paiement_reussi',
                'Échéance réglée',
                "Votre paiement de {$paiement->montant} FCFA a été confirmé (Réf. {$paiement->reference_transaction})."
            );

            session()->forget('kkiapay_reference');

            return redirect()->route('prets.show', $paiement->echeance?->pret)
                ->with('success', 'Paiement effectué avec succès.');
        }

        Log::warning('Kkiapay callback: confirmation failed', [
            'transaction_id' => $transactionId,
            'reference'      => $reference,
        ]);

        return redirect()->route('dashboard')
            ->with('error', 'Le paiement a échoué ou n\'a pas pu être confirmé. Veuillez réessayer.');
    }

    public function webhook(Request $request, PaiementGateway $gw, NotificationService $notif)
    {
        $signature = $request->header('X-Kkiapay-Signature');
        $secret = config('services.kkiapay.secret');

        if (!$signature || !$secret) {
            Log::warning('Kkiapay webhook: missing signature or secret');
            return response()->json(['status' => 'unauthorized'], 401);
        }

        $expected = hash_hmac('sha256', $request->getContent(), $secret);
        if (!hash_equals($expected, $signature)) {
            Log::warning('Kkiapay webhook: invalid signature');
            return response()->json(['status' => 'forbidden'], 403);
        }

        $transactionId = $request->input('transactionId')
            ?? $request->input('transaction_id');

        $reference = $request->input('reference')
            ?? $request->input('partnerId');

        Log::info('Kkiapay webhook received', [
            'transaction_id' => $transactionId,
            'reference'      => $reference,
            'payload'        => $request->all(),
        ]);

        if (!$transactionId || !$reference) {
            return response()->json(['status' => 'missing_params'], 400);
        }

        $paiement = $gw->confirmerPaiement($transactionId, $reference);

        if ($paiement && $paiement->statut === 'reussi') {
            $notif->push(
                $paiement->user,
                'paiement_reussi',
                'Échéance réglée',
                "Votre paiement de {$paiement->montant} FCFA a été confirmé (Réf. {$paiement->reference_transaction})."
            );

            return response()->json(['status' => 'success']);
        }

        return response()->json(['status' => 'failed'], 422);
    }
}
