@extends('layouts.app')
@section('title','Moyens de paiement — SikaFlow')
@section('content')
<section class="max-w-4xl mx-auto px-4 py-8 sm:py-12">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-credit-card text-sika-500"></i> Paiements
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Mes moyens de paiement</h1>
      <p class="text-slate-500 text-sm mt-1">Mobile Money & cartes bancaires pour vos prélèvements automatiques.</p>
    </div>
    <a href="{{ route('moyens.create') }}" class="btn-primary relative overflow-hidden">
      <i class="fa-solid fa-plus"></i> Ajouter
      <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
    </a>
  </div>

  <div class="grid md:grid-cols-2 gap-5">
    @forelse($moyens as $m)
      <div class="group relative overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-card p-5 sm:p-6 flex items-start justify-between gap-4 transition-all duration-300 hover:-translate-y-1 hover:shadow-lift reveal">
        <div class="absolute -top-10 -right-10 w-32 h-32 rounded-full {{ $m->type === 'mobile_money' ? 'bg-sika-100/60' : 'bg-night-900/5' }} -z-0 transition-transform duration-500 group-hover:scale-150"></div>
        <div class="flex items-start gap-4 relative z-10">
          @if($m->type === 'mobile_money')
            @if(str_contains(strtolower($m->operateur), 'mtn'))
              <div class="w-12 h-12 shrink-0 rounded-2xl bg-yellow-100 flex items-center justify-center">
                <span class="text-sm font-bold text-yellow-700">MTN</span>
              </div>
            @elseif(str_contains(strtolower($m->operateur), 'moov'))
              <div class="w-12 h-12 shrink-0 rounded-2xl bg-blue-100 flex items-center justify-center">
                <span class="text-sm font-bold text-blue-700">Moov</span>
              </div>
            @else
              <div class="w-12 h-12 shrink-0 rounded-2xl bg-sika-50 border border-sika-100 flex items-center justify-center">
                <i class="fa-solid fa-mobile-screen text-sika-600"></i>
              </div>
            @endif
          @else
            <div class="w-12 h-12 shrink-0 rounded-2xl bg-night-900 text-white flex items-center justify-center">
              <i class="fa-solid fa-credit-card"></i>
            </div>
          @endif
          <div class="min-w-0">
            <div class="flex items-center gap-2 flex-wrap">
              <span class="text-[10px] uppercase tracking-wider text-slate-400">{{ $m->type === 'mobile_money' ? 'Mobile Money' : 'Carte bancaire' }}</span>
              @if($m->is_default)
                <span class="text-[10px] px-2 py-0.5 rounded-full bg-gold-400/15 text-gold-600 font-bold">Par défaut</span>
              @endif
            </div>
            <div class="font-semibold text-lg text-night-900 leading-tight">{{ $m->operateur }}</div>
            <div class="text-sm text-slate-500 mt-0.5 truncate">{{ $m->numero }}</div>
            <div class="text-xs text-slate-400 mt-1 flex items-center gap-1.5">
              <i class="fa-solid fa-user text-[10px]"></i> {{ $m->titulaire }}
            </div>
          </div>
        </div>
        <form method="POST" action="{{ route('moyens.destroy', $m) }}" onsubmit="return confirm('Supprimer ce moyen de paiement ?')" class="relative z-10">@csrf @method('DELETE')
          <button class="w-9 h-9 rounded-xl border border-rose-200 text-rose-500 hover:bg-rose-50 transition-colors flex items-center justify-center" title="Supprimer">
            <i class="fa-solid fa-trash-can text-xs"></i>
          </button>
        </form>
      </div>
    @empty
      <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 md:col-span-2 flex flex-col items-center gap-3 reveal">
        <span class="w-14 h-14 rounded-full bg-sika-50 text-sika-400 flex items-center justify-center animate-float">
          <i class="fa-solid fa-credit-card text-2xl"></i>
        </span>
        <div class="text-slate-500 font-medium">Aucun moyen de paiement enregistré.</div>
        <p class="text-sm text-slate-400 -mt-1.5">Ajoutez-en un pour activer les prélèvements automatiques.</p>
        <a href="{{ route('moyens.create') }}" class="btn-outline !py-2.5 text-sm mt-1">Ajouter un moyen de paiement</a>
      </div>
    @endforelse
  </div>

  <div class="mt-8 flex items-center gap-3 p-4 rounded-2xl bg-slate-50 border border-slate-200 text-xs text-slate-500 reveal">
    <svg class="w-5 h-5 shrink-0 text-sika-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    Les prélèvements automatiques utilisent toujours votre moyen de paiement par défaut (ou celui sélectionné sur chaque prêt / abonnement).
  </div>
</section>
@endsection
