<?php

namespace App\Services;

use App\Models\Echeance;
use App\Models\Abonnement;
use App\Models\Paiement;
use App\Models\MoyenPaiement;
use Illuminate\Support\Facades\Log;

class PaiementGateway
{
    public function __construct(
        private KkiapayService $kkiapay,
    ) {}

    /**
     * Prépare l'intention de paiement Kkiapay pour une échéance.
     * Retourne les infos nécessaires au widget JS.
     */
    public function initierPaiementEcheance(Echeance $echeance, MoyenPaiement $moyen): array
    {
        $reference = 'SKF-' . strtoupper(uniqid());

        Paiement::create([
            'user_id'              => $echeance->pret->user_id,
            'echeance_id'          => $echeance->id,
            'moyen_paiement_id'    => $moyen->id,
            'reference_transaction' => $reference,
            'passerelle'           => $this->passerellePour($moyen),
            'montant'              => $echeance->montant,
            'statut'               => 'en_attente',
            'mode'                 => 'manuel',
            'payload'              => ['reference' => $reference],
        ]);

        return [
            'amount'    => (int) $echeance->montant,
            'reference' => $reference,
        ];
    }

    /**
     * Vérifie la transaction Kkiapay et confirme le paiement.
     */
    public function confirmerPaiement(string $transactionId, string $reference): ?Paiement
    {
        $paiement = Paiement::where('reference_transaction', $reference)->first();

        if (!$paiement) {
            Log::warning('Kkiapay confirmation: paiement introuvable', ['reference' => $reference]);
            return null;
        }

        if ($paiement->statut === 'reussi') {
            return $paiement;
        }

        $result = $this->kkiapay->verifyTransaction($transactionId);

        Log::info('Kkiapay verify result', [
            'transaction_id' => $transactionId,
            'reference'      => $reference,
            'result'         => $result,
        ]);

        if (!$result || ($result['status'] ?? '') !== 'SUCCESS') {
            $paiement->update([
                'statut'  => 'echoue',
                'payload' => array_merge($paiement->payload ?? [], [
                    'kkiapay_response' => $result,
                ]),
            ]);
            return null;
        }

        $paiement->update([
            'statut'  => 'reussi',
            'paid_at' => now(),
            'payload' => array_merge($paiement->payload ?? [], [
                'kkiapay_response'   => $result,
                'kkiapay_amount'     => $result['amount'] ?? null,
                'kkiapay_fees'       => $result['fees'] ?? null,
                'kkiapay_source'     => $result['source'] ?? null,
            ]),
        ]);

        if ($paiement->echeance_id) {
            Echeance::where('id', $paiement->echeance_id)
                ->update(['statut' => 'payee', 'paiement_id' => $paiement->id]);
        }

        return $paiement;
    }

    /**
     * Paiement direct (simulation pour mobile_money non-Kkiapay).
     */
    public function payerEcheance(Echeance $echeance, MoyenPaiement $moyen, string $mode = 'manuel'): Paiement
    {
        $paiement = Paiement::create([
            'user_id'              => $echeance->pret->user_id,
            'echeance_id'          => $echeance->id,
            'moyen_paiement_id'    => $moyen->id,
            'reference_transaction' => 'SKF-' . strtoupper(uniqid()),
            'passerelle'           => $this->passerellePour($moyen),
            'montant'              => $echeance->montant,
            'statut'               => 'reussi',
            'mode'                 => $mode,
            'paid_at'              => now(),
            'payload'              => ['simulation' => true],
        ]);

        $echeance->update(['statut' => 'payee', 'paiement_id' => $paiement->id]);

        return $paiement;
    }

    public function payerAbonnement(Abonnement $abonnement, MoyenPaiement $moyen, string $mode = 'manuel'): Paiement
    {
        $paiement = Paiement::create([
            'user_id'              => $abonnement->user_id,
            'abonnement_id'        => $abonnement->id,
            'moyen_paiement_id'    => $moyen->id,
            'reference_transaction' => 'SKF-' . strtoupper(uniqid()),
            'passerelle'           => $this->passerellePour($moyen),
            'montant'              => $abonnement->montant,
            'statut'               => 'reussi',
            'mode'                 => $mode,
            'paid_at'              => now(),
            'payload'              => ['simulation' => true],
        ]);

        $abonnement->update([
            'prochaine_echeance' => match ($abonnement->periodicite) {
                'hebdomadaire' => $abonnement->prochaine_echeance->addWeek(),
                'annuelle'     => $abonnement->prochaine_echeance->addYear(),
                default        => $abonnement->prochaine_echeance->addMonth(),
            },
        ]);

        return $paiement;
    }

    protected function passerellePour(MoyenPaiement $moyen): string
    {
        return match ($moyen->type) {
            'mobile_money' => 'kkiapay',
            'bancaire'     => 'flutterwave',
            default        => 'paydunya',
        };
    }
}
