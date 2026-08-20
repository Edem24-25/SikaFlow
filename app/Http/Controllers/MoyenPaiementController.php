<?php

namespace App\Http\Controllers;

use App\Models\MoyenPaiement;
use Illuminate\Http\Request;

class MoyenPaiementController extends Controller
{
    public function index()
    {
        $moyens = auth()->user()->moyensPaiement()->latest()->get();
        return view('moyens.index', compact('moyens'));
    }

    public function create() { return view('moyens.create'); }

    public function store(Request $request)
    {
        $data = $request->validate([
            'type' => 'required|in:mobile_money,bancaire',
            'operateur' => 'required|string|max:60',
            'numero' => 'required|string|max:40',
            'titulaire' => 'required|string|max:120',
            'is_default' => 'nullable|boolean',
        ]);
        $data['user_id'] = auth()->id();
        if (!empty($data['is_default'])) {
            auth()->user()->moyensPaiement()->update(['is_default' => false]);
        }
        MoyenPaiement::create($data);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Moyen de paiement ajouté.']);
        }

        return redirect()->route('moyens.index')->with('success', 'Moyen de paiement ajouté.');
    }

    public function destroy(MoyenPaiement $moyen)
    {
        abort_unless($moyen->user_id === auth()->id(), 403);
        $moyen->delete();
        return back()->with('success', 'Moyen de paiement supprimé.');
    }
}
