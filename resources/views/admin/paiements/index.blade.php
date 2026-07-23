@extends('layouts.app')
@section('title','Paiements — Admin SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
  <h1 class="text-3xl font-bold mb-6">Suivi des paiements</h1>
  <div class="bg-white rounded-2xl border border-slate-100 shadow-soft overflow-hidden">
    <table class="w-full text-sm">
      <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="text-left px-4 py-3">Date</th><th class="text-left px-4 py-3">Utilisateur</th><th class="text-left px-4 py-3">Passerelle</th><th class="text-left px-4 py-3">Mode</th><th class="text-left px-4 py-3">Montant</th><th class="text-left px-4 py-3">Statut</th></tr></thead>
      <tbody class="divide-y divide-slate-100">
        @foreach($paiements as $p)
          <tr><td class="px-4 py-3">{{ $p->paid_at?->format('d/m/Y H:i') }}</td><td class="px-4 py-3">{{ $p->user->nom }}</td><td class="px-4 py-3 uppercase text-xs">{{ $p->passerelle }}</td><td class="px-4 py-3">{{ $p->mode }}</td><td class="px-4 py-3 font-semibold">{{ number_format($p->montant,0,',',' ') }}</td><td class="px-4 py-3">{{ $p->statut }}</td></tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <div class="mt-4">{{ $paiements->links() }}</div>
</section>
@endsection
