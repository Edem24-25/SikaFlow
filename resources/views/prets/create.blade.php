@extends('layouts.app')
@section('title', 'Nouveau prêt — SikaFlow')
@section('content')
<section class="max-w-3xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Enregistrer un nouveau prêt</h1>
  <form method="POST" action="{{ route('prets.store') }}" class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 space-y-4">
    @csrf
    
      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="text-sm font-medium">Créancier</label>
          <select name="creancier_id" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required>
            @foreach($creanciers as $c)
              <option value="{{ $c->id }}" @selected(old('creancier_id', $pret->creancier_id ?? '') == $c->id)>{{ $c->nom }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="text-sm font-medium">Montant principal (FCFA)</label>
          <input type="number" step="0.01" name="montant_principal" value="{{ old('montant_principal', $pret->montant_principal ?? '') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required>
        </div>
        <div>
          <label class="text-sm font-medium">Taux d'intérêt annuel (%)</label>
          <input type="number" step="0.01" name="taux_interet" value="{{ old('taux_interet', $pret->taux_interet ?? '0') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required>
        </div>
        <div>
          <label class="text-sm font-medium">Durée (mois)</label>
          <input type="number" name="duree_mois" value="{{ old('duree_mois', $pret->duree_mois ?? '12') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required>
        </div>
        <div>
          <label class="text-sm font-medium">Périodicité</label>
          <select name="periodicite" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2">
            @foreach(['mensuelle','trimestrielle','annuelle'] as $p)
              <option value="{{ $p }}" @selected(old('periodicite', $pret->periodicite ?? 'mensuelle') == $p)>{{ $p }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="text-sm font-medium">Date de début</label>
          <input type="date" name="date_debut" value="{{ old('date_debut', isset($pret) ? $pret->date_debut->format('Y-m-d') : now()->format('Y-m-d')) }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required>
        </div>
        <div>
          <label class="text-sm font-medium">Moyen de paiement (auto)</label>
          <select name="moyen_paiement_id" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2">
            <option value="">— Aucun —</option>
            @foreach($moyens as $m)
              <option value="{{ $m->id }}" @selected(old('moyen_paiement_id', $pret->moyen_paiement_id ?? '') == $m->id)>{{ $m->operateur }} · {{ $m->numero }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex items-center gap-2 mt-6">
          <input type="hidden" name="prelevement_auto" value="0">
          <input type="checkbox" name="prelevement_auto" value="1" id="pauto" @checked(old('prelevement_auto', $pret->prelevement_auto ?? false))>
          <label for="pauto" class="text-sm">Activer le prélèvement automatique</label>
        </div>
      </div>

    <button class="w-full py-2.5 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Enregistrer et générer l'échéancier</button>
  </form>
</section>
@endsection
