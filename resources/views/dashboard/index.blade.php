@extends('layouts.app')
@section('title', 'Tableau de bord — SikaFlow')
@section('content')
<section class="max-w-7xl mx-auto px-4 py-8 sm:py-12">
  {{-- Header --}}
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-5 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-house text-sika-500"></i> Tableau de bord
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight flex items-center gap-2.5 flex-wrap">
        Bonjour, {{ auth()->user()->nom }} <i class="fa-solid fa-hand text-sika-600 animate-float"></i>
      </h1>
      <p class="text-slate-500 text-sm sm:text-base mt-1">Voici l'état de vos engagements récurrents.</p>
    </div>
    <a href="{{ route('prets.create') }}" class="btn-primary relative overflow-hidden">
      <i class="fa-solid fa-plus"></i> Nouveau prêt
      <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
    </a>
  </div>

  {{-- Stats --}}
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
    <div class="relative overflow-hidden p-5 sm:p-6 rounded-3xl hero-gradient text-white shadow-card reveal reveal-delay-1 group">
      <div class="absolute inset-0 hero-grid opacity-50"></div>
      <div class="absolute -top-8 -right-8 w-24 h-24 bg-sika-500/30 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700"></div>
      <div class="relative">
        <div class="flex items-center justify-between mb-3">
          <div class="w-10 h-10 rounded-xl bg-white/10 border border-white/15 flex items-center justify-center">
            <i class="fa-solid fa-coins text-sika-300"></i>
          </div>
        </div>
        <div class="text-[11px] uppercase tracking-wider text-sika-200">Total engagements</div>
        <div class="text-xl sm:text-2xl font-bold mt-1.5">{{ number_format($totalEngagements,0,',',' ') }} FCFA</div>
      </div>
    </div>

    @foreach([
      ['fa-file-invoice-dollar', 'Prêts actifs', $prets->count(), 'from-sika-50 to-sika-100/60 text-sika-600'],
      ['fa-arrows-rotate', 'Abonnements', $abonnements->count(), 'from-gold-400/15 to-gold-500/10 text-gold-500'],
      ['fa-calendar-check', 'Prochaines échéances', $prochainesEcheances->count(), 'from-indigo-50 to-indigo-100/60 text-indigo-500'],
    ] as $i => $stat)
      <div class="group p-5 sm:p-6 rounded-3xl bg-white border border-slate-100 shadow-card card-hover reveal reveal-delay-{{ $i + 2 }}">
        <div class="flex items-center justify-between mb-3">
          <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $stat[3] }} flex items-center justify-center group-hover:shadow-glow-soft transition-all duration-300">
            <i class="fa-solid {{ $stat[0] }}"></i>
          </div>
        </div>
        <div class="text-[11px] uppercase tracking-wider text-slate-400">{{ $stat[1] }}</div>
        <div class="text-xl sm:text-2xl font-bold mt-1.5 text-night-900">{{ $stat[2] }}</div>
      </div>
    @endforeach
  </div>

  {{-- Main content --}}
  <div class="grid lg:grid-cols-3 gap-6 mt-8">
    {{-- Upcoming échéances --}}
    <div class="lg:col-span-2 card overflow-hidden reveal">
      <div class="p-5 sm:p-6 border-b border-slate-100 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2 bg-gradient-to-r from-slate-50/80 to-transparent">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-sika-100 text-sika-600 flex items-center justify-center">
            <i class="fa-solid fa-calendar-days"></i>
          </div>
          <div>
            <h2 class="font-semibold text-night-900">Prochaines échéances</h2>
            <p class="text-xs text-slate-400">Vos engagements à venir</p>
          </div>
        </div>
        <a href="{{ route('prets.index') }}" class="link-arrow text-sm">
          Voir tous les prêts <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
      </div>

      <div class="divide-y divide-slate-100">
        @forelse($prochainesEcheances as $e)
          <div class="p-4 sm:p-5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 hover:bg-sika-50/40 transition-colors group">
            <div class="flex items-center gap-3.5">
              <span class="w-11 h-11 shrink-0 rounded-2xl bg-slate-50 border border-slate-100 flex items-center justify-center font-bold text-slate-400 group-hover:bg-sika-600 group-hover:text-white group-hover:border-sika-600 transition-all duration-300">
                {{ $e->date_echeance->format('d') }}
              </span>
              <div>
                <div class="font-medium text-slate-800 text-sm sm:text-base">{{ $e->pret->creancier->nom }} · <span class="font-mono text-xs text-slate-400">#{{ $e->numero }}</span></div>
                <div class="text-xs sm:text-sm text-slate-500">Échéance le {{ $e->date_echeance->format('d/m/Y') }}</div>
              </div>
            </div>
            <div class="sm:text-right flex sm:block items-center justify-between">
              <div class="font-bold text-slate-800">{{ number_format($e->montant,0,',',' ') }} FCFA</div>
              <span class="text-[11px] px-2.5 py-1 rounded-full {{ $e->statut === 'en_retard' ? 'badge-red' : 'badge-slate' }}">{{ str_replace('_',' ',$e->statut) }}</span>
            </div>
          </div>
        @empty
          <div class="p-10 text-center text-slate-500 flex flex-col items-center gap-3">
            <span class="w-14 h-14 rounded-full bg-sika-50 text-sika-500 flex items-center justify-center animate-float">
              <i class="fa-solid fa-circle-check text-2xl"></i>
            </span>
            Aucune échéance à venir — bravo !
          </div>
        @endforelse
      </div>
    </div>

    {{-- Abonnements actifs --}}
    <div class="card overflow-hidden reveal reveal-delay-2">
      <div class="p-5 sm:p-6 border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-transparent">
        <div class="flex items-center gap-3">
          <div class="w-9 h-9 rounded-xl bg-gold-400/15 text-gold-500 flex items-center justify-center">
            <i class="fa-solid fa-arrows-rotate"></i>
          </div>
          <div>
            <h2 class="font-semibold text-night-900">Abonnements actifs</h2>
            <p class="text-xs text-slate-400">Vos services récurrents</p>
          </div>
        </div>
      </div>
      <div class="divide-y divide-slate-100">
        @forelse($abonnements as $a)
          <div class="p-4 flex justify-between items-center hover:bg-sika-50/40 transition-colors">
            <div class="flex items-center gap-3 min-w-0">
              <span class="w-9 h-9 shrink-0 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center overflow-hidden">
                <x-company-logo :name="$a->fournisseur ?: $a->libelle" class="w-full h-full object-cover" />
              </span>
              <div class="min-w-0">
                <div class="font-medium text-slate-800 truncate">{{ $a->libelle }}</div>
                <div class="text-xs text-slate-500">{{ $a->periodicite }} · {{ $a->prochaine_echeance->format('d/m/Y') }}</div>
              </div>
            </div>
            <div class="font-bold text-slate-800 text-sm ml-2">{{ number_format($a->montant,0,',',' ') }}</div>
          </div>
        @empty
          <div class="p-6 text-center text-slate-500 text-sm">Aucun abonnement.</div>
        @endforelse
      </div>
      <div class="p-4 border-t border-slate-100">
        <a href="{{ route('abonnements.create') }}" class="block text-center text-sm py-2.5 rounded-xl bg-sika-50 text-sika-700 hover:bg-sika-100 transition-colors font-semibold">
          <i class="fa-solid fa-plus mr-1.5"></i> Ajouter un abonnement
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
