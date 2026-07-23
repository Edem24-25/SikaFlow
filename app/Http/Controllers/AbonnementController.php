<?php

namespace App\Http\Controllers;

use App\Models\Abonnement;
use App\Models\MoyenPaiement;
use Illuminate\Http\Request;

class AbonnementController extends Controller
{
    public function index()
    {
        $abonnements = auth()->user()->abonnements()->latest()->paginate(10);
        return view('abonnements.index', compact('abonnements'));
    }

    public function create()
    {
        $moyens = auth()->user()->moyensPaiement;
        return view('abonnements.create', compact('moyens'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);
        $data['user_id'] = auth()->id();
        $data['statut'] = 'actif';
        Abonnement::create($data);
        return redirect()->route('abonnements.index')->with('success', 'Abonnement ajouté.');
    }

    public function edit(Abonnement $abonnement)
    {
        $this->authorizeOwner($abonnement);
        $moyens = auth()->user()->moyensPaiement;
        return view('abonnements.edit', compact('abonnement', 'moyens'));
    }

    public function update(Request $request, Abonnement $abonnement)
    {
        $this->authorizeOwner($abonnement);
        $abonnement->update($this->validated($request));
        return redirect()->route('abonnements.index')->with('success', 'Abonnement mis à jour.');
    }

    public function destroy(Abonnement $abonnement)
    {
        $this->authorizeOwner($abonnement);
        $abonnement->delete();
        return redirect()->route('abonnements.index')->with('success', 'Abonnement supprimé.');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'libelle' => 'required|string|max:120',
            'fournisseur' => 'nullable|string|max:120',
            'montant' => 'required|numeric|min:0',
            'periodicite' => 'required|in:hebdomadaire,mensuelle,annuelle',
            'prochaine_echeance' => 'required|date',
            'prelevement_auto' => 'nullable|boolean',
            'moyen_paiement_id' => 'nullable|exists:moyen_paiements,id',
        ]);
    }

    protected function authorizeOwner(Abonnement $abonnement): void
    {
        abort_unless($abonnement->user_id === auth()->id(), 403);
    }
}
