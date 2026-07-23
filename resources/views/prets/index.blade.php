@extends('layouts.app')
@section('title', 'Mes prêts — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Mes prêts</h1>
    <a href="{{ route('prets.create') }}" class="px-4 py-2.5 rounded-xl bg-sika-600 text-white font-semibold hover:bg-sika-700">+ Nouveau prêt</a>
  </div>
  <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
        <tr><th class="text-left px-4 py-3">Référence</th><th class="text-left px-4 py-3">Créancier</th><th class="text-left px-4 py-3">Montant</th><th class="text-left px-4 py-3">Durée</th><th class="text-left px-4 py-3">Statut</th><th></th></tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        @forelse($prets as $p)
          <tr>
            <td class="px-4 py-3 font-medium">{{ $p->reference }}</td>
            <td class="px-4 py-3">{{ $p->creancier->nom }}</td>
            <td class="px-4 py-3">{{ number_format($p->montant_principal,0,',',' ') }} FCFA</td>
            <td class="px-4 py-3">{{ $p->duree_mois }} mois</td>
            <td class="px-4 py-3"><span class="px-2 py-0.5 rounded-full text-xs bg-sika-100 text-sika-700">{{ $p->statut }}</span></td>
            <td class="px-4 py-3 text-right"><a href="{{ route('prets.show', $p) }}" class="text-sika-700 font-medium">Ouvrir →</a></td>
          </tr>
        @empty
          <tr><td colspan="6" class="p-8 text-center text-slate-500">Aucun prêt enregistré.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
  <div class="mt-4">{{ $prets->links() }}</div>
</section>
@endsection
