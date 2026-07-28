@extends('layouts.app')
@section('title','Mes abonnements — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-6">
    <h1 class="text-2xl sm:text-3xl font-bold">Mes abonnements</h1>
    <a href="{{ route('abonnements.create') }}" class="w-full sm:w-auto text-center px-4 py-2.5 rounded-xl bg-sika-600 text-white font-semibold hover:bg-sika-700 transition-all hover:-translate-y-0.5">+ Nouvel abonnement</a>
  </div>
  <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5">
    @forelse($abonnements as $a)
      <div class="bg-white rounded-2xl border border-slate-100 shadow-soft overflow-hidden card-hover flex flex-col">
        {{-- Image inspirée du libellé --}}
        <div class="relative h-36 overflow-hidden">
          <x-subscription-image :title="$a->libelle" class="w-full h-full" />
          {{-- Overlay dégradé --}}
          <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
          {{-- Logo du fournisseur en haut à droite --}}
          <div class="absolute top-3 right-3 w-9 h-9 rounded-lg overflow-hidden border-2 border-white shadow-md bg-white">
            <x-company-logo :name="$a->fournisseur" class="w-full h-full object-cover" />
          </div>
          {{-- Montant en bas à gauche --}}
          <div class="absolute bottom-3 left-3">
            <span class="text-white font-bold text-lg drop-shadow">{{ number_format($a->montant,0,',',' ') }} FCFA</span>
            <span class="ml-1 text-white/80 text-xs">/ {{ $a->periodicite }}</span>
          </div>
        </div>
        {{-- Infos --}}
        <div class="p-4 flex flex-col flex-1">
          <div class="font-semibold text-slate-800">{{ $a->libelle }}</div>
          <div class="text-sm text-slate-500 mt-0.5">{{ $a->fournisseur }}</div>
          <div class="flex items-center gap-1.5 mt-2 text-xs text-slate-400">
            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Prochaine : {{ $a->prochaine_echeance->format('d/m/Y') }}
          </div>
          <div class="mt-auto pt-4 flex gap-2">
            <a href="{{ route('abonnements.edit', $a) }}" class="flex-1 text-center text-xs px-3 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">Modifier</a>
            <form method="POST" action="{{ route('abonnements.destroy', $a) }}" onsubmit="return confirm('Supprimer ?')">@csrf @method('DELETE')
              <button class="text-xs px-3 py-2 rounded-lg border border-rose-200 text-rose-700 hover:bg-rose-50 transition-colors">Supprimer</button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="p-8 text-center text-slate-500 bg-white rounded-2xl border border-slate-100 sm:col-span-2 lg:col-span-3">Aucun abonnement enregistré.</div>
    @endforelse
  </div>
  <div class="mt-4">{{ $abonnements->links() }}</div>
</section>
@endsection
