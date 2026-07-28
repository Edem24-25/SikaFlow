@extends('layouts.app')
@section('title', 'SikaFlow — Ne manquez plus jamais une échéance')
@section('content')

{{-- Hero --}}
<section class="relative overflow-hidden hero-gradient text-white">
  <div class="hero-glow w-96 h-96 bg-sika-500/20 -top-20 -right-20 absolute"></div>
  <div class="hero-glow w-72 h-72 bg-gold-500/10 bottom-0 left-10 absolute"></div>

  <div class="max-w-6xl mx-auto px-4 py-16 sm:py-20 md:py-28 grid md:grid-cols-2 gap-10 items-center relative z-10">
    <div class="animate-fade-up">
      <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-xs uppercase tracking-widest text-sika-200 mb-4 border border-white/10">HODD GLOBAL · Fintech Bénin</span>
      <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold leading-tight mb-4">
        Vos prêts et abonnements, <span class="text-sika-400">automatisés</span>.
      </h1>
      <p class="text-slate-300 text-base sm:text-lg mb-8 max-w-xl leading-relaxed">
        SikaFlow centralise vos engagements financiers, déclenche vos paiements Mobile Money ou bancaires à la bonne date et vous alerte avant chaque échéance. Zéro oubli. Zéro pénalité.
      </p>
      <div class="flex flex-col sm:flex-row flex-wrap gap-3">
        <a href="{{ route('register') }}" class="btn-primary text-white text-center">Créer un compte</a>
        <a href="{{ route('login') }}" class="px-5 py-3 rounded-xl border border-white/20 hover:bg-white/10 transition-all duration-300 hover:-translate-y-0.5 text-center">Se connecter</a>
      </div>
      <div class="mt-8 flex flex-wrap items-center gap-4 sm:gap-6 text-xs sm:text-sm text-slate-400">
        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> MTN Mobile Money</span>
        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Moov Money</span>
        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Cartes bancaires</span>
      </div>
    </div>

    <div class="relative animate-float">
      <div class="rounded-2xl bg-white/5 backdrop-blur border border-white/10 p-5 sm:p-6 shadow-2xl">
        <div class="text-xs uppercase text-slate-400 tracking-wider">Prochaine échéance</div>
        <div class="mt-2 flex items-end justify-between gap-3">
          <div>
            <div class="text-2xl sm:text-3xl font-bold">45 000 FCFA</div>
            <div class="text-xs sm:text-sm text-slate-400 mt-1">Ecobank · Prêt PRT-0001 · dans 3 jours</div>
          </div>
          <span class="px-2 py-1 rounded-md bg-gold-500/20 text-gold-400 text-xs shrink-0">Auto</span>
        </div>
        <div class="my-5 sm:my-6 h-px bg-white/10"></div>
        <div class="grid grid-cols-3 gap-3 text-center">
          <div><div class="text-lg sm:text-xl font-bold text-sika-400">12</div><div class="text-xs text-slate-400">prêts suivis</div></div>
          <div><div class="text-lg sm:text-xl font-bold text-sika-400">4</div><div class="text-xs text-slate-400">abonnements</div></div>
          <div><div class="text-lg sm:text-xl font-bold text-sika-400">0</div><div class="text-xs text-slate-400">retard</div></div>
        </div>
      </div>
      <div class="absolute -bottom-4 -left-4 hidden sm:flex items-center gap-2 px-4 py-2 rounded-xl bg-sika-500/90 text-white text-xs font-semibold shadow-lg animate-pulse-soft">
        <i class="fa-solid fa-lock"></i> Paiement sécurisé
      </div>
    </div>
  </div>
</section>

{{-- Stats bar --}}
<section class="bg-white border-b border-slate-100">
  <div class="max-w-6xl mx-auto px-4 py-10 grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
    @foreach([
      ['500+', 'Utilisateurs actifs'],
      ['2 000+', 'Prêts gérés'],
      ['98 %', 'Taux de ponctualité'],
      ['0 FCFA', 'Frais d\'inscription'],
    ] as $i => $stat)
      <div class="text-center reveal reveal-delay-{{ $i + 1 }}">
        <div class="text-2xl sm:text-3xl font-bold text-sika-600">{{ $stat[0] }}</div>
        <div class="text-xs sm:text-sm text-slate-500 mt-1">{{ $stat[1] }}</div>
      </div>
    @endforeach
  </div>
</section>

{{-- Features --}}
<section class="py-16 sm:py-20">
  <div class="max-w-6xl mx-auto px-4">
    <div class="text-center mb-12 reveal">
      <span class="inline-block px-3 py-1 rounded-full bg-sika-50 text-sika-700 text-xs font-semibold uppercase tracking-wider mb-3">Fonctionnalités</span>
      <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-night-900">Tout ce qu'il faut pour reprendre le contrôle</h2>
      <p class="text-slate-600 mt-3 max-w-2xl mx-auto text-sm sm:text-base">Un tableau de bord clair, des rappels intelligents, des paiements sécurisés via nos partenaires Kkiapay, Flutterwave et PayDunya.</p>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
      @foreach([
        ['fa-credit-card','Moyens de paiement liés','Ajoutez vos comptes Mobile Money et bancaires en toute sécurité.'],
        ['fa-calendar-days','Échéanciers automatiques','Enregistrez un prêt, l\'échéancier se génère instantanément.'],
        ['fa-bell','Rappels & alertes','Notifications avant chaque échéance et en cas d\'incident.'],
        ['fa-rotate','Prélèvement auto','Activez le paiement automatique et oubliez les retards.'],
        ['fa-chart-column','Suivi des abonnements','Canal+, Internet, streaming — tout regroupé au même endroit.'],
        ['fa-file-invoice','Historique & PDF','Exportez vos relevés et échéanciers en un clic.'],
      ] as $i => $f)
        <div class="p-5 sm:p-6 rounded-2xl bg-white border border-slate-100 shadow-soft card-hover reveal reveal-delay-{{ ($i % 3) + 1 }}">
          <div class="w-11 h-11 rounded-xl bg-sika-50 text-sika-600 flex items-center justify-center mb-3">
            <i class="fa-solid {{ $f[0] }} text-lg"></i>
          </div>
          <h3 class="font-semibold text-base sm:text-lg mb-2">{{ $f[1] }}</h3>
          <p class="text-sm text-slate-600 leading-relaxed">{{ $f[2] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- How it works --}}
<section class="py-16 sm:py-20 bg-white">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 md:gap-12 items-center">
    <div class="reveal">
      <span class="inline-block px-3 py-1 rounded-full bg-sika-50 text-sika-700 text-xs font-semibold uppercase tracking-wider mb-3">Simple & rapide</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-night-900 mb-6">Comment ça marche</h2>
      <ol class="space-y-5">
        @foreach([
          ['1','Créez votre compte','Inscription en 30 secondes avec votre numéro de téléphone.'],
          ['2','Ajoutez vos engagements','Prêts et abonnements, avec échéancier généré automatiquement.'],
          ['3','Liez un moyen de paiement','MTN, Moov ou compte bancaire — validation sécurisée.'],
          ['4','Laissez SikaFlow travailler','Rappels, prélèvements et historique — vous restez informé.'],
        ] as $i => $s)
          <li class="flex gap-4 reveal reveal-delay-{{ $i + 1 }}">
            <span class="w-9 h-9 rounded-full bg-sika-100 text-sika-700 font-bold flex items-center justify-center shrink-0">{{ $s[0] }}</span>
            <div>
              <div class="font-semibold">{{ $s[1] }}</div>
              <div class="text-sm text-slate-600 mt-0.5">{{ $s[2] }}</div>
            </div>
          </li>
        @endforeach
      </ol>
    </div>
    <div class="rounded-2xl bg-gradient-to-br from-sika-600 to-sika-800 p-6 sm:p-8 text-white shadow-soft reveal reveal-delay-2">
      <h3 class="text-xl sm:text-2xl font-bold mb-3">Prêt à commencer ?</h3>
      <p class="text-sika-100 mb-6 text-sm sm:text-base">Rejoignez les utilisateurs qui ne paient plus de pénalités de retard.</p>
      <a href="{{ route('register') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white text-sika-700 font-semibold hover:bg-slate-100 transition-all hover:-translate-y-0.5">
        Commencer maintenant <i class="fa-solid fa-arrow-right text-sm"></i>
      </a>
    </div>
  </div>
</section>

{{-- Partners --}}
<section class="py-16 sm:py-20 bg-slate-50">
  <div class="max-w-6xl mx-auto px-4 text-center reveal">
    <span class="inline-block px-3 py-1 rounded-full bg-white text-sika-700 text-xs font-semibold uppercase tracking-wider mb-3 border border-slate-200">Intégrations</span>
    <h2 class="text-2xl sm:text-3xl font-bold text-night-900 mb-3">Nos partenaires de confiance</h2>
    <p class="text-slate-600 mb-10 max-w-xl mx-auto text-sm sm:text-base">Des passerelles de paiement reconnues en Afrique de l'Ouest pour des transactions fiables et sécurisées.</p>
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
      @foreach(['Kkiapay', 'Flutterwave', 'PayDunya', 'MTN MoMo', 'Moov Money', 'Ecobank'] as $i => $partner)
        <div class="p-4 sm:p-5 rounded-xl bg-white border border-slate-100 shadow-soft flex items-center justify-center font-semibold text-slate-600 text-sm card-hover reveal reveal-delay-{{ ($i % 3) + 1 }}">
          {{ $partner }}
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Testimonials --}}
<section class="py-16 sm:py-20">
  <div class="max-w-6xl mx-auto px-4">
    <div class="text-center mb-12 reveal">
      <span class="inline-block px-3 py-1 rounded-full bg-sika-50 text-sika-700 text-xs font-semibold uppercase tracking-wider mb-3">Témoignages</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-night-900">Ce que disent nos utilisateurs</h2>
    </div>
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach([
        ['A','Amélie K.','Commerçante, Cotonou','Depuis SikaFlow, je n\'ai plus eu un seul retard sur mes remboursements. Les rappels SMS sont parfaits.'],
        ['M','Marc D.','Fonctionnaire, Porto-Novo','J\'ai regroupé mes 3 prêts et mes abonnements Canal+ et Internet. Tout est visible en un coup d\'œil.'],
        ['F','Fatou B.','Étudiante, Parakou','L\'inscription a pris moins d\'une minute. Le prélèvement auto m\'a sauvé deux fois déjà.'],
      ] as $i => $t)
        <div class="p-6 rounded-2xl bg-white border border-slate-100 shadow-soft card-hover reveal reveal-delay-{{ $i + 1 }}">
          <div class="flex items-center gap-3 mb-4">
            <div class="w-10 h-10 rounded-full bg-sika-100 text-sika-700 flex items-center justify-center font-bold">{{ $t[0] }}</div>
            <div>
              <div class="font-semibold text-sm">{{ $t[1] }}</div>
              <div class="text-xs text-slate-400">{{ $t[2] }}</div>
            </div>
          </div>
          <p class="text-sm text-slate-600 leading-relaxed italic">"{{ $t[3] }}"</p>
          <div class="mt-3 text-gold-500 text-sm flex gap-0.5">
            @for($s = 0; $s < 5; $s++)<i class="fa-solid fa-star text-xs"></i>@endfor
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Security --}}
<section class="py-16 sm:py-20 bg-night-900 text-white">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
    <div class="reveal">
      <span class="inline-block px-3 py-1 rounded-full bg-white/10 text-sika-300 text-xs font-semibold uppercase tracking-wider mb-3">Sécurité</span>
      <h2 class="text-2xl sm:text-3xl font-bold mb-4">Vos données, notre priorité</h2>
      <p class="text-slate-400 mb-6 text-sm sm:text-base leading-relaxed">SikaFlow chiffre vos informations sensibles, respecte les normes de sécurité des passerelles de paiement et ne stocke jamais vos codes PIN Mobile Money.</p>
      <ul class="space-y-3 text-sm">
        @foreach(['Chiffrement SSL/TLS sur toutes les connexions','Authentification sécurisée par téléphone','Conformité aux standards PCI-DSS des partenaires','Hébergement fiable avec sauvegardes quotidiennes'] as $item)
          <li class="flex items-center gap-2 text-slate-300">
            <svg class="w-5 h-5 text-sika-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
            {{ $item }}
          </li>
        @endforeach
      </ul>
    </div>
    <div class="grid grid-cols-2 gap-4 reveal reveal-delay-2">
      @foreach([
        ['fa-lock', 'Données chiffrées'],
        ['fa-shield-halved', 'Paiements sécurisés'],
        ['fa-mobile-screen', '2FA par SMS'],
        ['fa-flag', 'Made in Bénin'],
      ] as $badge)
        <div class="p-5 rounded-xl bg-white/5 border border-white/10 text-center hover:bg-white/10 transition-colors">
          <div class="w-10 h-10 rounded-lg bg-white/10 text-sika-400 flex items-center justify-center mx-auto mb-2">
            <i class="fa-solid {{ $badge[0] }} text-lg"></i>
          </div>
          <div class="text-xs sm:text-sm text-slate-300 font-medium">{{ $badge[1] }}</div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- FAQ --}}
<section class="py-16 sm:py-20 bg-white" x-data="{ open: null }">
  <div class="max-w-3xl mx-auto px-4">
    <div class="text-center mb-10 reveal">
      <span class="inline-block px-3 py-1 rounded-full bg-sika-50 text-sika-700 text-xs font-semibold uppercase tracking-wider mb-3">FAQ</span>
      <h2 class="text-2xl sm:text-3xl font-bold text-night-900">Questions fréquentes</h2>
    </div>
    <div class="space-y-3">
      @foreach([
        ['SikaFlow est-il gratuit ?','L\'inscription et la gestion de base sont entièrement gratuites. Des fonctionnalités avancées pourront être proposées ultérieurement.'],
        ['Quels moyens de paiement sont acceptés ?','MTN Mobile Money, Moov Money, cartes Visa/Mastercard et virements bancaires via Kkiapay, Flutterwave et PayDunya.'],
        ['Mes données sont-elles en sécurité ?','Oui. Toutes les communications sont chiffrées et nous ne stockons jamais vos codes PIN ou mots de passe bancaires.'],
        ['Puis-je désactiver le prélèvement automatique ?','Absolument. Vous gardez le contrôle total et pouvez activer ou désactiver l\'auto-paiement à tout moment depuis votre tableau de bord.'],
      ] as $i => $faq)
        <div class="rounded-xl border border-slate-100 overflow-hidden reveal reveal-delay-{{ ($i % 3) + 1 }}">
          <button
            @click="open = open === {{ $i }} ? null : {{ $i }}"
            class="w-full flex items-center justify-between px-5 py-4 text-left font-semibold text-sm sm:text-base hover:bg-slate-50 transition-colors"
            :aria-expanded="open === {{ $i }}"
          >
            {{ $faq[0] }}
            <svg class="w-5 h-5 text-slate-400 shrink-0 transition-transform duration-300" :class="open === {{ $i }} && 'rotate-180'" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
          </button>
          <div
            x-show="open === {{ $i }}"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            class="px-5 pb-4 text-sm text-slate-600 leading-relaxed"
          >
            {{ $faq[1] }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- Final CTA --}}
<section class="py-16 sm:py-20 bg-gradient-to-br from-sika-600 to-sika-800 text-white">
  <div class="max-w-3xl mx-auto px-4 text-center reveal">
    <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold mb-4">Ne laissez plus les échéances vous surprendre</h2>
    <p class="text-sika-100 mb-8 text-sm sm:text-base">Créez votre compte en moins d'une minute et reprenez le contrôle de vos finances dès aujourd'hui.</p>
    <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
      <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-3.5 rounded-xl bg-white text-sika-700 font-semibold hover:bg-slate-100 transition-all hover:-translate-y-0.5 shadow-lg">
        Créer mon compte <i class="fa-solid fa-arrow-right text-sm"></i>
      </a>
      <a href="{{ route('contact') }}" class="w-full sm:w-auto px-8 py-3.5 rounded-xl border border-white/30 hover:bg-white/10 transition-all">Nous contacter</a>
    </div>
  </div>
</section>

@endsection
