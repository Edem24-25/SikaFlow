@extends('layouts.app')
@section('title', 'Tableau de bord — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4 mb-8">
    <div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 flex items-center gap-2 flex-wrap">
        Bonjour, {{ auth()->user()->nom }} <i class="fa-solid fa-hand text-sika-600"></i>
      </h1>
      <p class="text-slate-500 text-sm sm:text-base">Voici l'état de vos engagements récurrents.</p>
    </div>
    <a href="{{ route('prets.create') }}" class="w-full sm:w-auto text-center px-4 py-2.5 rounded-xl bg-sika-600 text-white font-semibold hover:bg-sika-700 shadow-soft transition-all hover:-translate-y-0.5">+ Nouveau prêt</a>
  </div>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
    <div class="p-5 rounded-2xl bg-gradient-to-br from-sika-600 to-sika-700 text-white shadow-soft">
      <div class="text-xs uppercase tracking-wider text-sika-100">Total engagements</div>
      <div class="text-2xl font-bold mt-2">{{ number_format($totalEngagements,0,',',' ') }} FCFA</div>
    </div>
    <div class="p-5 rounded-2xl bg-white border border-slate-100 shadow-soft">
      <div class="text-xs uppercase tracking-wider text-slate-400">Prêts actifs</div>
      <div class="text-2xl font-bold mt-2">{{ $prets->count() }}</div>
    </div>
    <div class="p-5 rounded-2xl bg-white border border-slate-100 shadow-soft">
      <div class="text-xs uppercase tracking-wider text-slate-400">Abonnements</div>
      <div class="text-2xl font-bold mt-2">{{ $abonnements->count() }}</div>
    </div>
    <div class="p-5 rounded-2xl bg-white border border-slate-100 shadow-soft">
      <div class="text-xs uppercase tracking-wider text-slate-400">Prochaines échéances</div>
      <div class="text-2xl font-bold mt-2">{{ $prochainesEcheances->count() }}</div>
    </div>
  </div>

  <div class="grid md:grid-cols-3 gap-6 mt-8">
    <div class="md:col-span-2 bg-white rounded-2xl border border-slate-100 shadow-soft">
      <div class="p-5 border-b border-slate-100 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
        <h2 class="font-semibold text-lg">Prochaines échéances</h2>
        <a href="{{ route('prets.index') }}" class="text-sm text-sika-700 inline-flex items-center gap-1.5 hover:underline">
          Voir tous les prêts <i class="fa-solid fa-arrow-right text-xs"></i>
        </a>
      </div>
      <div class="divide-y divide-slate-100">
        @forelse($prochainesEcheances as $e)
          <div class="p-4 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-2">
            <div>
              <div class="font-medium text-sm sm:text-base">{{ $e->pret->creancier->nom }} · #{{ $e->numero }}</div>
              <div class="text-xs sm:text-sm text-slate-500">Échéance le {{ $e->date_echeance->format('d/m/Y') }}</div>
            </div>
            <div class="sm:text-right flex sm:block items-center justify-between">
              <div class="font-semibold text-sm sm:text-base">{{ number_format($e->montant,0,',',' ') }} FCFA</div>
              <span class="text-xs px-2 py-0.5 rounded-full {{ $e->statut === 'en_retard' ? 'bg-rose-100 text-rose-700' : 'bg-slate-100 text-slate-600' }}">{{ str_replace('_',' ',$e->statut) }}</span>
            </div>
          </div>
        @empty
          <div class="p-8 text-center text-slate-500 flex flex-col items-center gap-2">
            <i class="fa-solid fa-circle-check text-2xl text-sika-500"></i>
            Aucune échéance à venir — bravo !
          </div>
        @endforelse
      </div>
    </div>

    <div class="bg-white rounded-2xl border border-slate-100 shadow-soft">
      <div class="p-5 border-b border-slate-100"><h2 class="font-semibold text-lg">Abonnements actifs</h2></div>
      <div class="divide-y divide-slate-100">
        @forelse($abonnements as $a)
          <div class="p-4 flex justify-between items-center">
            <div>
              <div class="font-medium">{{ $a->libelle }}</div>
              <div class="text-xs text-slate-500">{{ $a->periodicite }} · {{ $a->prochaine_echeance->format('d/m/Y') }}</div>
            </div>
            <div class="font-semibold text-sm">{{ number_format($a->montant,0,',',' ') }}</div>
          </div>
        @empty
          <div class="p-6 text-center text-slate-500 text-sm">Aucun abonnement.</div>
        @endforelse
      </div>
      <div class="p-4"><a href="{{ route('abonnements.create') }}" class="block text-center text-sm py-2 rounded-lg bg-sika-50 text-sika-700 hover:bg-sika-100">+ Ajouter un abonnement</a></div>
    </div>
  </div>
</section>
@endsection
