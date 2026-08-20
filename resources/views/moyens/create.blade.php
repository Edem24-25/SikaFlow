@extends('layouts.app')
@section('title','Ajouter un moyen de paiement — SikaFlow')
@section('content')
<section class="max-w-lg mx-auto px-4 py-8 sm:py-12">
  <div class="mb-8 reveal">
    <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
      <i class="fa-solid fa-credit-card text-sika-500"></i> Paiements
    </div>
    <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Ajouter un moyen de paiement</h1>
    <p class="text-slate-500 text-sm mt-1">Sécurisé et crypté par Kkiapay.</p>
  </div>

  <div x-data="{ type: 'mobile_money' }">
    <form method="POST" action="{{ route('moyens.store') }}" class="card p-6 sm:p-8 space-y-5 reveal reveal-delay-1">@csrf
      <div>
        <label class="field-label">Type</label>
        <div class="grid grid-cols-2 gap-3 mt-2">
          <button type="button" @click="type = 'mobile_money'" class="p-4 rounded-2xl border-2 text-left transition-all"
            :class="type === 'mobile_money' ? 'border-sika-500 bg-sika-50 shadow-glow-soft' : 'border-slate-200 hover:border-slate-300'">
            <i class="fa-solid fa-mobile-screen text-xl mb-2" :class="type === 'mobile_money' ? 'text-sika-600' : 'text-slate-400'"></i>
            <div class="text-sm font-semibold" :class="type === 'mobile_money' ? 'text-sika-700' : 'text-slate-600'">Mobile Money</div>
            <div class="text-xs text-slate-400 mt-0.5">MTN, Moov</div>
          </button>
          <button type="button" @click="type = 'bancaire'" class="p-4 rounded-2xl border-2 text-left transition-all"
            :class="type === 'bancaire' ? 'border-sika-500 bg-sika-50 shadow-glow-soft' : 'border-slate-200 hover:border-slate-300'">
            <i class="fa-solid fa-credit-card text-xl mb-2" :class="type === 'bancaire' ? 'text-sika-600' : 'text-slate-400'"></i>
            <div class="text-sm font-semibold" :class="type === 'bancaire' ? 'text-sika-700' : 'text-slate-600'">Carte bancaire</div>
            <div class="text-xs text-slate-400 mt-0.5">Visa, Mastercard</div>
          </button>
        </div>
        <input type="hidden" name="type" :value="type" value="mobile_money">
      </div>

      <div>
        <label class="field-label" x-text="type === 'mobile_money' ? 'Opérateur' : 'Banque / émetteur'"></label>
        <select name="operateur" class="select" x-show="type === 'mobile_money'" x-cloak required>
          <option value="">— Sélectionner —</option>
          <option value="MTN MoMo">MTN Mobile Money</option>
          <option value="Moov Money">Moov Money</option>
          <option value="Autre">Autre opérateur</option>
        </select>
        <input name="operateur" type="text" placeholder="Ex : Ecobank, Visa..." class="input" x-show="type === 'bancaire'" x-cloak required>
      </div>

      <div>
        <label class="field-label" x-text="type === 'mobile_money' ? 'Numéro de téléphone' : 'Numéro de carte'"></label>
        <input name="numero" type="text" :placeholder="type === 'mobile_money' ? '+22997000000' : '**** **** **** ****'" class="input" required>
      </div>

      <div>
        <label class="field-label">Titulaire du compte</label>
        <input name="titulaire" value="{{ auth()->user()->nom }}" class="input" required>
      </div>

      <label class="flex items-center gap-2.5 p-3.5 rounded-xl bg-slate-50 border border-slate-200 cursor-pointer hover:border-sika-300 transition-colors">
        <input type="checkbox" name="is_default" value="1" class="w-4 h-4 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30">
        <span class="text-sm text-slate-700 font-medium">Définir comme moyen par défaut</span>
      </label>

      <button type="submit" class="btn-primary w-full !py-3.5 relative overflow-hidden">
        <i class="fa-solid fa-lock"></i> Ajouter en toute sécurité
        <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
      </button>
    </form>
  </div>
</section>
@endsection
