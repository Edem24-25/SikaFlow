@extends('layouts.app')
@section('title','Admin — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <h1 class="text-2xl sm:text-3xl font-bold mb-6">Tableau de bord administrateur</h1>
  <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4 mb-8">
    <div class="p-5 rounded-2xl bg-gradient-to-br from-night-800 to-night-900 text-white"><div class="text-xs uppercase text-slate-300">Utilisateurs actifs</div><div class="text-3xl font-bold mt-2">{{ $stats['users_actifs'] }}</div></div>
    <div class="p-5 rounded-2xl bg-white border border-slate-100"><div class="text-xs uppercase text-slate-400">Prêts enregistrés</div><div class="text-3xl font-bold mt-2">{{ $stats['prets'] }}</div></div>
    <div class="p-5 rounded-2xl bg-white border border-slate-100"><div class="text-xs uppercase text-slate-400">Volume payé</div><div class="text-3xl font-bold mt-2">{{ number_format($stats['volume_paiements'],0,',',' ') }}</div><div class="text-xs text-slate-400">FCFA</div></div>
    <div class="p-5 rounded-2xl bg-white border border-slate-100"><div class="text-xs uppercase text-slate-400">Taux de retard</div><div class="text-3xl font-bold mt-2">{{ $stats['taux_retard'] }} %</div></div>
  </div>
  <div class="grid md:grid-cols-3 gap-4 mb-8">
    <a href="{{ route('admin.users.index') }}" class="p-5 rounded-2xl bg-white border border-slate-100 hover:border-sika-300 transition"><div class="font-semibold">Utilisateurs</div><div class="text-sm text-slate-500 mt-1">Consulter, suspendre, réactiver</div></a>
    <a href="{{ route('admin.prets.index') }}" class="p-5 rounded-2xl bg-white border border-slate-100 hover:border-sika-300 transition"><div class="font-semibold">Prêts</div><div class="text-sm text-slate-500 mt-1">Vue globale des engagements</div></a>
    <a href="{{ route('admin.paiements.index') }}" class="p-5 rounded-2xl bg-white border border-slate-100 hover:border-sika-300 transition"><div class="font-semibold">Paiements</div><div class="text-sm text-slate-500 mt-1">Suivi manuel & automatique</div></a>
    <a href="{{ route('admin.notifications.create') }}" class="p-5 rounded-2xl bg-white border border-slate-100 hover:border-sika-300 transition md:col-span-3"><div class="font-semibold">Diffuser une notification</div><div class="text-sm text-slate-500 mt-1">Annonces, maintenance, incidents</div></a>
  </div>
  <div class="bg-white rounded-2xl border border-slate-100 shadow-soft overflow-hidden">
    <div class="p-5 border-b border-slate-100"><h2 class="font-semibold">Paiements récents</h2></div>
    <div class="table-responsive">
    <table class="w-full text-sm min-w-[600px]">
      <thead class="bg-slate-50 text-xs uppercase text-slate-500"><tr><th class="text-left px-4 py-3">Utilisateur</th><th class="text-left px-4 py-3">Passerelle</th><th class="text-left px-4 py-3">Montant</th><th class="text-left px-4 py-3">Statut</th><th class="text-left px-4 py-3">Date</th></tr></thead>
      <tbody class="divide-y divide-slate-100">
        @foreach($stats['paiements_recents'] as $p)
          <tr><td class="px-4 py-3">{{ $p->user->nom }}</td><td class="px-4 py-3 uppercase text-xs">{{ $p->passerelle }}</td><td class="px-4 py-3 font-semibold">{{ number_format($p->montant,0,',',' ') }}</td><td class="px-4 py-3">{{ $p->statut }}</td><td class="px-4 py-3">{{ $p->paid_at?->format('d/m/Y H:i') }}</td></tr>
        @endforeach
      </tbody>
    </table>
    </div>
  </div>
</section>
@endsection
