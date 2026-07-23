<?php

namespace App\Http\Controllers;

use App\Models\Pret;
use App\Models\Creancier;
use App\Models\MoyenPaiement;
use App\Services\EcheancierService;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PretController extends Controller
{
    public function index()
    {
        $prets = auth()->user()->prets()->with('creancier')->latest()->paginate(10);
        return view('prets.index', compact('prets'));
    }

    public function create()
    {
        $creanciers = Creancier::orderBy('nom')->get();
        $moyens = auth()->user()->moyensPaiement;
        return view('prets.create', compact('creanciers', 'moyens'));
    }

    public function store(Request $request, EcheancierService $service)
    {
        $data = $this->validated($request);
        $data['user_id'] = auth()->id();
        $data['reference'] = 'PRT-' . strtoupper(uniqid());
        $data['statut'] = 'actif';

        $pret = Pret::create($data);
        $service->generer($pret);

        return redirect()->route('prets.show', $pret)->with('success', 'Prêt enregistré et échéancier généré.');
    }

    public function show(Pret $pret)
    {
        $this->authorizeOwner($pret);
        $pret->load('echeances', 'creancier', 'moyenPaiement');
        return view('prets.show', compact('pret'));
    }

    public function edit(Pret $pret)
    {
        $this->authorizeOwner($pret);
        $creanciers = Creancier::orderBy('nom')->get();
        $moyens = auth()->user()->moyensPaiement;
        return view('prets.edit', compact('pret', 'creanciers', 'moyens'));
    }

    public function update(Request $request, Pret $pret, EcheancierService $service)
    {
        $this->authorizeOwner($pret);
        $data = $this->validated($request);
        $pret->update($data);
        $service->generer($pret);
        return redirect()->route('prets.show', $pret)->with('success', 'Prêt mis à jour.');
    }

    public function destroy(Pret $pret)
    {
        $this->authorizeOwner($pret);
        $pret->delete();
        return redirect()->route('prets.index')->with('success', 'Prêt supprimé.');
    }

    public function pdf(Pret $pret)
    {
        $this->authorizeOwner($pret);
        $pret->load('echeances', 'creancier');
        $pdf = Pdf::loadView('prets.pdf', compact('pret'));
        return $pdf->download('echeancier-' . $pret->reference . '.pdf');
    }

    protected function validated(Request $request): array
    {
        return $request->validate([
            'creancier_id' => 'required|exists:creanciers,id',
            'montant_principal' => 'required|numeric|min:1',
            'taux_interet' => 'required|numeric|min:0|max:100',
            'duree_mois' => 'required|integer|min:1|max:360',
            'periodicite' => 'required|in:mensuelle,trimestrielle,annuelle',
            'date_debut' => 'required|date',
            'prelevement_auto' => 'nullable|boolean',
            'moyen_paiement_id' => 'nullable|exists:moyen_paiements,id',
        ]);
    }

    protected function authorizeOwner(Pret $pret): void
    {
        abort_unless($pret->user_id === auth()->id() || auth()->user()->isAdmin(), 403);
    }
}
