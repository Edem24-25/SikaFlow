@extends('layouts.app')
@section('title', 'À propos — SikaFlow par HODD GLOBAL')
@section('meta_description', 'Découvrez HODD GLOBAL, la fintech béninoise derrière SikaFlow. Notre mission : simplifier la gestion de vos prêts et abonnements en Afrique de l\'Ouest.')
@section('content')

<x-breadcrumb :items="[
  ['label' => 'Accueil', 'url' => route('home')],
  ['label' => 'À propos'],
]" />

{{-- Hero --}}
<section class="relative overflow-hidden hero-gradient text-white">
  <div class="absolute inset-0 hero-grid"></div>
  <div class="hero-glow w-96 h-96 bg-sika-500/20 -top-20 -right-20 animate-blob"></div>
  <div class="hero-glow w-72 h-72 bg-gold-500/10 bottom-0 left-10 animate-blob" style="animation-delay: -5s"></div>

  <div class="relative max-w-4xl mx-auto px-4 py-20 sm:py-28 text-center">
    <span class="eyebrow-dark animate-fade-up">HODD GLOBAL</span>
    <h1 class="text-4xl sm:text-5xl font-bold mb-5 mt-5 tracking-tight animate-fade-up" style="animation-delay: 0.1s">À propos de <span class="text-gradient">SikaFlow</span></h1>
    <p class="text-slate-300 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed animate-fade-up" style="animation-delay: 0.2s">
      SikaFlow est la première solution phare de <strong class="text-white">HODD GLOBAL</strong>, une jeune structure béninoise évoluant dans le secteur des technologies financières.
    </p>
  </div>
</section>

{{-- Mission --}}
<section class="max-w-4xl mx-auto px-4 py-14 sm:py-20">
  <p class="text-slate-600 mb-12 text-center text-base sm:text-lg leading-relaxed max-w-3xl mx-auto reveal">
    Notre mission : simplifier la gestion quotidienne des engagements financiers récurrents des particuliers — prêts, abonnements, échéances — pour que plus personne ne subisse les pénalités de retard.
  </p>

  <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-6">
    @foreach([
      ['fa-bullseye','Mission','Centraliser le suivi des prêts et abonnements et automatiser les paiements pour réduire oublis et pénalités.'],
      ['fa-globe','Vision','Devenir la référence en Afrique de l\'Ouest pour la gestion automatisée des remboursements.'],
      ['fa-gem','Valeurs','Sécurité, transparence, simplicité et proximité avec nos utilisateurs.'],
    ] as $i => $card)
      <div class="group relative p-6 sm:p-7 rounded-3xl bg-white border border-slate-100 shadow-card card-hover reveal reveal-delay-{{ $i + 1 }} overflow-hidden">
        <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sika-400 to-sika-600 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-500"></div>
        <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sika-50 to-sika-100 text-sika-600 flex items-center justify-center mb-4 group-hover:from-sika-600 group-hover:to-sika-800 group-hover:text-white group-hover:shadow-glow-soft group-hover:scale-105 transition-all duration-300">
          <i class="fa-solid {{ $card[0] }} text-lg"></i>
        </div>
        <h3 class="font-semibold text-lg mb-2 text-night-900">{{ $card[1] }}</h3>
        <p class="text-sm text-slate-600 leading-relaxed">{{ $card[2] }}</p>
      </div>
    @endforeach
  </div>
</section>

{{-- Company info --}}
<section class="py-14 sm:py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-12 items-center">
    <div class="reveal-left">
      <span class="eyebrow-sika mb-4">Qui sommes-nous ?</span>
      <h2 class="text-3xl font-bold text-night-900 mb-5 mt-4 tracking-tight">Une startup fintech béninoise</h2>
      <p class="text-slate-600 leading-relaxed mb-4">
        <strong class="text-slate-800">HODD GLOBAL</strong> est une startup fintech basée à Porto-Novo, au Bénin. Nous développons des solutions numériques accessibles qui répondent aux besoins réels des populations d'Afrique de l'Ouest.
      </p>
      <p class="text-slate-600 leading-relaxed">
        SikaFlow est notre premier produit : une plateforme pensée pour les emprunteurs et abonnés qui veulent une vue claire sur leurs engagements et des paiements sans friction.
      </p>
    </div>
    <div class="reveal-right">
      <div class="relative rounded-3xl bg-gradient-to-br from-sika-50 to-sika-100 border border-sika-100 p-8 sm:p-10 overflow-hidden">
        <div class="absolute -top-10 -right-10 w-40 h-40 bg-white/70 rounded-full blur-2xl"></div>
        <h3 class="font-semibold text-night-900 mb-6 text-lg">En chiffres</h3>
        <div class="grid grid-cols-2 gap-6 relative">
          @foreach([
            ['2024', 'Année de lancement'],
            ['Bénin', 'Siège social'],
            ['Fintech', 'Secteur d\'activité'],
            ['100', 'Made in Africa'],
          ] as $stat)
            <div class="group">
              <div class="text-3xl font-bold text-sika-600 tracking-tight" @if(is_numeric($stat[0])) data-counter="{{ $stat[0] }}" data-suffix=" %" @endif>{{ is_numeric($stat[0]) ? '0' : $stat[0] }}</div>
              <div class="text-xs text-slate-500 mt-1">{{ $stat[1] }}</div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Timeline --}}
<section class="py-14 sm:py-20">
  <div class="max-w-6xl mx-auto px-4">
    <div class="section-head reveal">
      <span class="eyebrow-gold mb-4">Notre parcours</span>
      <h2 class="text-3xl font-bold text-night-900 tracking-tight mt-4">Une vision tournée vers l'Afrique</h2>
    </div>
    <div class="grid sm:grid-cols-3 gap-6">
      @foreach([
        ['fa-lightbulb', 'Idée & conception', 'Identifier les douleurs des emprunteurs face aux pénalités et concevoir une réponse simple et mobile-first.'],
        ['fa-rocket', 'Lancement', 'Déployer la plateforme au Bénin avec des paiements Mobile Money natifs et un support local.'],
        ['fa-earth-africa', 'Expansion', 'Étendre la solution à toute l\'Afrique de l\'Ouest avec de nouveaux partenaires de paiement.'],
      ] as $i => $step)
        <div class="group p-6 rounded-3xl bg-white border border-slate-100 shadow-card card-hover text-center reveal reveal-delay-{{ $i + 1 }}">
          <div class="w-12 h-12 mx-auto rounded-2xl bg-gradient-to-br from-gold-400/20 to-gold-500/20 text-gold-500 flex items-center justify-center mb-4 group-hover:from-gold-400 group-hover:to-gold-500 group-hover:text-night-900 group-hover:scale-105 transition-all duration-300">
            <i class="fa-solid {{ $step[0] }} text-lg"></i>
          </div>
          <h3 class="font-semibold text-night-900 mb-2">{{ $step[1] }}</h3>
          <p class="text-sm text-slate-600 leading-relaxed">{{ $step[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Team --}}
<section class="py-14 sm:py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4">
    <div class="section-head reveal">
      <span class="eyebrow-gold mb-4">Notre équipe</span>
      <h2 class="text-3xl font-bold text-night-900 tracking-tight mt-4">Les visages derrière SikaFlow</h2>
      <p class="text-slate-600 mt-4 max-w-xl mx-auto">Une équipe passionnée et engagée au service de vos finances.</p>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
      @foreach([
        ['H','Hododjinou','Fondateur & CEO','Visionnaire et passionné par la fintech, il mène la mission de SikaFlow depuis le Bénin.'],
        ['E','Équipe technique','Développement','Une équipe dévouée de développeurs et designers au service de l\'expérience utilisateur.'],
        ['S','Support client','Accompagnement','Notre équipe de support est disponible du lundi au vendredi pour répondre à toutes vos questions.'],
      ] as $i => $member)
        <div class="group text-center p-7 rounded-3xl bg-slate-50 border border-slate-100 card-hover reveal reveal-delay-{{ $i + 1 }}">
          <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-sika-500 to-sika-700 text-white flex items-center justify-center text-2xl font-bold mb-5 shadow-soft group-hover:scale-105 group-hover:shadow-glow-soft transition-all duration-300">{{ $member[0] }}</div>
          <h3 class="font-semibold text-lg text-night-900">{{ $member[1] }}</h3>
          <div class="text-sm text-sika-600 font-medium mt-1">{{ $member[2] }}</div>
          <p class="text-sm text-slate-500 mt-3 leading-relaxed">{{ $member[3] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="py-16 sm:py-24 px-4">
  <div class="relative max-w-5xl mx-auto rounded-[2.5rem] hero-gradient text-white p-10 sm:p-16 text-center overflow-hidden shadow-lift">
    <div class="absolute inset-0 hero-grid opacity-70"></div>
    <div class="hero-glow w-72 h-72 bg-sika-500/25 -top-16 -right-16 animate-blob"></div>
    <div class="relative reveal">
      <h2 class="text-3xl sm:text-4xl font-bold tracking-tight mb-4">Faisons grandir SikaFlow ensemble</h2>
      <p class="text-slate-300 mb-8 max-w-xl mx-auto">Rejoignez la communauté ou contactez-nous pour un partenariat.</p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5">
        <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-white text-sika-700 font-bold hover:bg-sika-50 transition-all hover:-translate-y-0.5 shadow-lift">Créer mon compte</a>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-8 py-3.5 rounded-full border border-white/30 bg-white/5 backdrop-blur hover:bg-white/10 transition-all duration-300 hover:-translate-y-0.5 font-semibold">Nous contacter</a>
      </div>
    </div>
  </div>
</section>

@endsection
