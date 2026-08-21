<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pret;
use App\Models\Paiement;
use App\Models\Echeance;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'users_actifs' => User::where('status', 'actif')->where('role','user')->count(),
            'prets' => Pret::count(),
            'volume_paiements' => Paiement::where('statut','reussi')->sum('montant'),
            'taux_retard' => $this->tauxRetard(),
            'paiements_recents' => Paiement::with('user')->whereHas('user')->latest()->limit(10)->get(),
        ];
        return view('admin.dashboard', compact('stats'));
    }

    protected function tauxRetard(): float
    {
        $total = Echeance::count();
        if ($total === 0) return 0.0;
        $retard = Echeance::where('statut', 'en_retard')->count();
        return round(($retard / $total) * 100, 2);
    }
}
