@extends('layouts.app')
@section('title','Admin — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <div class="relative hero-gradient rounded-3xl p-6 sm:p-8 mb-8 overflow-hidden reveal">
    <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-8 -left-8 w-40 h-40 bg-white/5 rounded-full"></div>
    <div class="relative flex flex-col sm:flex-row sm:items-center gap-4">
      <div class="w-12 h-12 rounded-2xl bg-white/15 backdrop-blur-sm border border-white/20 flex items-center justify-center text-white text-xl shadow-lg">
        <i class="fa-solid fa-gauge-high"></i>
      </div>
      <div>
        <h1 class="text-2xl sm:text-3xl font-bold text-white tracking-tight">Tableau de bord administrateur</h1>
        <p class="text-sika-200 text-sm mt-0.5">Vue d'ensemble de la plateforme SikaFlow</p>
      </div>
      <div class="sm:ml-auto flex items-center gap-2 text-xs text-white/80">
        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
        Système opérationnel
      </div>
    </div>
  </div>

  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8 reveal reveal-delay-1">
    <div class="card p-5 group hover:-translate-y-1 transition-transform duration-300">
      <div class="flex items-center justify-between mb-3">
        <span class="w-10 h-10 rounded-xl bg-sika-100 text-sika-600 flex items-center justify-center"><i class="fa-solid fa-users"></i></span>
        <span class="text-[10px] px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700 font-bold">Actifs</span>
      </div>
      <div class="text-3xl font-bold text-night-900">{{ $stats['users_actifs'] }}</div>
      <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Utilisateurs actifs</div>
    </div>
    <div class="card p-5 group hover:-translate-y-1 transition-transform duration-300">
      <div class="flex items-center justify-between mb-3">
        <span class="w-10 h-10 rounded-xl bg-indigo-100 text-indigo-600 flex items-center justify-center"><i class="fa-solid fa-file-invoice-dollar"></i></span>
      </div>
      <div class="text-3xl font-bold text-night-900">{{ $stats['prets'] }}</div>
      <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Prêts enregistrés</div>
    </div>
    <div class="card p-5 group hover:-translate-y-1 transition-transform duration-300">
      <div class="flex items-center justify-between mb-3">
        <span class="w-10 h-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center"><i class="fa-solid fa-money-bill-trend-up"></i></span>
      </div>
      <div class="text-2xl lg:text-3xl font-bold text-night-900 truncate">{{ number_format($stats['volume_paiements'],0,',',' ') }}</div>
      <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Volume payé (FCFA)</div>
    </div>
    <div class="card p-5 group hover:-translate-y-1 transition-transform duration-300">
      <div class="flex items-center justify-between mb-3">
        <span class="w-10 h-10 rounded-xl {{ $stats['taux_retard'] > 10 ? 'bg-rose-100 text-rose-600' : 'bg-amber-100 text-amber-600' }} flex items-center justify-center"><i class="fa-solid fa-triangle-exclamation"></i></span>
      </div>
      <div class="text-3xl font-bold {{ $stats['taux_retard'] > 10 ? 'text-rose-600' : 'text-night-900' }}">{{ $stats['taux_retard'] }} %</div>
      <div class="text-xs text-slate-400 mt-1 uppercase tracking-wider">Taux de retard</div>
    </div>
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8 reveal reveal-delay-1">
    <a href="{{ route('admin.users.index') }}" class="group card p-5 hover:-translate-y-1 hover:border-sika-300 transition-all duration-300">
      <div class="flex items-center gap-3">
        <span class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 group-hover:bg-sika-100 group-hover:text-sika-600 transition-colors flex items-center justify-center"><i class="fa-solid fa-user-gear"></i></span>
        <div>
          <div class="font-semibold text-slate-800">Utilisateurs</div>
          <div class="text-xs text-slate-400 mt-0.5">Suspendre, réactiver</div>
        </div>
        <i class="fa-solid fa-arrow-right ml-auto text-slate-300 group-hover:text-sika-500 group-hover:translate-x-1 transition-all"></i>
      </div>
    </a>
    <a href="{{ route('admin.prets.index') }}" class="group card p-5 hover:-translate-y-1 hover:border-sika-300 transition-all duration-300">
      <div class="flex items-center gap-3">
        <span class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 group-hover:bg-sika-100 group-hover:text-sika-600 transition-colors flex items-center justify-center"><i class="fa-solid fa-file-invoice-dollar"></i></span>
        <div>
          <div class="font-semibold text-slate-800">Prêts</div>
          <div class="text-xs text-slate-400 mt-0.5">Vue globale des engagements</div>
        </div>
        <i class="fa-solid fa-arrow-right ml-auto text-slate-300 group-hover:text-sika-500 group-hover:translate-x-1 transition-all"></i>
      </div>
    </a>
    <a href="{{ route('admin.paiements.index') }}" class="group card p-5 hover:-translate-y-1 hover:border-sika-300 transition-all duration-300">
      <div class="flex items-center gap-3">
        <span class="w-10 h-10 rounded-xl bg-slate-100 text-slate-600 group-hover:bg-sika-100 group-hover:text-sika-600 transition-colors flex items-center justify-center"><i class="fa-solid fa-money-bill-wave"></i></span>
        <div>
          <div class="font-semibold text-slate-800">Paiements</div>
          <div class="text-xs text-slate-400 mt-0.5">Suivi manuel & automatique</div>
        </div>
        <i class="fa-solid fa-arrow-right ml-auto text-slate-300 group-hover:text-sika-500 group-hover:translate-x-1 transition-all"></i>
      </div>
    </a>
    <a href="{{ route('admin.notifications.create') }}" class="group card p-5 hover:-translate-y-1 hover:border-gold-400 transition-all duration-300">
      <div class="flex items-center gap-3">
        <span class="w-10 h-10 rounded-xl bg-gold-400/15 text-gold-600 group-hover:bg-gold-400/25 transition-colors flex items-center justify-center"><i class="fa-solid fa-bullhorn"></i></span>
        <div>
          <div class="font-semibold text-slate-800">Diffusion</div>
          <div class="text-xs text-slate-400 mt-0.5">Annonces, maintenance</div>
        </div>
        <i class="fa-solid fa-arrow-right ml-auto text-slate-300 group-hover:text-gold-500 group-hover:translate-x-1 transition-all"></i>
      </div>
    </a>
  </div>

  <div class="card overflow-hidden reveal reveal-delay-1">
    <div class="flex items-center gap-3 px-5 sm:px-6 py-4 border-b border-slate-100 bg-slate-50/50">
      <span class="w-9 h-9 rounded-xl bg-night-900 text-white flex items-center justify-center"><i class="fa-solid fa-clock-rotate-left text-sm"></i></span>
      <div>
        <h2 class="font-semibold text-slate-800">Paiements récents</h2>
        <p class="text-xs text-slate-400">Les 10 dernières transactions</p>
      </div>
    </div>
    <div class="table-responsive">
      <table class="w-full text-sm min-w-[620px]">
        <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
          <tr>
            <th class="text-left px-5 py-3.5 font-semibold">Utilisateur</th>
            <th class="text-left px-5 py-3.5 font-semibold">Passerelle</th>
            <th class="text-right px-5 py-3.5 font-semibold">Montant</th>
            <th class="text-left px-5 py-3.5 font-semibold">Statut</th>
            <th class="text-left px-5 py-3.5 font-semibold">Date</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse($stats['paiements_recents'] as $p)
            <tr class="hover:bg-slate-50/60 transition-colors">
              <td class="px-5 py-3.5">
                <div class="flex items-center gap-2.5">
                  <span class="w-8 h-8 rounded-lg bg-sika-50 border border-sika-100 text-sika-700 text-xs font-bold flex items-center justify-center">{{ strtoupper(substr($p->user->nom, 0, 1)) }}</span>
                  <span class="font-medium text-slate-800">{{ $p->user->nom }}</span>
                </div>
              </td>
              <td class="px-5 py-3.5">
                <span class="inline-flex items-center gap-1.5 text-xs uppercase font-semibold text-slate-600">
                  <span class="w-6 h-6 rounded-md bg-night-900 text-white text-[9px] font-black flex items-center justify-center">K</span>
                  {{ $p->passerelle }}
                </span>
              </td>
              <td class="px-5 py-3.5 text-right font-semibold text-night-900">{{ number_format($p->montant,0,',',' ') }} FCFA</td>
              <td class="px-5 py-3.5">
                @php $map = ['reussi' => 'bg-emerald-100 text-emerald-700', 'en_attente' => 'bg-amber-100 text-amber-700', 'echoue' => 'bg-rose-100 text-rose-700', 'annule' => 'bg-slate-100 text-slate-600']; @endphp
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $map[$p->statut] ?? 'bg-slate-100 text-slate-600' }}">{{ $p->statut }}</span>
              </td>
              <td class="px-5 py-3.5 text-slate-500 whitespace-nowrap">{{ $p->paid_at?->format('d/m/Y H:i') }}</td>
            </tr>
          @empty
            <tr><td colspan="5" class="p-10 text-center text-slate-400">Aucun paiement récent.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</section>
@endsection
