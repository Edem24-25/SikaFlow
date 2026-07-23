<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;

class PaiementController extends Controller
{
    public function index()
    {
        $paiements = auth()->user()->paiements()->with('echeance.pret.creancier', 'abonnement')->latest()->paginate(20);
        return view('paiements.index', compact('paiements'));
    }

    public function pdf()
    {
        $paiements = auth()->user()->paiements()->with('echeance.pret.creancier', 'abonnement')->latest()->get();
        $pdf = Pdf::loadView('paiements.pdf', compact('paiements'));
        return $pdf->download('releve-paiements.pdf');
    }
}
