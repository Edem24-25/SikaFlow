@extends('layouts.app')
@section('title','Mes abonnements — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Mes abonnements</h1>
    <a href="{{ route('abonnements.create') }}" class="px-4 py-2.5 rounded-xl bg-sika-600 text-white font-semibold hover:bg-sika-700">+ Nouvel abonnement</a>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    @forelse($abonnements as $a)
      <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-soft flex justify-between items-center">
        <div>
          <div class="font-semibold">{{ $a->libelle }}</div>
          <div class="text-sm text-slate-500">{{ $a->fournisseur }} · {{ $a->periodicite }}</div>
          <div class="text-xs text-slate-400 mt-1">Prochaine : {{ $a->prochaine_echeance->format('d/m/Y') }}</div>
        </div>
        <div class="text-right">
          <div class="font-bold">{{ number_format($a->montant,0,',',' ') }} FCFA</div>
          <div class="mt-2 flex gap-2 justify-end">
            <a href="{{ route('abonnements.edit', $a) }}" class="text-xs px-2 py-1 rounded border border-slate-200">Modifier</a>
            <form method="POST" action="{{ route('abonnements.destroy', $a) }}" onsubmit="return confirm('Supprimer ?')">@csrf @method('DELETE')
              <button class="text-xs px-2 py-1 rounded border border-rose-200 text-rose-700">Supprimer</button>
            </form>
          </div>
        </div>
      </div>
    @empty
      <div class="p-8 text-center text-slate-500 bg-white rounded-2xl border border-slate-100 md:col-span-2">Aucun abonnement.</div>
    @endforelse
  </div>
  <div class="mt-4">{{ $abonnements->links() }}</div>
</section>
@endsection
