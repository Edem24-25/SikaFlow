<header class="bg-white border-b border-slate-200 sticky top-0 z-40 backdrop-blur">
  <div class="max-w-6xl mx-auto px-4 h-16 flex items-center justify-between">
    <a href="{{ route('home') }}" class="flex items-center gap-2">
      <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-sika-500 to-sika-700 flex items-center justify-center text-white font-bold shadow-soft">S</div>
      <span class="font-display font-bold text-lg text-night-900">SikaFlow</span>
    </a>
    <nav class="hidden md:flex items-center gap-6 text-sm">
      @auth
        <a href="{{ route('dashboard') }}" class="text-slate-600 hover:text-sika-700">Tableau de bord</a>
        <a href="{{ route('prets.index') }}" class="text-slate-600 hover:text-sika-700">Mes prêts</a>
        <a href="{{ route('abonnements.index') }}" class="text-slate-600 hover:text-sika-700">Abonnements</a>
        <a href="{{ route('paiements.index') }}" class="text-slate-600 hover:text-sika-700">Paiements</a>
        <a href="{{ route('notifications.index') }}" class="text-slate-600 hover:text-sika-700 relative">
          Notifications
          @php $unread = auth()->user()->notifications()->whereNull('lu_at')->count(); @endphp
          @if($unread) <span class="ml-1 px-1.5 py-0.5 text-[10px] rounded-full bg-rose-500 text-white">{{ $unread }}</span> @endif
        </a>
        @if(auth()->user()->isAdmin())
          <a href="{{ route('admin.dashboard') }}" class="text-gold-500 font-semibold">Admin</a>
        @endif
      @else
        <a href="{{ route('about') }}" class="text-slate-600 hover:text-sika-700">À propos</a>
        <a href="{{ route('contact') }}" class="text-slate-600 hover:text-sika-700">Contact</a>
      @endauth
    </nav>
    <div class="flex items-center gap-2">
      @auth
        <a href="{{ route('profile.edit') }}" class="text-sm text-slate-600 hover:text-sika-700 hidden sm:inline">{{ auth()->user()->nom }}</a>
        <form method="POST" action="{{ route('logout') }}">@csrf
          <button class="text-sm px-3 py-1.5 rounded-lg border border-slate-200 hover:bg-slate-50">Déconnexion</button>
        </form>
      @else
        <a href="{{ route('login') }}" class="text-sm px-3 py-1.5 rounded-lg text-slate-700 hover:bg-slate-100">Connexion</a>
        <a href="{{ route('register') }}" class="text-sm px-3 py-1.5 rounded-lg bg-sika-600 text-white hover:bg-sika-700 shadow-soft">Créer un compte</a>
      @endauth
    </div>
  </div>
</header>
