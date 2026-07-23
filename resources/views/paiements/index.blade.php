@extends('layouts.app')
@section('title','Historique des paiements — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Historique des paiements</h1>
    <a href="{{ route('paiements.pdf') }}" class="px-4 py-2 rounded-xl border border-slate-200 hover:bg-slate-50 text-sm">📄 Relevé PDF</a>
  </div>
  <div class="bg-white rounded-2xl border border-slate-100 shadow-soft overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
        <tr><th class="text-left px-4 py-3">Date</th><th class="text-left px-4 py-3">Référence</th><th class="text-left px-4 py-3">Objet</th><th class="text-left px-4 py-3">Passerelle</th><th class="text-left px-4 py-3">Mode</th><th class="text-left px-4 py-3">Montant</th><th class="text-left px-4 py-3">Statut</th></tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        @forelse($paiements as $p)
          <tr>
            <td class="px-4 py-3">{{ $p->paid_at?->format('d/m/Y H:i') }}</td>
            <td class="px-4 py-3 font-mono text-xs">{{ $p->reference_transaction }}</td>
            <td class="px-4 py-3">{{ $p->echeance?->pret?->creancier?->nom ?? $p->abonnement?->libelle }}</td>
            <td class="px-4 py-3 uppercase text-xs">{{ $p->passerelle }}</td>
            <td class="px-4 py-3">{{ $p->mode }}</td>
            <td class="px-4 py-3 font-semibold">{{ number_format($p->montant,0,',',' ') }} FCFA</td>
            <td class="px-4 py-3"><span class="px-2 py-0.5 rounded-full text-xs bg-sika-100 text-sika-700">{{ $p->statut }}</span></td>
          </tr>
        @empty
          <tr><td colspan="7" class="p-8 text-center text-slate-500">Aucun paiement.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="mt-4">{{ $paiements->links() }}</div>
</section>
@endsection
