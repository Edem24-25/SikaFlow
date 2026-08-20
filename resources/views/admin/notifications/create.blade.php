@extends('layouts.app')
@section('title','Diffuser une notification — SikaFlow')
@section('content')
<section class="max-w-2xl mx-auto px-4 py-8 sm:py-12">
  <div class="mb-8 reveal">
    <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
      <i class="fa-solid fa-bullhorn text-sika-500"></i> Administration
    </div>
    <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Diffuser une notification</h1>
    <p class="text-slate-500 text-sm mt-1">Annonces, maintenance, incidents — envoyé à tous les utilisateurs ciblés.</p>
  </div>

  <form method="POST" action="{{ route('admin.notifications.store') }}" class="card p-6 sm:p-8 space-y-5 reveal reveal-delay-1">@csrf
    <div>
      <label class="field-label">Cible</label>
      <div class="grid grid-cols-3 gap-2.5 mt-2" x-data="{ cible: 'tous' }">
        @foreach(['tous' => 'Tous', 'actifs' => 'Actifs', 'suspendus' => 'Suspendus'] as $val => $label)
          <button type="button" @click="cible = '{{ $val }}'" class="p-3 rounded-xl border-2 text-sm font-semibold transition-all"
            :class="cible === '{{ $val }}' ? 'border-sika-500 bg-sika-50 text-sika-700 shadow-glow-soft' : 'border-slate-200 text-slate-500 hover:border-slate-300'">
            {{ $label }}
          </button>
        @endforeach
        <input type="hidden" name="cible" :value="cible" value="tous">
      </div>
    </div>

    <div>
      <label class="field-label">Titre</label>
      <div class="relative">
        <i class="fa-solid fa-heading text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-sm pointer-events-none"></i>
        <input name="titre" class="input !pl-10" placeholder="Ex : Maintenance programmée" required>
      </div>
    </div>

    <div>
      <label class="field-label">Message</label>
      <textarea name="message" rows="5" class="input resize-none" placeholder="Détail de votre annonce..." required></textarea>
    </div>

    <div class="flex items-center gap-2.5 p-3.5 rounded-xl bg-amber-50 border border-amber-200 text-xs text-amber-700">
      <i class="fa-solid fa-triangle-exclamation shrink-0"></i>
      La notification sera immédiatement envoyée à tous les utilisateurs de la cible sélectionnée.
    </div>

    <button type="submit" class="btn-primary w-full !py-3.5 relative overflow-hidden">
      <i class="fa-solid fa-paper-plane"></i> Diffuser la notification
      <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
    </button>
  </form>
</section>
@endsection
