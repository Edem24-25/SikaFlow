<?php

namespace App\Services;

use App\Models\Pret;
use App\Models\Echeance;
use Carbon\Carbon;

class EcheancierService
{
    /**
     * Génère l'échéancier d'un prêt en amortissement constant.
     */
    public function generer(Pret $pret): void
    {
        $pret->echeances()->delete();

        $n = max(1, (int) $pret->duree_mois);
        $tauxMensuel = ((float) $pret->taux_interet) / 100 / 12;
        $principal = (float) $pret->montant_principal;

        if ($tauxMensuel > 0) {
            $mensualite = $principal * $tauxMensuel / (1 - pow(1 + $tauxMensuel, -$n));
        } else {
            $mensualite = $principal / $n;
        }

        $date = Carbon::parse($pret->date_debut);

        for ($i = 1; $i <= $n; $i++) {
            Echeance::create([
                'pret_id' => $pret->id,
                'numero' => $i,
                'date_echeance' => $date->copy()->addMonths($i),
                'montant' => round($mensualite, 2),
                'statut' => 'a_venir',
            ]);
        }
    }
}
