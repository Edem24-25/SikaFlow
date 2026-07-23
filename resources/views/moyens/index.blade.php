@extends('layouts.app')
@section('title','Moyens de paiement — SikaFlow')
@section('content')
<section class="max-w-4xl mx-auto px-4 py-10">
  <div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Mes moyens de paiement</h1>
    <a href="{{ route('moyens.create') }}" class="px-4 py-2 rounded-xl bg-sika-600 text-white font-semibold">+ Ajouter</a>
  </div>
  <div class="grid md:grid-cols-2 gap-4">
    @forelse($moyens as $m)
      <div class="p-5 bg-white rounded-2xl border border-slate-100 shadow-soft flex justify-between items-center">
        <div>
          <div class="text-xs uppercase text-slate-400">{{ $m->type === 'mobile_money' ? 'Mobile Money' : 'Bancaire' }}</div>
          <div class="font-semibold text-lg">{{ $m->operateur }}</div>
          <div class="text-sm text-slate-500">{{ $m->numero }} — {{ $m->titulaire }}</div>
          @if($m->is_default)<span class="text-xs mt-1 inline-block px-2 py-0.5 rounded-full bg-gold-500/20 text-gold-500">Par défaut</span>@endif
        </div>
        <form method="POST" action="{{ route('moyens.destroy', $m) }}" onsubmit="return confirm('Supprimer ?')">@csrf @method('DELETE')
          <button class="text-xs px-3 py-1 rounded border border-rose-200 text-rose-700">Supprimer</button>
        </form>
      </div>
    @empty
      <div class="p-8 text-center text-slate-500 bg-white rounded-2xl border border-slate-100 md:col-span-2">Aucun moyen de paiement. Ajoutez-en un pour activer les prélèvements automatiques.</div>
    @endforelse
  </div>
</section>
@endsection
