<header
  x-data="{ open: false }"
  @keydown.escape.window="open = false"
  class="bg-white/95 border-b border-slate-200 sticky top-0 z-50 backdrop-blur-md"
>
  <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
    {{-- Logo --}}
    <a href="{{ route('home') }}" class="flex items-center gap-2 shrink-0 z-50">
      <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sika-500 to-sika-700 flex items-center justify-center text-white font-bold shadow-soft">S</div>
      <span class="font-display font-bold text-lg text-night-900">SikaFlow</span>
    </a>

    {{-- Desktop nav --}}
    <nav class="hidden md:flex items-center gap-1 text-sm">
      @auth
        @if(auth()->user()->isAdmin())
          <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-lg font-semibold transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gold-500/10 text-gold-600' : 'text-slate-600 hover:text-gold-600 hover:bg-gold-50' }}">Vue d'ensemble</a>
          <a href="{{ route('admin.users.index') }}" class="px-3 py-2 rounded-lg font-semibold transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-gold-500/10 text-gold-600' : 'text-slate-600 hover:text-gold-600 hover:bg-gold-50' }}">Utilisateurs</a>
          <a href="{{ route('admin.prets.index') }}" class="px-3 py-2 rounded-lg font-semibold transition-colors {{ request()->routeIs('admin.prets.*') ? 'bg-gold-500/10 text-gold-600' : 'text-slate-600 hover:text-gold-600 hover:bg-gold-50' }}">Tous les prêts</a>
          <a href="{{ route('admin.paiements.index') }}" class="px-3 py-2 rounded-lg font-semibold transition-colors {{ request()->routeIs('admin.paiements.*') ? 'bg-gold-500/10 text-gold-600' : 'text-slate-600 hover:text-gold-600 hover:bg-gold-50' }}">Paiements</a>
          <a href="{{ route('admin.notifications.create') }}" class="px-3 py-2 rounded-lg font-semibold transition-colors {{ request()->routeIs('admin.notifications.*') ? 'bg-gold-500/10 text-gold-600' : 'text-slate-600 hover:text-gold-600 hover:bg-gold-50' }}">Notifications</a>
        @else
          <a href="{{ route('dashboard') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('dashboard') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">Tableau de bord</a>
          <a href="{{ route('prets.index') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('prets.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">Mes prêts</a>
          <a href="{{ route('abonnements.index') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('abonnements.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">Abonnements</a>
          <a href="{{ route('paiements.index') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('paiements.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">Paiements</a>
          <a href="{{ route('notifications.index') }}" class="px-3 py-2 rounded-lg transition-colors relative {{ request()->routeIs('notifications.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">
            Notifications
            @php $unread = auth()->user()->notifications()->whereNull('lu_at')->count(); @endphp
            @if($unread)
              <span class="ml-1 px-1.5 py-0.5 text-[10px] rounded-full bg-rose-500 text-white animate-pulse-soft">{{ $unread }}</span>
            @endif
          </a>
        @endif
        @if(auth()->user()->isAdmin())
          <!-- <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-lg font-semibold transition-colors {{ request()->routeIs('admin.*') ? 'bg-gold-500/10 text-gold-500' : 'text-gold-500 hover:bg-gold-500/10' }}">Admin</a> -->
        @endif
      @else
        <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('home') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">Accueil</a>
        <a href="{{ route('about') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('about') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">À propos</a>
        <a href="{{ route('contact') }}" class="px-3 py-2 rounded-lg transition-colors {{ request()->routeIs('contact') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-600 hover:text-sika-700 hover:bg-slate-50' }}">Contact</a>
      @endauth
    </nav>

    {{-- Desktop auth buttons --}}
    <div class="hidden md:flex items-center gap-2">
      @auth
        <a href="{{ route('profile.edit') }}" class="text-sm text-slate-600 hover:text-sika-700 transition-colors px-2 py-1.5 rounded-lg hover:bg-slate-50">{{ auth()->user()->nom }}</a>
        <form method="POST" action="{{ route('logout') }}">@csrf
          <button class="text-sm px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50 transition-colors">Déconnexion</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="text-sm px-3 py-1.5 rounded-lg text-slate-700 hover:bg-slate-100 transition-colors">Connexion</a>
        <a href="{{ route('register') }}" class="text-sm px-3 py-1.5 rounded-lg bg-sika-600 text-white hover:bg-sika-700 shadow-soft transition-all hover:-translate-y-0.5">Créer un compte</a>
      @endauth
    </div>

    {{-- Mobile: hamburger only (auth actions inside menu) --}}
    <div class="flex md:hidden items-center gap-1 z-50">
      @auth
        <a href="{{ route('notifications.index') }}" class="relative p-2 rounded-lg hover:bg-slate-100 transition-colors" aria-label="Notifications">
          <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          @if($unread ?? auth()->user()->notifications()->whereNull('lu_at')->count())
            <span class="absolute top-1 right-1 w-2 h-2 bg-rose-500 rounded-full"></span>
          @endif
        </a>
      @endauth

      <button
        @click="open = !open"
        class="p-2 rounded-lg hover:bg-slate-100 transition-colors"
        :aria-expanded="open"
        aria-label="Menu de navigation"
      >
        <svg x-show="!open" x-cloak class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <svg x-show="open" x-cloak class="w-6 h-6 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>
    </div>
  </div>

  {{-- Mobile menu overlay --}}
  <div
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @click="open = false"
    class="fixed inset-0 bg-night-900/50 backdrop-blur-sm md:hidden z-40"
    aria-hidden="true"
  ></div>

  {{-- Mobile menu panel --}}
  <nav
    x-show="open"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-4"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-4"
    class="md:hidden absolute top-16 left-0 right-0 bg-white border-b border-slate-200 shadow-xl z-40 max-h-[calc(100vh-4rem)] overflow-y-auto"
    aria-label="Navigation mobile"
  >
    <div class="max-w-6xl mx-auto px-4 py-4 space-y-1">
      @auth
        @if(auth()->user()->isAdmin())
          <div class="px-4 py-2 text-xs font-semibold uppercase text-gold-500 tracking-wider">Administration</div>
          <a href="{{ route('admin.dashboard') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-gold-500/10 text-gold-600 font-medium' : 'text-slate-700 hover:bg-gold-50 hover:text-gold-600' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"/></svg> Vue d'ensemble
          </a>
          <a href="{{ route('admin.users.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.users.*') ? 'bg-gold-500/10 text-gold-600 font-medium' : 'text-slate-700 hover:bg-gold-50 hover:text-gold-600' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg> Utilisateurs
          </a>
          <a href="{{ route('admin.prets.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.prets.*') ? 'bg-gold-500/10 text-gold-600 font-medium' : 'text-slate-700 hover:bg-gold-50 hover:text-gold-600' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg> Tous les prêts
          </a>
          <a href="{{ route('admin.paiements.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.paiements.*') ? 'bg-gold-500/10 text-gold-600 font-medium' : 'text-slate-700 hover:bg-gold-50 hover:text-gold-600' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/></svg> Tous les paiements
          </a>
          <a href="{{ route('admin.notifications.create') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('admin.notifications.*') ? 'bg-gold-500/10 text-gold-600 font-medium' : 'text-slate-700 hover:bg-gold-50 hover:text-gold-600' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"/></svg> Notifications
          </a>
        @else
          <a href="{{ route('dashboard') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            Tableau de bord
          </a>
          <a href="{{ route('prets.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('prets.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
            Mes prêts
          </a>
          <a href="{{ route('abonnements.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('abonnements.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
            Abonnements
          </a>
          <a href="{{ route('paiements.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('paiements.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
            Paiements
          </a>
          <a href="{{ route('notifications.index') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('notifications.*') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
            <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
            Notifications
            @if($unread ?? auth()->user()->notifications()->whereNull('lu_at')->count())
              <span class="ml-auto px-2 py-0.5 text-xs rounded-full bg-rose-500 text-white">{{ $unread ?? auth()->user()->notifications()->whereNull('lu_at')->count() }}</span>
            @endif
          </a>
        @endif

        <div class="border-t border-slate-100 my-3 pt-3">
          <a href="{{ route('profile.edit') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl text-slate-700 hover:bg-slate-50 transition-colors">
            <div class="w-8 h-8 rounded-full bg-sika-100 text-sika-700 flex items-center justify-center font-semibold text-sm">{{ strtoupper(substr(auth()->user()->nom, 0, 1)) }}</div>
            <div>
              <div class="font-medium text-sm">{{ auth()->user()->nom }}</div>
              <div class="text-xs text-slate-400">Mon profil</div>
            </div>
          </a>
          <form method="POST" action="{{ route('logout') }}" class="mt-2">@csrf
            <button class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-rose-600 hover:bg-rose-50 transition-colors text-left">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0-0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
              Déconnexion
            </button>
          </form>
        </div>
      @else
        <a href="{{ route('home') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('home') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
          Accueil
        </a>
        <a href="{{ route('about') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('about') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          À propos
        </a>
        <a href="{{ route('contact') }}" @click="open = false" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-colors {{ request()->routeIs('contact') ? 'bg-sika-50 text-sika-700 font-medium' : 'text-slate-700 hover:bg-sika-50 hover:text-sika-700' }}">
          <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          Contact
        </a>

        <div class="border-t border-slate-100 my-3 pt-3 space-y-2 px-4">
          <a href="{{ route('login') }}" @click="open = false" class="block w-full text-center py-3 rounded-xl border border-slate-200 text-slate-700 font-medium hover:bg-slate-50 transition-colors">Connexion</a>
          <a href="{{ route('register') }}" @click="open = false" class="block w-full text-center py-3 rounded-xl bg-sika-600 text-white font-semibold hover:bg-sika-700 transition-colors shadow-soft">Créer un compte</a>
        </div>
      @endauth
    </div>
  </nav>
</header>
