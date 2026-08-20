<footer class="bg-night-950 text-slate-300 mt-auto relative overflow-hidden">
  {{-- Ambient glow --}}
  <div class="absolute inset-0 pointer-events-none">
    <div class="absolute -top-32 left-1/4 w-96 h-96 bg-sika-600/15 rounded-full blur-[120px]"></div>
    <div class="absolute bottom-0 right-1/4 w-80 h-80 bg-gold-500/8 rounded-full blur-[120px]"></div>
  </div>

  {{-- Main footer --}}
  <div class="relative max-w-7xl mx-auto px-4 py-14 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
    {{-- Brand --}}
    <div class="sm:col-span-2 lg:col-span-1">
      <a href="{{ route('home') }}" class="flex items-center gap-2.5 mb-4 group">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sika-400 to-sika-700 flex items-center justify-center text-white font-bold shadow-glow-soft group-hover:rotate-6 transition-transform duration-300">S</div>
        <span class="font-display font-bold text-white text-lg">Sika<span class="text-sika-400">Flow</span></span>
      </a>
      <p class="text-sm text-slate-400 leading-relaxed mb-5">Une solution <strong class="text-slate-200">HODD GLOBAL</strong> — Porto-Novo, Bénin. Gestion automatisée des remboursements de prêts et abonnements.</p>
      <div class="flex items-center gap-2.5">
        <a href="mailto:hoddglobal.contacts@gmail.com" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 hover:bg-sika-600 hover:border-sika-500 hover:-translate-y-0.5 flex items-center justify-center transition-all duration-200" aria-label="E-mail">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </a>
        <a href="tel:+2290197458725" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 hover:bg-sika-600 hover:border-sika-500 hover:-translate-y-0.5 flex items-center justify-center transition-all duration-200" aria-label="Téléphone">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        </a>
        <a href="https://www.hoddglobal.com" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-white/5 border border-white/10 hover:bg-sika-600 hover:border-sika-500 hover:-translate-y-0.5 flex items-center justify-center transition-all duration-200" aria-label="Site web HODD GLOBAL">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
        </a>
      </div>
    </div>

    {{-- Produit --}}
    <div>
      <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Produit</h4>
      <ul class="text-sm space-y-3 text-slate-400">
        <li><a href="{{ route('home') }}" class="inline-flex items-center gap-2 hover:text-sika-400 transition-colors"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Accueil</a></li>
        <li><a href="{{ route('about') }}" class="inline-flex items-center gap-2 hover:text-sika-400 transition-colors"><span class="w-1 h-1 rounded-full bg-sika-500"></span>À propos</a></li>
        <li><a href="{{ route('contact') }}" class="inline-flex items-center gap-2 hover:text-sika-400 transition-colors"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Contact</a></li>
        <li><a href="{{ route('register') }}" class="inline-flex items-center gap-2 hover:text-sika-400 transition-colors"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Créer un compte</a></li>
        <li><a href="{{ route('login') }}" class="inline-flex items-center gap-2 hover:text-sika-400 transition-colors"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Connexion</a></li>
      </ul>
    </div>

    {{-- Fonctionnalités --}}
    <div>
      <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Fonctionnalités</h4>
      <ul class="text-sm space-y-3 text-slate-400">
        <li class="inline-flex items-center gap-2 cursor-default"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Gestion des prêts</li>
        <li class="inline-flex items-center gap-2 cursor-default"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Suivi abonnements</li>
        <li class="inline-flex items-center gap-2 cursor-default"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Paiements Mobile Money</li>
        <li class="inline-flex items-center gap-2 cursor-default"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Rappels automatiques</li>
        <li class="inline-flex items-center gap-2 cursor-default"><span class="w-1 h-1 rounded-full bg-sika-500"></span>Export PDF</li>
      </ul>
    </div>

    {{-- Contact --}}
    <div>
      <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Contact</h4>
      <ul class="text-sm space-y-3.5 text-slate-400">
        <li class="flex items-start gap-2.5">
          <span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center">
            <svg class="w-4 h-4 text-sika-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          </span>
          <span>Porto-Novo, Bénin</span>
        </li>
        <li class="flex items-start gap-2.5">
          <span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center">
            <svg class="w-4 h-4 text-sika-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          </span>
          <a href="tel:+2290197458725" class="hover:text-sika-400 transition-colors">01 97 45 87 25</a>
        </li>
        <li class="flex items-start gap-2.5">
          <span class="mt-0.5 w-8 h-8 shrink-0 rounded-lg bg-white/5 border border-white/10 flex items-center justify-center">
            <svg class="w-4 h-4 text-sika-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </span>
          <a href="mailto:hoddglobal.contacts@gmail.com" class="hover:text-sika-400 transition-colors break-all">hoddglobal.contacts@gmail.com</a>
        </li>
      </ul>
    </div>
  </div>

  {{-- Partners strip --}}
  <div class="relative border-t border-white/5">
    <div class="max-w-7xl mx-auto px-4 py-6">
      <p class="text-xs text-slate-500 text-center mb-4 uppercase tracking-widest">Partenaires de paiement</p>
      <div class="flex flex-wrap items-center justify-center gap-3 text-slate-500 text-sm font-medium">
        @foreach(['Kkiapay','Flutterwave','PayDunya','MTN MoMo','Moov Money','Ecobank'] as $partner)
          <span class="px-4 py-2 rounded-full bg-white/5 border border-white/10 hover:text-slate-200 hover:border-sika-500/50 hover:-translate-y-0.5 transition-all duration-200 cursor-default">{{ $partner }}</span>
        @endforeach
      </div>
    </div>
  </div>

  {{-- Copyright --}}
  <div class="relative border-t border-white/5">
    <div class="max-w-7xl mx-auto px-4 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
      <span class="text-center sm:text-left">© {{ date('Y') }} SikaFlow — HODD GLOBAL. Tous droits réservés.</span>
      <div class="flex items-center gap-4">
        <span class="hover:text-slate-300 cursor-pointer transition-colors">Conditions d'utilisation</span>
        <a href="{{ route('privacy') }}" class="hover:text-slate-300 transition-colors">Confidentialité</a>
        <span class="px-2 py-0.5 rounded-full bg-sika-500/15 text-sika-400 border border-sika-500/25">v1.0</span>
      </div>
    </div>
  </div>
</footer>
