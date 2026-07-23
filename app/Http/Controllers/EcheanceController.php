<?php

namespace App\Http\Controllers;

use App\Models\Echeance;
use App\Models\MoyenPaiement;
use App\Services\PaiementGateway;
use App\Services\NotificationService;
use Illuminate\Http\Request;

class EcheanceController extends Controller
{
    public function pay(Request $request, Echeance $echeance, PaiementGateway $gw, NotificationService $notif)
    {
        abort_unless($echeance->pret->user_id === auth()->id(), 403);

        $data = $request->validate([
            'moyen_paiement_id' => 'required|exists:moyen_paiements,id',
        ]);
        $moyen = MoyenPaiement::findOrFail($data['moyen_paiement_id']);

        $paiement = $gw->payerEcheance($echeance, $moyen, 'manuel');

        $notif->push(auth()->user(), 'paiement_reussi',
            'Échéance réglée',
            "Votre paiement de {$echeance->montant} FCFA a été confirmé (Réf. {$paiement->reference_transaction}).");

        return back()->with('success', 'Paiement effectué avec succès.');
    }
}
