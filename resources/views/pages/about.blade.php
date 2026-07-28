@extends('layouts.app')
@section('title', 'À propos — SikaFlow par HODD GLOBAL')
@section('content')

{{-- Hero --}}
<section class="hero-gradient text-white py-16 sm:py-20">
  <div class="max-w-4xl mx-auto px-4 text-center">
    <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-xs uppercase tracking-widest text-sika-200 mb-4 reveal">HODD GLOBAL</span>
    <h1 class="text-3xl sm:text-4xl font-bold mb-4 reveal reveal-delay-1">À propos de SikaFlow</h1>
    <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed reveal reveal-delay-2">
      SikaFlow est la première solution phare de <strong class="text-white">HODD GLOBAL</strong>, une jeune structure béninoise évoluant dans le secteur des technologies financières.
    </p>
  </div>
</section>

<section class="max-w-4xl mx-auto px-4 py-12 sm:py-16">
  <p class="text-slate-600 mb-10 text-center text-sm sm:text-base leading-relaxed reveal">
    Notre mission : simplifier la gestion quotidienne des engagements financiers récurrents des particuliers — prêts, abonnements, échéances — pour que plus personne ne subisse les pénalités de retard.
  </p>

  <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-5 sm:gap-6">
    @foreach([
      ['fa-bullseye','Mission','Centraliser le suivi des prêts et abonnements et automatiser les paiements pour réduire oublis et pénalités.'],
      ['fa-globe','Vision','Devenir la référence en Afrique de l\'Ouest pour la gestion automatisée des remboursements.'],
      ['fa-gem','Valeurs','Sécurité, transparence, simplicité et proximité avec nos utilisateurs.'],
    ] as $i => $card)
      <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-100 shadow-soft card-hover reveal reveal-delay-{{ $i + 1 }}">
        <div class="w-11 h-11 rounded-xl bg-sika-50 text-sika-600 flex items-center justify-center mb-3">
          <i class="fa-solid {{ $card[0] }} text-lg"></i>
        </div>
        <h3 class="font-semibold text-lg mb-2">{{ $card[1] }}</h3>
        <p class="text-sm text-slate-600 leading-relaxed">{{ $card[2] }}</p>
      </div>
    @endforeach
  </div>

  {{-- Team / company info --}}
  <div class="mt-12 sm:mt-16 grid md:grid-cols-2 gap-8 items-center">
    <div class="reveal">
      <h2 class="text-2xl font-bold text-night-900 mb-4">Qui sommes-nous ?</h2>
      <p class="text-slate-600 text-sm sm:text-base leading-relaxed mb-4">
        <strong>HODD GLOBAL</strong> est une startup fintech basée à Porto-Novo, au Bénin. Nous développons des solutions numériques accessibles qui répondent aux besoins réels des populations d'Afrique de l'Ouest.
      </p>
      <p class="text-slate-600 text-sm sm:text-base leading-relaxed">
        SikaFlow est notre premier produit : une plateforme pensée pour les emprunteurs et abonnés qui veulent une vue claire sur leurs engagements et des paiements sans friction.
      </p>
    </div>
    <div class="rounded-2xl bg-sika-50 border border-sika-100 p-6 sm:p-8 reveal reveal-delay-2">
      <h3 class="font-semibold text-night-900 mb-4">En chiffres</h3>
      <div class="grid grid-cols-2 gap-4">
        @foreach([
          ['2024', 'Année de lancement'],
          ['Bénin', 'Siège social'],
          ['Fintech', 'Secteur d\'activité'],
          ['100 %', 'Made in Africa'],
        ] as $stat)
          <div>
            <div class="text-xl font-bold text-sika-600">{{ $stat[0] }}</div>
            <div class="text-xs text-slate-500 mt-0.5">{{ $stat[1] }}</div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

@endsection
