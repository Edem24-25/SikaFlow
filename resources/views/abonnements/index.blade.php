@extends('layouts.app')
@section('title','Mes abonnements — SikaFlow')
@section('content')
<section class="max-w-7xl mx-auto px-4 py-8 sm:py-12">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-arrows-rotate text-sika-500"></i> Services récurrents
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Mes abonnements</h1>
      <p class="text-slate-500 text-sm mt-1">Canal+, Internet, streaming — tout regroupé.</p>
    </div>
    <a href="{{ route('abonnements.create') }}" class="btn-primary relative overflow-hidden">
      <i class="fa-solid fa-plus"></i> Nouvel abonnement
      <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
    </a>
  </div>

  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
    @forelse($abonnements as $a)
      <div class="group bg-white rounded-3xl border border-slate-100 shadow-card overflow-hidden flex flex-col hover:-translate-y-1.5 hover:shadow-lift transition-all duration-300 reveal">
        <div class="relative">
          <div class="absolute inset-0 z-30 bg-black/35 group-hover:bg-black/25 transition-colors duration-300"></div>
          <x-subscription-image :title="$a->libelle" class="aspect-[16/9] w-full object-cover grayscale-[0.3] transition-all duration-500 group-hover:scale-105 group-hover:grayscale-0" />
          <div class="absolute inset-0 z-20 bg-gradient-to-t from-black/70 via-black/10 to-transparent"></div>
          @php
            $badgeMap = ['actif' => 'bg-emerald-500/90 text-white', 'suspendu' => 'bg-amber-500/90 text-white'];
            $badgeClass = $badgeMap[$a->statut] ?? 'bg-slate-500/90 text-white';
          @endphp
          <div class="absolute top-3.5 left-3.5 z-40">
            <span class="text-xs font-semibold px-2.5 py-1 rounded-full {{ $badgeClass }} backdrop-blur-sm shadow-soft">{{ $a->statut }}</span>
          </div>
          <div class="absolute top-3.5 right-3.5 z-40 w-10 h-10 rounded-xl overflow-hidden border-2 border-white/90 shadow-md bg-white">
            <x-company-logo :name="$a->fournisseur" class="w-full h-full object-cover" />
          </div>
          <div class="absolute bottom-3.5 left-3.5 z-40">
            <span class="text-white font-bold text-xl drop-shadow-lg">{{ number_format($a->montant,0,',',' ') }} FCFA</span>
            <span class="ml-1 text-white/80 text-xs">/ {{ $a->periodicite }}</span>
          </div>
          @if($a->prelevement_auto)
            <div class="absolute bottom-3.5 right-3.5 z-40 px-2 py-1 rounded-lg bg-sika-500/90 text-white text-[10px] font-bold uppercase tracking-wider backdrop-blur-sm">
              <i class="fa-solid fa-rotate mr-1"></i>Auto
            </div>
          @endif
        </div>
        <div class="p-5 flex flex-col flex-1 gap-1.5">
          <div class="font-semibold text-night-900 leading-tight text-lg">{{ $a->libelle }}</div>
          <div class="text-sm text-slate-500">{{ $a->fournisseur }}</div>
          <div class="flex items-center gap-2 mt-1.5 text-xs text-slate-400">
            <span class="w-7 h-7 rounded-lg bg-slate-50 border border-slate-100 flex items-center justify-center">
              <i class="fa-solid fa-calendar text-[10px] text-sika-500"></i>
            </span>
            Prochaine : {{ $a->prochaine_echeance->format('d/m/Y') }}
          </div>
          <div class="mt-auto pt-4 flex gap-2.5">
            <a href="{{ route('abonnements.edit', $a) }}" class="flex-1 text-center text-sm px-3 py-2.5 rounded-xl border border-slate-200 text-slate-600 hover:border-sika-400 hover:text-sika-700 hover:bg-sika-50 transition-all duration-200 font-semibold">Modifier</a>
            <form method="POST" action="{{ route('abonnements.destroy', $a) }}" onsubmit="return confirm('Supprimer ?')">@csrf @method('DELETE')
              <button class="text-sm px-3.5 py-2.5 rounded-xl border border-rose-200 text-rose-600 hover:bg-rose-50 transition-colors">
                <i class="fa-solid fa-trash-can"></i>
              </button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="p-12 text-center bg-white rounded-3xl border border-slate-100 sm:col-span-2 lg:col-span-3 flex flex-col items-center gap-3 reveal">
        <span class="w-14 h-14 rounded-full bg-gold-400/15 text-gold-500 flex items-center justify-center animate-float">
          <i class="fa-solid fa-arrows-rotate text-2xl"></i>
        </span>
        <div class="text-slate-500 font-medium">Aucun abonnement enregistré.</div>
        <a href="{{ route('abonnements.create') }}" class="btn-outline !py-2.5 text-sm mt-1">Ajouter votre premier abonnement</a>
      </div>
    @endforelse
  </div>
  <div class="mt-5">{{ $abonnements->links() }}</div>
</section>
@endsection
