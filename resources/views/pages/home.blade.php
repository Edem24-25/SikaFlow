@extends('layouts.app')
@section('title', 'SikaFlow — Ne manquez plus jamais une échéance')
@section('meta_description', 'SikaFlow automatise vos paiements de prêts et abonnements au Bénin. MTN MoMo, Moov Money, cartes bancaires — zéro retard, zéro pénalité.')
@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden hero-gradient text-white">
  {{-- Decorative layers --}}
  <div class="absolute inset-0 hero-grid"></div>
  <div class="hero-glow w-[32rem] h-[32rem] bg-sika-500/25 -top-24 -right-24 animate-blob"></div>
  <div class="hero-glow w-80 h-80 bg-gold-500/12 bottom-0 left-8 animate-blob" style="animation-delay: -5s"></div>
  <div class="absolute top-1/3 -left-24 w-64 h-64 rounded-full border border-white/5 animate-spin-slow pointer-events-none"></div>
  <div class="absolute -bottom-32 right-1/3 w-72 h-72 rounded-full border border-white/5 animate-spin-slow pointer-events-none" style="animation-duration: 26s"></div>

  <div class="relative max-w-7xl mx-auto px-4 pt-16 pb-20 sm:pt-20 md:pt-28 lg:pb-28 grid lg:grid-cols-2 gap-12 lg:gap-8 items-center">
    {{-- Copy --}}
    <div class="animate-fade-up">
      <div class="flex flex-wrap items-center gap-3 mb-6">
        <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 text-[11px] uppercase tracking-widest text-sika-200 border border-white/10 backdrop-blur-sm">
          <span class="relative flex w-2 h-2">
            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sika-400 opacity-75"></span>
            <span class="relative inline-flex rounded-full w-2 h-2 bg-sika-400"></span>
          </span>
          HODD GLOBAL · Fintech Bénin
        </span>
      </div>

      <h1 class="text-4xl sm:text-5xl xl:text-[3.5rem] font-extrabold leading-[1.08] tracking-tight mb-6">
        Vos prêts & abonnements, <span class="text-gradient">automatisés</span>.
      </h1>

      <p class="text-slate-300 text-base sm:text-lg mb-8 max-w-xl leading-relaxed">
        SikaFlow centralise vos engagements financiers, déclenche vos paiements Mobile Money ou bancaires à la bonne date et vous alerte avant chaque échéance. <strong class="text-white">Zéro oubli. Zéro pénalité.</strong>
      </p>

      <div class="flex flex-col sm:flex-row flex-wrap gap-3.5">
        <a href="{{ route('register') }}" class="btn-primary relative overflow-hidden !px-7 !py-3.5 rounded-full">
          Créer un compte gratuitement
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5-5 5M6 12h12"/></svg>
          <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
        </a>
        <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 px-7 py-3.5 rounded-full border border-white/20 bg-white/5 backdrop-blur-sm hover:bg-white/10 transition-all duration-300 hover:-translate-y-0.5 font-semibold">
          Se connecter
        </a>
      </div>

      {{-- Trust markers --}}
      <div class="mt-9 flex flex-wrap items-center gap-x-6 gap-y-3 text-xs sm:text-sm text-slate-400">
        <span class="flex items-center gap-2"><span class="w-5 h-5 rounded-full bg-sika-500/20 flex items-center justify-center"><svg class="w-3 h-3 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span> MTN Mobile Money</span>
        <span class="flex items-center gap-2"><span class="w-5 h-5 rounded-full bg-sika-500/20 flex items-center justify-center"><svg class="w-3 h-3 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span> Moov Money</span>
        <span class="flex items-center gap-2"><span class="w-5 h-5 rounded-full bg-sika-500/20 flex items-center justify-center"><svg class="w-3 h-3 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span> Cartes bancaires</span>
        <span class="flex items-center gap-2"><span class="w-5 h-5 rounded-full bg-sika-500/20 flex items-center justify-center"><svg class="w-3 h-3 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg></span> Paiement sécurisé SSL</span>
      </div>
    </div>

    {{-- Visual mockup --}}
    <div class="relative lg:pl-8 animate-float">
      <div class="relative rounded-3xl border border-white/10 bg-white/5 backdrop-blur-xl p-5 sm:p-6 shadow-lift overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-white/5 to-transparent pointer-events-none"></div>
        <div class="flex items-center justify-between mb-5">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sika-400 to-sika-700 flex items-center justify-center font-bold text-white shadow-glow-soft">S</div>
            <div>
              <div class="text-sm font-bold text-white">SikaFlow</div>
              <div class="text-[11px] text-slate-400">Tableau de bord</div>
            </div>
          </div>
          <span class="px-2.5 py-1 rounded-full bg-sika-500/20 text-sika-300 text-[10px] font-bold uppercase tracking-wider border border-sika-500/30">En ligne</span>
        </div>

        <div class="grid grid-cols-3 gap-3 mb-4">
          <div class="rounded-xl bg-white/5 border border-white/10 p-3">
            <div class="text-[10px] text-slate-400 uppercase tracking-wide">Échéance</div>
            <div class="text-sm font-bold text-white mt-1">45 000 FCFA</div>
          </div>
          <div class="rounded-xl bg-white/5 border border-white/10 p-3">
            <div class="text-[10px] text-slate-400 uppercase tracking-wide">Prochain paiement</div>
            <div class="text-sm font-bold text-gold-400 mt-1">J+3</div>
          </div>
          <div class="rounded-xl bg-sika-500/20 border border-sika-500/40 p-3">
            <div class="text-[10px] text-sika-300 uppercase tracking-wide">Statut</div>
            <div class="text-sm font-bold text-sika-300 mt-1">Auto</div>
          </div>
        </div>

        <div class="space-y-2.5">
          @foreach([
            ['MTN Mobile Money', 'Paiement réussi · 15 000 FCFA', 'bg-emerald-400/90', 'fa-check'],
            ['Ecobank', 'Échéance confirmée · 30 000 FCFA', 'bg-sika-400/90', 'fa-check'],
            ['Canal+', 'Rappel envoyé · J-2', 'bg-gold-400/90', 'fa-bell'],
          ] as $i => $row)
            <div class="flex items-center gap-3 rounded-xl bg-white/5 border border-white/10 px-3.5 py-3 hover:bg-white/10 transition-colors">
              <span class="w-8 h-8 shrink-0 rounded-full {{ $row[2] }} flex items-center justify-center text-white">
                <i class="fa-solid {{ $row[3] }} text-xs"></i>
              </span>
              <div class="flex-1 min-w-0">
                <div class="text-sm font-semibold text-white truncate">{{ $row[0] }}</div>
                <div class="text-[11px] text-slate-400 truncate">{{ $row[1] }}</div>
              </div>
              <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </div>
          @endforeach
        </div>
      </div>

      {{-- Floating badges --}}
      <div class="absolute -top-5 -right-3 sm:-right-6 hidden sm:flex items-center gap-2 px-4 py-2.5 rounded-2xl glass-dark text-white text-xs font-semibold shadow-lift animate-pulse-soft">
        <i class="fa-solid fa-shield-halved text-sika-400"></i> Paiement sécurisé
      </div>
      <div class="absolute -bottom-5 -left-3 sm:-left-6 hidden sm:flex items-center gap-2.5 px-4 py-2.5 rounded-2xl glass-dark text-white shadow-lift animate-float" style="animation-delay: 1.2s">
        <span class="flex -space-x-1.5">
          <span class="w-6 h-6 rounded-full bg-gradient-to-br from-sika-400 to-sika-600 border-2 border-night-900 flex items-center justify-center text-[9px] font-bold">A</span>
          <span class="w-6 h-6 rounded-full bg-gradient-to-br from-gold-400 to-gold-600 border-2 border-night-900 flex items-center justify-center text-[9px] font-bold text-night-900">M</span>
          <span class="w-6 h-6 rounded-full bg-gradient-to-br from-slate-300 to-slate-500 border-2 border-night-900 flex items-center justify-center text-[9px] font-bold">F</span>
        </span>
        <div>
          <div class="text-xs font-bold">+500 utilisateurs</div>
          <div class="text-[10px] text-slate-400">0 retard en 2026</div>
        </div>
      </div>
    </div>
  </div>

  {{-- Bottom fade into next section --}}
  <div class="absolute bottom-0 inset-x-0 h-24 bg-gradient-to-t from-slate-50 to-transparent pointer-events-none"></div>
</section>

{{-- Stats bar with animated counters --}}
<section class="bg-white border-b border-slate-100 relative">
  <div class="max-w-7xl mx-auto px-4 py-12 grid grid-cols-2 lg:grid-cols-4 gap-8">
    @foreach([
      ['500', 'Utilisateurs actifs', 'fa-users'],
      ['2000', 'Prêts gérés', 'fa-file-invoice-dollar'],
      ['98', 'Taux de ponctualité', 'fa-gauge-high'],
      ['0', 'Frais d\'inscription', 'fa-hand-holding-dollar'],
    ] as $i => $stat)
      <div class="text-center group">
        <div class="w-12 h-12 mx-auto mb-3 rounded-2xl bg-sika-50 text-sika-600 flex items-center justify-center group-hover:scale-110 group-hover:bg-sika-600 group-hover:text-white transition-all duration-300">
          <i class="fa-solid {{ $stat[2] }} text-lg"></i>
        </div>
        <div class="text-3xl sm:text-4xl font-bold text-night-900 tracking-tight" data-counter="{{ $stat[0] }}" data-suffix="{{ $i === 2 ? ' %' : ($i === 3 ? ' FCFA' : '+') }}">0</div>
        <div class="text-xs sm:text-sm text-slate-500 mt-1.5">{{ $stat[1] }}</div>
      </div>
    @endforeach
  </div>
</section>

{{-- Features --}}
<section class="section-pad relative overflow-hidden">
  <div class="absolute inset-0 bg-grid-fade pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-4 relative">
    <div class="section-head reveal">
      <!-- <span class="eyebrow-sika mb-4">Fonctionnalités</span> -->
      <h2 class="text-3xl sm:text-4xl font-bold text-night-900 tracking-tight mt-4">Tout ce qu'il faut pour reprendre le contrôle</h2>
      <p class="text-slate-600 mt-4 max-w-2xl mx-auto">Un tableau de bord clair, des rappels intelligents, des paiements sécurisés via nos partenaires Kkiapay, Flutterwave et PayDunya.</p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach([
        ['fa-credit-card','Moyens de paiement liés','Ajoutez vos comptes Mobile Money et bancaires en toute sécurité.'],
        ['fa-calendar-days','Échéanciers automatiques','Enregistrez un prêt, l\'échéancier se génère instantanément.'],
        ['fa-bell','Rappels & alertes','Notifications avant chaque échéance et en cas d\'incident.'],
        ['fa-rotate','Prélèvement auto','Activez le paiement automatique et oubliez les retards.'],
        ['fa-chart-column','Suivi des abonnements','Canal+, Internet, streaming — tout regroupé au même endroit.'],
        ['fa-file-invoice','Historique & PDF','Exportez vos relevés et échéanciers en un clic.'],
      ] as $i => $f)
        <div class="group relative p-6 sm:p-7 rounded-3xl bg-white border border-slate-100 shadow-card card-hover reveal reveal-delay-{{ ($i % 3) + 1 }} overflow-hidden">
          <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-sika-400 to-sika-600 scale-x-0 group-hover:scale-x-100 origin-left transition-transform duration-500"></div>
          <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sika-50 to-sika-100 text-sika-600 flex items-center justify-center mb-4 group-hover:from-sika-600 group-hover:to-sika-800 group-hover:text-white group-hover:shadow-glow-soft group-hover:scale-105 transition-all duration-300">
            <i class="fa-solid {{ $f[0] }} text-lg"></i>
          </div>
          <h3 class="font-semibold text-lg mb-2 text-night-900">{{ $f[1] }}</h3>
          <p class="text-sm text-slate-600 leading-relaxed">{{ $f[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- How it works --}}
<section class="section-pad bg-white relative overflow-hidden">
  <div class="absolute -top-24 -right-24 w-96 h-96 bg-sika-100/60 rounded-full blur-3xl pointer-events-none"></div>
  <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
    <div class="reveal-left">
      <!-- <span class="eyebrow-gold mb-4">Simple & rapide</span> -->
      <h2 class="text-3xl sm:text-4xl font-bold text-night-900 tracking-tight mt-4 mb-6">Comment ça marche</h2>
      <p class="text-slate-600 mb-8 max-w-lg">Quatre étapes suffisent pour ne plus jamais subir une pénalité de retard.</p>
      <ol class="space-y-6">
        @foreach([
          ['1','Créez votre compte','Inscription en 30 secondes avec votre numéro de téléphone.'],
          ['2','Ajoutez vos engagements','Prêts et abonnements, avec échéancier généré automatiquement.'],
          ['3','Liez un moyen de paiement','MTN, Moov ou compte bancaire — validation sécurisée.'],
          ['4','Laissez SikaFlow travailler','Rappels, prélèvements et historique — vous restez informé.'],
        ] as $i => $s)
          <li class="group flex gap-5 reveal reveal-delay-{{ $i + 1 }}">
            <div class="relative shrink-0">
              <span class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sika-500 to-sika-700 text-white font-bold flex items-center justify-center shadow-glow-soft transition-transform duration-300 group-hover:scale-110 group-hover:rotate-6">{{ $s[0] }}</span>
              @if(!$loop->last)
                <span class="absolute left-1/2 top-full h-6 w-px bg-gradient-to-b from-sika-200 to-transparent"></span>
              @endif
            </div>
            <div class="pt-1.5">
              <div class="font-semibold text-night-900 text-lg">{{ $s[1] }}</div>
              <div class="text-sm text-slate-600 mt-1 leading-relaxed">{{ $s[2] }}</div>
            </div>
          </li>
        @endforeach
      </ol>
    </div>

    <div class="reveal-right">
      <div class="relative rounded-3xl animated-gradient bg-gradient-to-br from-sika-600 via-sika-700 to-sika-900 p-8 sm:p-10 text-white shadow-lift overflow-hidden">
        <div class="absolute -top-10 -right-10 w-44 h-44 bg-white/5 rounded-full"></div>
        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-white/5 rounded-full"></div>
        <div class="absolute top-1/2 left-1/3 w-20 h-20 bg-white/5 rounded-full animate-pulse-soft"></div>

        <div class="relative">
          <h3 class="text-2xl sm:text-3xl font-bold mb-4">Prêt à commencer ?</h3>
          <p class="text-sika-100 mb-8 text-sm sm:text-base leading-relaxed">Rejoignez les utilisateurs qui ne paient plus de pénalités de retard et reprenez le contrôle de vos finances.</p>
          <a href="{{ route('register') }}" class="group inline-flex items-center gap-2 px-7 py-3.5 rounded-full bg-white text-sika-700 font-bold hover:bg-sika-50 transition-all hover:-translate-y-0.5 shadow-lift">
            Commencer maintenant
            <i class="fa-solid fa-arrow-right text-sm transition-transform group-hover:translate-x-1"></i>
          </a>
          <div class="mt-8 grid grid-cols-3 gap-4">
            <div class="rounded-xl bg-white/10 backdrop-blur border border-white/15 p-3.5 text-center">
              <div class="text-xl font-bold">0 FCFA</div>
              <div class="text-[11px] text-sika-200 mt-0.5">Inscription</div>
            </div>
            <div class="rounded-xl bg-white/10 backdrop-blur border border-white/15 p-3.5 text-center">
              <div class="text-xl font-bold">98 %</div>
              <div class="text-[11px] text-sika-200 mt-0.5">Ponctualité</div>
            </div>
            <div class="rounded-xl bg-white/10 backdrop-blur border border-white/15 p-3.5 text-center">
              <div class="text-xl font-bold">24/7</div>
              <div class="text-[11px] text-sika-200 mt-0.5">Accès en ligne</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- Partners marquee --}}
<section class="py-16 sm:py-20 bg-slate-50 overflow-hidden">
  <div class="max-w-7xl mx-auto px-4 text-center">
    <!-- <span class="eyebrow-sika mb-4">Intégrations</span> -->
    <h2 class="text-3xl sm:text-4xl font-bold text-night-900 tracking-tight mt-4">Nos partenaires de confiance</h2>
    <p class="text-slate-600 mt-4 mb-12 max-w-xl mx-auto">Des passerelles de paiement reconnues en Afrique de l'Ouest pour des transactions fiables et sécurisées.</p>
  </div>

  <div class="relative">
    <div class="absolute inset-y-0 left-0 w-24 bg-gradient-to-r from-slate-50 to-transparent z-10 pointer-events-none"></div>
    <div class="absolute inset-y-0 right-0 w-24 bg-gradient-to-l from-slate-50 to-transparent z-10 pointer-events-none"></div>
    <div class="flex overflow-hidden group">
      <div class="flex shrink-0 items-center gap-12 pr-12 animate-marquee group-hover:[animation-play-state:paused]">
        @foreach(array_merge([
          ['Logo_kkiapay.png', 'Kkiapay'],
          ['Flutterwave.jpeg', 'Flutterwave'],
          ['paydunya_logo.jpg', 'PayDunya'],
          ['MTN MOMO.webp', 'MTN MoMo'],
          ['Moov_Africa_logo.png', 'Moov Money'],
          ['Ecobank_Logo.svg', 'Ecobank'],
        ], [
          ['Logo_kkiapay.png', 'Kkiapay'],
          ['Flutterwave.jpeg', 'Flutterwave'],
          ['paydunya_logo.jpg', 'PayDunya'],
          ['MTN MOMO.webp', 'MTN MoMo'],
          ['Moov_Africa_logo.png', 'Moov Money'],
          ['Ecobank_Logo.svg', 'Ecobank'],
        ]) as $i => $partner)
          <div class="flex items-center gap-3 px-6 py-3 rounded-2xl bg-white border border-slate-100 shadow-soft hover:border-sika-200 transition-colors">
            <img src="{{ asset($partner[0]) }}" alt="{{ $partner[1] }}" class="h-8 w-auto object-contain" loading="lazy">
            <span class="text-sm font-semibold text-slate-500 whitespace-nowrap">{{ $partner[1] }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

{{-- Case studies --}}
<section class="section-pad bg-white">
  <div class="max-w-7xl mx-auto px-4">
    <div class="section-head reveal">
      <h2 class="text-3xl sm:text-4xl font-bold text-night-900 tracking-tight">Études de cas</h2>
      <p class="text-slate-600 mt-4 max-w-xl mx-auto">Découvrez comment nos utilisateurs ont transformé leur gestion financière avec SikaFlow.</p>
    </div>
    <div class="grid md:grid-cols-2 gap-8 mt-12">
      @foreach([
        [
          'title' => 'Amélie — Commerçante à Cotonou',
          'problem' => 'Amélie avait 3 prêts différents et oubliait régulièrement ses échéances, accumulant des pénalités de 15 000 FCFA par mois.',
          'result' => 'Grâce à SikaFlow, elle a centralisé ses prêts et activé les rappels automatiques. Résultat : 0 retard en 6 mois et 90 000 FCFA d\'économies.',
          'metric' => '90 000 FCFA',
          'metric_label' => 'Économisées',
        ],
        [
          'title' => 'Marc — Fonctionnaire à Porto-Novo',
          'problem' => 'Marc gérait ses abonnements (Canal+, Internet, eau) sur des applications différentes et perdait du temps chaque mois.',
          'result' => 'SikaFlow a regroupé tous ses abonnements en un seul tableau de bord. Il économise 3 heures par mois et ne manque plus aucune échéance.',
          'metric' => '3h/mois',
          'metric_label' => 'Économisées',
        ],
      ] as $i => $case)
        <div class="group p-7 sm:p-8 rounded-3xl bg-slate-50 border border-slate-100 card-hover reveal reveal-delay-{{ $i + 1 }}">
          <div class="flex items-center gap-4 mb-5">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sika-500 to-sika-700 text-white flex items-center justify-center font-bold shadow-soft">
              {{ $i === 0 ? 'A' : 'M' }}
            </div>
            <div>
              <h3 class="font-semibold text-night-900">{{ $case['title'] }}</h3>
              <div class="text-xs text-slate-400">Cas client</div>
            </div>
          </div>
          <div class="space-y-4 text-sm">
            <div>
              <div class="text-xs font-bold uppercase tracking-wider text-rose-500 mb-1">Problème</div>
              <p class="text-slate-600 leading-relaxed">{{ $case['problem'] }}</p>
            </div>
            <div>
              <div class="text-xs font-bold uppercase tracking-wider text-sika-600 mb-1">Résultat</div>
              <p class="text-slate-600 leading-relaxed">{{ $case['result'] }}</p>
            </div>
          </div>
          <div class="mt-6 pt-5 border-t border-slate-200">
            <div class="text-2xl font-bold text-sika-600">{{ $case['metric'] }}</div>
            <div class="text-xs text-slate-400 mt-0.5">{{ $case['metric_label'] }}</div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Testimonials --}}
<section class="section-pad">
  <div class="max-w-7xl mx-auto px-4">
    <div class="section-head reveal">
      <!-- <span class="eyebrow-sika mb-4">Témoignages</span> -->
      <h2 class="text-3xl sm:text-4xl font-bold text-night-900 tracking-tight mt-4">Ce que disent nos utilisateurs</h2>
      <p class="text-slate-600 mt-4">Des histoires de ponctualité retrouvée.</p>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach([
        ['A','Amélie K.','Commerçante, Cotonou','Depuis SikaFlow, je n\'ai plus eu un seul retard sur mes remboursements. Les rappels SMS sont parfaits.'],
        ['M','Marc D.','Fonctionnaire, Porto-Novo','J\'ai regroupé mes 3 prêts et mes abonnements Canal+ et Internet. Tout est visible en un coup d\'œil.'],
        ['F','Fatou B.','Étudiante, Parakou','L\'inscription a pris moins d\'une minute. Le prélèvement auto m\'a sauvé deux fois déjà.'],
      ] as $i => $t)
        <div class="group relative p-7 rounded-3xl bg-white border border-slate-100 shadow-card card-hover reveal reveal-delay-{{ $i + 1 }} overflow-hidden">
          <i class="fa-solid fa-quote-left absolute top-6 right-6 text-3xl text-sika-100 group-hover:text-sika-200 transition-colors"></i>
          <div class="flex items-center gap-3 mb-5">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-sika-500 to-sika-700 text-white flex items-center justify-center font-bold text-lg shadow-soft">{{ $t[0] }}</div>
            <div>
              <div class="font-semibold text-night-900">{{ $t[1] }}</div>
              <div class="text-xs text-slate-400">{{ $t[2] }}</div>
            </div>
          </div>
          <p class="text-sm text-slate-600 leading-relaxed italic">"{{ $t[3] }}"</p>
          <div class="mt-4 text-gold-500 flex gap-1">
            @for($s = 0; $s < 5; $s++)<i class="fa-solid fa-star text-xs"></i>@endfor
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Security --}}
<section class="py-16 sm:py-24 bg-night-950 text-white relative overflow-hidden">
  <div class="absolute inset-0 hero-grid opacity-60"></div>
  <div class="hero-glow w-96 h-96 bg-sika-600/20 -top-20 right-10 animate-blob"></div>
  <div class="max-w-7xl mx-auto px-4 grid lg:grid-cols-2 gap-12 items-center relative">
    <div class="reveal-left">
      <!-- <span class="eyebrow-dark mb-4">Sécurité</span> -->
      <h2 class="text-3xl sm:text-4xl font-bold mb-5 tracking-tight mt-4">Vos données, notre priorité</h2>
      <p class="text-slate-400 mb-8 leading-relaxed max-w-lg">SikaFlow chiffre vos informations sensibles, respecte les normes de sécurité des passerelles de paiement et ne stocke jamais vos codes PIN Mobile Money.</p>
      <ul class="space-y-3.5">
        @foreach(['Chiffrement SSL/TLS sur toutes les connexions','Authentification sécurisée par téléphone','Conformité aux standards PCI-DSS des partenaires','Hébergement fiable avec sauvegardes quotidiennes'] as $item)
          <li class="group flex items-center gap-3 text-slate-300">
            <span class="w-7 h-7 shrink-0 rounded-lg bg-sika-500/15 border border-sika-500/30 flex items-center justify-center group-hover:bg-sika-500 group-hover:text-white transition-colors">
              <svg class="w-3.5 h-3.5 text-sika-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            </span>
            {{ $item }}
          </li>
        @endforeach
      </ul>
    </div>
    <div class="grid grid-cols-2 gap-4 reveal-right">
      @foreach([
        ['fa-lock', 'Données chiffrées'],
        ['fa-shield-halved', 'Paiements sécurisés'],
        ['fa-mobile-screen', '2FA par SMS'],
        ['fa-flag', 'Made in Bénin'],
      ] as $badge)
        <div class="group p-6 rounded-3xl bg-white/5 border border-white/10 backdrop-blur text-center hover:bg-white/10 hover:border-sika-500/40 hover:-translate-y-1 transition-all duration-300">
          <div class="w-12 h-12 rounded-2xl bg-white/10 text-sika-400 flex items-center justify-center mx-auto mb-3 group-hover:bg-sika-500 group-hover:text-white group-hover:shadow-glow transition-all duration-300">
            <i class="fa-solid {{ $badge[0] }} text-lg"></i>
          </div>
          <div class="text-sm text-slate-200 font-semibold">{{ $badge[1] }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- FAQ --}}
<section class="section-pad bg-white" x-data="{ open: null }">
  <div class="max-w-3xl mx-auto px-4">
    <div class="section-head reveal">
      <!-- <span class="eyebrow-sika mb-4">FAQ</span> -->
      <h2 class="text-3xl sm:text-4xl font-bold text-night-900 tracking-tight mt-4">Questions fréquentes</h2>
    </div>
    <div class="space-y-3.5">
      @foreach([
        ['SikaFlow est-il gratuit ?','L\'inscription et la gestion de base sont entièrement gratuites. Des fonctionnalités avancées pourront être proposées ultérieurement.'],
        ['Quels moyens de paiement sont acceptés ?','MTN Mobile Money, Moov Money, cartes Visa/Mastercard et virements bancaires via Kkiapay, Flutterwave et PayDunya.'],
        ['Mes données sont-elles en sécurité ?','Oui. Toutes les communications sont chiffrées et nous ne stockons jamais vos codes PIN ou mots de passe bancaires.'],
        ['Puis-je désactiver le prélèvement automatique ?','Absolument. Vous gardez le contrôle total et pouvez activer ou désactiver l\'auto-paiement à tout moment depuis votre tableau de bord.'],
      ] as $i => $faq)
        <div class="rounded-2xl border border-slate-100 bg-white shadow-soft overflow-hidden transition-all duration-300 hover:border-sika-200 reveal reveal-delay-{{ ($i % 3) + 1 }}"
          :class="open === {{ $i }} && 'border-sika-300 shadow-card'">
          <button
            @click="open = open === {{ $i }} ? null : {{ $i }}"
            class="w-full flex items-center justify-between gap-4 px-6 py-5 text-left font-semibold text-night-900 text-sm sm:text-base hover:bg-sika-50/50 transition-colors"
            :aria-expanded="open === {{ $i }}"
          >
            {{ $faq[0] }}
            <span class="w-8 h-8 shrink-0 rounded-full border border-slate-200 flex items-center justify-center transition-all duration-300"
              :class="open === {{ $i }} ? 'bg-sika-600 border-sika-600 text-white rotate-180' : 'text-slate-400'">
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </span>
          </button>
          <div
            x-show="open === {{ $i }}"
            x-cloak
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            class="px-6 pb-6 text-sm text-slate-600 leading-relaxed"
          >
            {{ $faq[1] }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Final CTA --}}
<section class="py-16 sm:py-24 px-4">
  <div class="relative max-w-5xl mx-auto rounded-[2.5rem] hero-gradient text-white p-10 sm:p-16 text-center overflow-hidden shadow-lift">
    <div class="absolute inset-0 hero-grid opacity-70"></div>
    <div class="hero-glow w-72 h-72 bg-sika-500/25 -top-16 -left-16 animate-blob"></div>
    <div class="hero-glow w-72 h-72 bg-gold-500/15 -bottom-16 -right-16 animate-blob" style="animation-delay: -6s"></div>

    <div class="relative reveal">
      <h2 class="text-3xl sm:text-4xl md:text-5xl font-bold tracking-tight mb-5">Ne laissez plus les échéances vous surprendre</h2>
      <p class="text-slate-300 mb-9 max-w-xl mx-auto text-sm sm:text-base">Créez votre compte en moins d'une minute et reprenez le contrôle de vos finances dès aujourd'hui.</p>
      <div class="flex flex-col sm:flex-row items-center justify-center gap-3.5">
        <a href="{{ route('register') }}" class="relative overflow-hidden inline-flex items-center justify-center gap-2 px-9 py-4 rounded-full bg-white text-sika-700 font-bold hover:bg-sika-50 transition-all hover:-translate-y-0.5 shadow-lift">
          Créer mon compte
          <i class="fa-solid fa-arrow-right text-sm"></i>
          <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-sika-200/40 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
        </a>
        <a href="{{ route('contact') }}" class="inline-flex items-center justify-center px-9 py-4 rounded-full border border-white/30 bg-white/5 backdrop-blur hover:bg-white/10 transition-all duration-300 hover:-translate-y-0.5 font-semibold">Nous contacter</a>
      </div>
    </div>
  </div>
</section>

@endsection
