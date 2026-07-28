@extends('layouts.app')
@section('title','Prêts — Admin SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <h1 class="text-2xl sm:text-3xl font-bold mb-6">Tous les prêts</h1>
  <div class="bg-white rounded-2xl border border-slate-100 shadow-soft overflow-hidden">
    <div class="table-responsive">
    <table class="w-full text-sm min-w-[600px]">
      <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="text-left px-4 py-3">Réf.</th><th class="text-left px-4 py-3">Utilisateur</th><th class="text-left px-4 py-3">Créancier</th><th class="text-left px-4 py-3">Montant</th><th class="text-left px-4 py-3">Statut</th></tr></thead>
      <tbody class="divide-y divide-slate-100">
        @foreach($prets as $p)
          <tr><td class="px-4 py-3 font-mono text-xs">{{ $p->reference }}</td><td class="px-4 py-3">{{ $p->user->nom }}</td><td class="px-4 py-3">{{ $p->creancier->nom }}</td><td class="px-4 py-3">{{ number_format($p->montant_principal,0,',',' ') }}</td><td class="px-4 py-3">{{ $p->statut }}</td></tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-4">{{ $prets->links() }}</div>
</section>
@endsection
