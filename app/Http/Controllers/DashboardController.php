<?php

namespace App\Http\Controllers;

use App\Models\Echeance;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $prets = $user->prets()->with('creancier')->get();
        $abonnements = $user->abonnements()->where('statut','actif')->get();
        $prochainesEcheances = Echeance::whereHas('pret', fn($q) => $q->where('user_id', $user->id))
            ->where('statut', '!=', 'payee')
            ->orderBy('date_echeance')
            ->limit(6)
            ->get();

        $totalEngagements = $prets->sum('montant_principal') + $abonnements->sum('montant');

        return view('dashboard.index', compact('user', 'prets', 'abonnements', 'prochainesEcheances', 'totalEngagements'));
    }
}
