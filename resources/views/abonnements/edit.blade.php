@extends('layouts.app')
@section('title','Modifier l\'abonnement — SikaFlow')
@section('content')
<section class="max-w-3xl mx-auto px-4 py-8 sm:py-12">
  <div class="mb-8 reveal">
    <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
      <i class="fa-solid fa-arrows-rotate text-sika-500"></i> Abonnements
    </div>
    <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Modifier l'abonnement</h1>
    <p class="text-slate-500 text-sm mt-1">Mettez à jour les informations de l'abonnement.</p>
  </div>

  <form method="POST" action="{{ route('abonnements.update', $abonnement) }}" class="card p-6 sm:p-8 space-y-5 reveal reveal-delay-1">
    @csrf @method('PUT')
    <div class="grid md:grid-cols-2 gap-4">
      <div>
        <label class="field-label">Libellé</label>
        <input type="text" name="libelle" value="{{ old('libelle', $abonnement->libelle ?? '') }}" class="input" required placeholder="Ex : Abonnement Canal+ Premium">
      </div>
      <div>
        <label class="field-label">Fournisseur</label>
        <input type="text" name="fournisseur" value="{{ old('fournisseur', $abonnement->fournisseur ?? '') }}" class="input" required placeholder="Ex : Canal+, MTN">
      </div>
      <div>
        <label class="field-label">Montant (FCFA)</label>
        <input type="number" step="0.01" name="montant" value="{{ old('montant', $abonnement->montant ?? '') }}" class="input" required>
      </div>
      <div>
        <label class="field-label">Périodicité</label>
        <select name="periodicite" class="select">
          @foreach(['hebdomadaire','mensuelle','annuelle'] as $p)
            <option value="{{ $p }}" @selected(old('periodicite', $abonnement->periodicite ?? 'mensuelle') == $p)>{{ $p }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="field-label">Prochaine échéance</label>
        <input type="date" name="prochaine_echeance" value="{{ old('prochaine_echeance', $abonnement->prochaine_echeance->format('Y-m-d')) }}" class="input" required>
      </div>
      <div class="md:col-span-2">
        <label class="field-label">Moyen de paiement (auto)</label>
        <select name="moyen_paiement_id" class="select">
          <option value="">— Aucun —</option>
          @foreach($moyens as $m)
            <option value="{{ $m->id }}" @selected(old('moyen_paiement_id', $abonnement->moyen_paiement_id ?? '') == $m->id)>{{ $m->operateur }} · {{ $m->numero }}</option>
          @endforeach
        </select>
      </div>
    </div>

    <div class="flex items-center gap-2.5 p-3.5 rounded-xl bg-slate-50 border border-slate-200">
      <input type="hidden" name="prelevement_auto" value="0">
      <input type="checkbox" name="prelevement_auto" value="1" id="pauto" @checked(old('prelevement_auto', $abonnement->prelevement_auto ?? false)) class="w-4 h-4 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30">
      <label for="pauto" class="text-sm text-slate-700 font-medium cursor-pointer">Activer le prélèvement automatique</label>
    </div>

    <div class="flex flex-col sm:flex-row gap-3">
      <button type="submit" class="btn-primary flex-1 !py-3.5 relative overflow-hidden">
        <i class="fa-solid fa-floppy-disk"></i> Mettre à jour
        <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
      </button>
      <a href="{{ route('abonnements.index') }}" class="btn-ghost border border-slate-200">Annuler</a>
    </div>
  </form>
</section>
@endsection
