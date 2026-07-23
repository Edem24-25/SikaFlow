@extends('layouts.app')
@section('title','Modifier abonnement — SikaFlow')
@section('content')
<section class="max-w-2xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Modifier l'abonnement</h1>
  <form method="POST" action="{{ route('abonnements.update', $abonnement) }}" class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 space-y-4">@csrf @method('PUT')
      <div class="grid md:grid-cols-2 gap-4">
        <div><label class="text-sm font-medium">Libellé</label><input name="libelle" value="{{ old('libelle', $abonnement->libelle ?? '') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
        <div><label class="text-sm font-medium">Fournisseur</label><input name="fournisseur" value="{{ old('fournisseur', $abonnement->fournisseur ?? '') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
        <div><label class="text-sm font-medium">Montant (FCFA)</label><input type="number" step="0.01" name="montant" value="{{ old('montant', $abonnement->montant ?? '') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
        <div>
          <label class="text-sm font-medium">Périodicité</label>
          <select name="periodicite" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2">
            @foreach(['hebdomadaire','mensuelle','annuelle'] as $p)
              <option value="{{ $p }}" @selected(old('periodicite', $abonnement->periodicite ?? 'mensuelle')==$p)>{{ $p }}</option>
            @endforeach
          </select>
        </div>
        <div><label class="text-sm font-medium">Prochaine échéance</label><input type="date" name="prochaine_echeance" value="{{ old('prochaine_echeance', isset($abonnement) ? $abonnement->prochaine_echeance->format('Y-m-d') : now()->addMonth()->format('Y-m-d')) }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
        <div>
          <label class="text-sm font-medium">Moyen de paiement</label>
          <select name="moyen_paiement_id" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2">
            <option value="">—</option>
            @foreach($moyens as $m)
              <option value="{{ $m->id }}" @selected(old('moyen_paiement_id', $abonnement->moyen_paiement_id ?? '')==$m->id)>{{ $m->operateur }} · {{ $m->numero }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex items-center gap-2 mt-6 md:col-span-2">
          <input type="hidden" name="prelevement_auto" value="0">
          <input type="checkbox" name="prelevement_auto" value="1" id="pauto" @checked(old('prelevement_auto', $abonnement->prelevement_auto ?? false))>
          <label for="pauto" class="text-sm">Prélèvement automatique</label>
        </div>
      </div>

    <button class="w-full py-2.5 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Mettre à jour</button>
  </form>
</section>
@endsection
