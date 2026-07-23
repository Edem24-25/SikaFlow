<?php

namespace App\Services;

use App\Models\Echeance;
use App\Models\Abonnement;
use App\Models\Paiement;
use App\Models\MoyenPaiement;

/**
 * Interface abstraite vers les passerelles de paiement supportées :
 * Kkiapay, Flutterwave, PayDunya. Cette classe est un stub :
 * la logique HTTP réelle doit être implémentée par l'équipe.
 */
class PaiementGateway
{
    public function payerEcheance(Echeance $echeance, MoyenPaiement $moyen, string $mode = 'manuel'): Paiement
    {
        $paiement = Paiement::create([
            'user_id' => $echeance->pret->user_id,
            'echeance_id' => $echeance->id,
            'moyen_paiement_id' => $moyen->id,
            'reference_transaction' => 'SKF-' . strtoupper(uniqid()),
            'passerelle' => $this->passerellePour($moyen),
            'montant' => $echeance->montant,
            'statut' => 'reussi', // simulation
            'mode' => $mode,
            'paid_at' => now(),
            'payload' => ['simulation' => true],
        ]);

        $echeance->update(['statut' => 'payee', 'paiement_id' => $paiement->id]);

        return $paiement;
    }

    public function payerAbonnement(Abonnement $abonnement, MoyenPaiement $moyen, string $mode = 'manuel'): Paiement
    {
        $paiement = Paiement::create([
            'user_id' => $abonnement->user_id,
            'abonnement_id' => $abonnement->id,
            'moyen_paiement_id' => $moyen->id,
            'reference_transaction' => 'SKF-' . strtoupper(uniqid()),
            'passerelle' => $this->passerellePour($moyen),
            'montant' => $abonnement->montant,
            'statut' => 'reussi',
            'mode' => $mode,
            'paid_at' => now(),
            'payload' => ['simulation' => true],
        ]);

        // Décale la prochaine échéance
        $abonnement->update([
            'prochaine_echeance' => match ($abonnement->periodicite) {
                'hebdomadaire' => $abonnement->prochaine_echeance->addWeek(),
                'annuelle' => $abonnement->prochaine_echeance->addYear(),
                default => $abonnement->prochaine_echeance->addMonth(),
            },
        ]);

        return $paiement;
    }

    protected function passerellePour(MoyenPaiement $moyen): string
    {
        return match ($moyen->type) {
            'mobile_money' => 'kkiapay',
            'bancaire' => 'flutterwave',
            default => 'paydunya',
        };
    }
}
