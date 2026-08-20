@extends('layouts.app')
@section('title', 'Contact — SikaFlow')
@section('meta_description', 'Contactez l\'équipe SikaFlow à Porto-Novo, Bénin. Questions, partenariats ou support technique — nous vous répondrons sous 24 heures.')

@push('styles')
<style>
  .contact-card-icon {
    @apply w-12 h-12 rounded-2xl bg-gradient-to-br from-sika-50 to-sika-100 text-sika-600 flex items-center justify-center group-hover:from-sika-600 group-hover:to-sika-800 group-hover:text-white group-hover:shadow-glow-soft transition-all duration-300;
  }
</style>
@endpush

@section('content')

<x-breadcrumb :items="[
  ['label' => 'Accueil', 'url' => route('home')],
  ['label' => 'Contact'],
]" />

{{-- Hero --}}
<section class="relative overflow-hidden hero-gradient text-white">
  <div class="absolute inset-0 hero-grid"></div>
  <div class="hero-glow w-96 h-96 bg-sika-500/20 -top-20 -right-20 animate-blob"></div>
  <div class="hero-glow w-72 h-72 bg-gold-500/10 bottom-0 left-10 animate-blob" style="animation-delay: -5s"></div>

  <div class="relative max-w-3xl mx-auto px-4 py-20 sm:py-28 text-center">
    <span class="eyebrow-dark animate-fade-up">Contact</span>
    <h1 class="text-4xl sm:text-5xl font-bold mb-5 mt-5 tracking-tight animate-fade-up" style="animation-delay: 0.1s">Parlons de vos finances</h1>
    <p class="text-slate-300 text-sm sm:text-base animate-fade-up" style="animation-delay: 0.2s">Une question, un partenariat ou un retour ? Notre équipe HODD GLOBAL est à votre écoute.</p>
  </div>
</section>

<section class="max-w-6xl mx-auto px-4 py-14 sm:py-20">
  <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
    {{-- Contact info --}}
    <div class="space-y-5">
      @foreach([
        ['fa-location-dot','HODD GLOBAL','Siège social','Porto-Novo, Bénin'],
        ['fa-phone','Téléphone','Appelez-nous','01 97 45 87 25','tel:+2290197458725'],
        ['fa-envelope','E-mail','Écrivez-nous','hoddglobal.contacts@gmail.com','mailto:hoddglobal.contacts@gmail.com'],
        ['fa-globe','Site web','Découvrez HODD GLOBAL','www.hoddglobal.com','https://www.hoddglobal.com'],
      ] as $i => $c)
        <a href="{{ $c[4] ?? '#' }}" @if(isset($c[4]) && str_starts_with($c[4],'http')) target="_blank" rel="noopener" @endif class="group flex items-start gap-4 p-5 sm:p-6 rounded-3xl bg-white border border-slate-100 shadow-card card-hover reveal reveal-delay-{{ $i + 1 }}">
          <div class="contact-card-icon">
            <i class="fa-solid {{ $c[0] }} text-lg"></i>
          </div>
          <div class="min-w-0">
            <div class="font-semibold text-night-900">{{ $c[1] }}</div>
            <div class="text-xs text-slate-400">{{ $c[2] }}</div>
            <div class="text-sm text-sika-700 mt-1 break-all font-medium">{{ $c[3] }}</div>
          </div>
        </a>
      @endforeach

      {{-- Carte --}}
      <div class="reveal reveal-delay-5 rounded-3xl overflow-hidden border border-slate-100 shadow-card">
        <iframe
          src="https://www.openstreetmap.org/export/embed.html?bbox=2.60496%2C6.47984%2C2.64496%2C6.49984&layer=mapnik&marker=6.48984%2C2.62496"
          class="w-full h-56 sm:h-64"
          loading="lazy"
          title="Carte — Porto-Novo, Bénin"
        ></iframe>
        <a href="https://www.openstreetmap.org/?mlat=6.48984&mlon=2.62496#map=15/6.48984/2.62496" target="_blank" rel="noopener" class="flex items-center justify-center gap-2 py-3 bg-white hover:bg-sika-50 text-sm text-sika-700 font-medium transition-colors">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          Voir l'itinéraire sur OpenStreetMap
        </a>
      </div>

      <div class="reveal reveal-delay-5">
        <div class="relative overflow-hidden rounded-3xl hero-gradient p-6 sm:p-8 text-white">
          <div class="absolute inset-0 hero-grid opacity-60"></div>
          <div class="relative flex items-center gap-4">
            <div class="w-12 h-12 rounded-2xl bg-white/10 border border-white/20 flex items-center justify-center shrink-0">
              <i class="fa-solid fa-clock text-sika-300 text-lg"></i>
            </div>
            <div>
              <div class="font-semibold">Disponibilité</div>
              <div class="text-sm text-slate-300 mt-0.5">Lundi – Vendredi · 8h à 18h</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- Contact form --}}
    <div class="relative reveal reveal-delay-2">
      <div class="absolute -inset-1 bg-gradient-to-br from-sika-400 to-sika-800 rounded-[2rem] opacity-20 blur-lg pointer-events-none"></div>
      <div class="relative bg-white p-7 sm:p-10 rounded-[2rem] shadow-card border border-slate-100">
        <!-- <span class="eyebrow-sika mb-4">Formulaire</span> -->
        <h2 class="text-2xl font-bold text-night-900 mt-4 mb-2 tracking-tight">Envoyez-nous un message</h2>
        <p class="text-sm text-slate-500 mb-8">Nous vous répondrons dans les 24 heures ouvrées.</p>

        <form class="space-y-5" onsubmit="event.preventDefault(); alert('Merci ! Nous vous répondrons très bientôt.');">
          <div>
            <label class="field-label">Nom complet</label>
            <input type="text" class="input" placeholder="Votre nom" required>
          </div>
          <div>
            <label class="field-label">E-mail</label>
            <input type="email" class="input" placeholder="votre@email.com" required>
          </div>
          <div>
            <label class="field-label">Sujet</label>
            <select class="select">
              <option>Question générale</option>
              <option>Support technique</option>
              <option>Partenariat</option>
              <option>Signaler un problème</option>
            </select>
          </div>
          <div>
            <label class="field-label">Message</label>
            <textarea rows="4" class="input resize-none" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
          </div>
          <button type="submit" class="btn-primary w-full !py-3.5">
            Envoyer le message
            <i class="fa-solid fa-paper-plane text-sm"></i>
          </button>
        </form>
      </div>
    </div>
  </div>
</section>

@endsection
