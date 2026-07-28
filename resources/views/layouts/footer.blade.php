<footer class="bg-night-900 text-slate-300 mt-auto">
  {{-- Main footer --}}
  <div class="max-w-6xl mx-auto px-4 py-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
    {{-- Brand --}}
    <div class="sm:col-span-2 lg:col-span-1">
      <div class="flex items-center gap-2 mb-4">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sika-400 to-sika-600 flex items-center justify-center text-white font-bold">S</div>
        <span class="font-display font-bold text-white text-lg">SikaFlow</span>
      </div>
      <p class="text-sm text-slate-400 leading-relaxed mb-5">Une solution <strong class="text-slate-300">HODD GLOBAL</strong> — Porto-Novo, Bénin. Gestion automatisée des remboursements de prêts et abonnements.</p>
      <div class="flex items-center gap-3">
        <a href="mailto:hoddglobal.contacts@gmail.com" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-sika-600 flex items-center justify-center transition-colors" aria-label="E-mail">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
        </a>
        <a href="tel:+2290197458725" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-sika-600 flex items-center justify-center transition-colors" aria-label="Téléphone">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
        </a>
        <a href="https://www.hoddglobal.com" target="_blank" rel="noopener" class="w-9 h-9 rounded-lg bg-slate-800 hover:bg-sika-600 flex items-center justify-center transition-colors" aria-label="Site web HODD GLOBAL">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/></svg>
        </a>
      </div>
    </div>

    {{-- Product --}}
    <div>
      <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Produit</h4>
      <ul class="text-sm space-y-3 text-slate-400">
        <li><a href="{{ route('home') }}" class="hover:text-sika-400 transition-colors">Accueil</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-sika-400 transition-colors">À propos</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-sika-400 transition-colors">Contact</a></li>
        <li><a href="{{ route('register') }}" class="hover:text-sika-400 transition-colors">Créer un compte</a></li>
        <li><a href="{{ route('login') }}" class="hover:text-sika-400 transition-colors">Connexion</a></li>
      </ul>
    </div>

    {{-- Fonctionnalités --}}
    <div>
      <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Fonctionnalités</h4>
      <ul class="text-sm space-y-3 text-slate-400">
        <li><span class="hover:text-sika-400 transition-colors cursor-default">Gestion des prêts</span></li>
        <li><span class="hover:text-sika-400 transition-colors cursor-default">Suivi abonnements</span></li>
        <li><span class="hover:text-sika-400 transition-colors cursor-default">Paiements Mobile Money</span></li>
        <li><span class="hover:text-sika-400 transition-colors cursor-default">Rappels automatiques</span></li>
        <li><span class="hover:text-sika-400 transition-colors cursor-default">Export PDF</span></li>
      </ul>
    </div>

    {{-- Contact --}}
    <div>
      <h4 class="text-white font-semibold mb-4 text-sm uppercase tracking-wider">Contact</h4>
      <ul class="text-sm space-y-3 text-slate-400">
        <li class="flex items-start gap-2">
          <svg class="w-4 h-4 mt-0.5 shrink-0 text-sika-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          <span>Porto-Novo, Bénin</span>
        </li>
        <li class="flex items-start gap-2">
          <svg class="w-4 h-4 mt-0.5 shrink-0 text-sika-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
          <a href="tel:+2290197458725" class="hover:text-sika-400 transition-colors">01 97 45 87 25</a>
        </li>
        <li class="flex items-start gap-2">
          <svg class="w-4 h-4 mt-0.5 shrink-0 text-sika-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          <a href="mailto:hoddglobal.contacts@gmail.com" class="hover:text-sika-400 transition-colors break-all">hoddglobal.contacts@gmail.com</a>
        </li>
      </ul>
    </div>
  </div>

  {{-- Partners strip --}}
  <div class="border-t border-slate-800">
    <div class="max-w-6xl mx-auto px-4 py-6">
      <p class="text-xs text-slate-500 text-center mb-4 uppercase tracking-widest">Partenaires de paiement</p>
      <div class="flex flex-wrap items-center justify-center gap-6 md:gap-10 text-slate-500 text-sm font-medium">
        <span class="px-4 py-2 rounded-lg bg-slate-800/50 hover:text-slate-300 transition-colors">Kkiapay</span>
        <span class="px-4 py-2 rounded-lg bg-slate-800/50 hover:text-slate-300 transition-colors">Flutterwave</span>
        <span class="px-4 py-2 rounded-lg bg-slate-800/50 hover:text-slate-300 transition-colors">PayDunya</span>
        <span class="px-4 py-2 rounded-lg bg-slate-800/50 hover:text-slate-300 transition-colors">MTN MoMo</span>
        <span class="px-4 py-2 rounded-lg bg-slate-800/50 hover:text-slate-300 transition-colors">Moov Money</span>
      </div>
    </div>
  </div>

  {{-- Copyright --}}
  <div class="border-t border-slate-800">
    <div class="max-w-6xl mx-auto px-4 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-slate-500">
      <span class="text-center sm:text-left">© {{ date('Y') }} SikaFlow — HODD GLOBAL. Tous droits réservés.</span>
      <div class="flex items-center gap-4">
        <span class="text-slate-600">Conditions d'utilisation</span>
        <span class="text-slate-600">Confidentialité</span>
        <span>v1.0</span>
      </div>
    </div>
  </div>
</footer>
