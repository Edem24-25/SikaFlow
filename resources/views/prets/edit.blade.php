@extends('layouts.app')
@section('title', 'Modifier le prêt — SikaFlow')
@section('content')
<section class="max-w-3xl mx-auto px-4 py-8 sm:py-12">
  <div class="mb-8 reveal">
    <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
      <i class="fa-solid fa-file-invoice-dollar text-sika-500"></i> Prêts
    </div>
    <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Modifier le prêt <span class="font-mono">{{ $pret->reference }}</span></h1>
    <p class="text-slate-500 text-sm mt-1">Mettez à jour les informations de votre prêt.</p>
  </div>

  <form method="POST" action="{{ route('prets.update', $pret) }}" class="card p-6 sm:p-8 space-y-5 reveal reveal-delay-1">
    @csrf @method('PUT')

    <div>
      <h2 class="font-semibold text-night-900 mb-4 flex items-center gap-2.5">
        <span class="w-8 h-8 rounded-xl bg-sika-100 text-sika-600 flex items-center justify-center text-sm"><i class="fa-solid fa-file-invoice-dollar"></i></span>
        Informations du prêt
      </h2>
      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="field-label">Créancier</label>
          <select name="creancier_id" class="select" required>
            @foreach($creanciers as $c)
              <option value="{{ $c->id }}" @selected(old('creancier_id', $pret->creancier_id ?? '') == $c->id)>{{ $c->nom }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="field-label">Montant principal (FCFA)</label>
          <input type="number" step="0.01" name="montant_principal" value="{{ old('montant_principal', $pret->montant_principal ?? '') }}" class="input" required>
        </div>
        <div>
          <label class="field-label">Taux d'intérêt annuel (%)</label>
          <input type="number" step="0.01" name="taux_interet" value="{{ old('taux_interet', $pret->taux_interet ?? '0') }}" class="input" required>
        </div>
        <div>
          <label class="field-label">Durée (mois)</label>
          <input type="number" name="duree_mois" value="{{ old('duree_mois', $pret->duree_mois ?? '12') }}" class="input" required>
        </div>
        <div>
          <label class="field-label">Périodicité</label>
          <select name="periodicite" class="select">
            @foreach(['mensuelle','trimestrielle','annuelle'] as $p)
              <option value="{{ $p }}" @selected(old('periodicite', $pret->periodicite ?? 'mensuelle') == $p)>{{ $p }}</option>
            @endforeach
          </select>
        </div>
        <div>
          <label class="field-label">Date de début</label>
          <input type="date" name="date_debut" value="{{ old('date_debut', isset($pret) ? $pret->date_debut->format('Y-m-d') : now()->format('Y-m-d')) }}" class="input" required>
        </div>
        <div>
          <label class="field-label">Moyen de paiement (auto)</label>
          <select name="moyen_paiement_id" class="select">
            <option value="">— Aucun —</option>
            @foreach($moyens as $m)
              <option value="{{ $m->id }}" @selected(old('moyen_paiement_id', $pret->moyen_paiement_id ?? '') == $m->id)>{{ $m->operateur }} · {{ $m->numero }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex items-center gap-2.5 mt-6 p-3.5 rounded-xl bg-slate-50 border border-slate-200">
          <input type="hidden" name="prelevement_auto" value="0">
          <input type="checkbox" name="prelevement_auto" value="1" id="pauto" @checked(old('prelevement_auto', $pret->prelevement_auto ?? false)) class="w-4 h-4 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30">
          <label for="pauto" class="text-sm text-slate-700 font-medium cursor-pointer">Activer le prélèvement automatique</label>
        </div>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3">
      <button type="submit" class="btn-primary flex-1 !py-3.5 relative overflow-hidden">
        <i class="fa-solid fa-floppy-disk"></i> Mettre à jour
        <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
      </button>
      <a href="{{ route('prets.show', $pret) }}" class="btn-ghost border border-slate-200">Annuler</a>
    </div>
  </form>
</section>
@endsection
