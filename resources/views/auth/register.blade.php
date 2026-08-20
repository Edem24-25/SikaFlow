@extends('layouts.app')
@section('title', 'Inscription — SikaFlow')
@section('meta_description', 'Créez votre compte SikaFlow en 30 secondes avec votre numéro de téléphone. Gestion automatisée des prêts et abonnements.')
@section('content')
<section class="min-h-[calc(100vh-4rem)] grid lg:grid-cols-2">
  {{-- Hero panel --}}
  <div class="relative overflow-hidden hero-gradient text-white px-6 py-12 sm:py-16 lg:py-0 flex flex-col justify-center order-2 lg:order-1">
    <div class="absolute inset-0 hero-grid"></div>
    <div class="hero-glow w-80 h-80 bg-sika-500/25 -top-16 -left-16 animate-blob"></div>
    <div class="hero-glow w-64 h-64 bg-gold-500/10 bottom-10 right-8 animate-blob" style="animation-delay: -6s"></div>

    <div class="relative z-10 max-w-md mx-auto lg:mx-0 lg:ml-14 xl:ml-20 animate-fade-up">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 mb-10 group">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sika-400 to-sika-700 flex items-center justify-center text-white font-bold shadow-glow-soft group-hover:rotate-6 group-hover:scale-105 transition-transform duration-300">S</div>
        <span class="font-display font-bold text-xl">Sika<span class="text-sika-400">Flow</span></span>
      </a>

      <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight mb-4 tracking-tight">
        Rejoignez <span class="text-gradient">500+</span> utilisateurs
      </h1>
      <p class="text-slate-300 text-base leading-relaxed mb-9">
        Créez votre compte en quelques secondes et commencez à gérer vos prêts et abonnements sans stress.
      </p>

      <div class="grid grid-cols-2 gap-3 mb-9">
        @foreach([
          ['0 FCFA', 'Inscription gratuite'],
          ['98 %', 'Ponctualité'],
          ['2 000+', 'Prêts gérés'],
          ['24/7', 'Accès en ligne'],
        ] as $stat)
          <div class="rounded-2xl bg-white/5 backdrop-blur border border-white/10 px-4 py-3.5 hover:bg-white/10 transition-colors">
            <div class="text-lg font-bold text-sika-400">{{ $stat[0] }}</div>
            <div class="text-xs text-slate-400 mt-0.5">{{ $stat[1] }}</div>
          </div>
        @endforeach
      </div>

      <div class="relative rounded-2xl bg-white/5 backdrop-blur border border-white/10 p-5 shadow-2xl animate-float overflow-hidden hidden sm:block">
        <div class="absolute top-0 right-0 w-24 h-24 bg-sika-500/10 rounded-full blur-2xl"></div>
        <div class="relative">
          <div class="flex items-center justify-between mb-2">
            <span class="text-xs uppercase text-slate-400 tracking-wider">Votre prochaine échéance</span>
            <span class="px-2 py-1 rounded-md bg-gold-500/20 text-gold-400 text-xs font-semibold">Auto</span>
          </div>
          <div class="flex items-end justify-between gap-3">
            <div>
              <div class="text-2xl font-bold">45 000 FCFA</div>
              <div class="text-xs text-slate-400 mt-1">Ecobank · dans 3 jours</div>
            </div>
            <div class="flex -space-x-2">
              <span class="w-7 h-7 rounded-full bg-gradient-to-br from-sika-400 to-sika-600 border-2 border-night-900"></span>
              <span class="w-7 h-7 rounded-full bg-gradient-to-br from-gold-400 to-gold-600 border-2 border-night-900"></span>
            </div>
          </div>
          <div class="mt-3 h-1.5 rounded-full bg-white/10 overflow-hidden">
            <div class="h-full w-2/3 rounded-full bg-gradient-to-r from-sika-400 to-sika-600"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {{-- Form panel --}}
  <div class="flex items-center justify-center px-4 py-12 sm:py-16 bg-slate-50 relative overflow-hidden order-1 lg:order-2">
    <div class="absolute -bottom-24 -left-24 w-80 h-80 bg-sika-100/60 rounded-full blur-3xl pointer-events-none"></div>
    <div class="w-full max-w-md relative animate-fade-up" style="animation-delay: 0.1s">
      <div class="text-center mb-8 lg:hidden">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-sika-500 to-sika-700 flex items-center justify-center text-white font-bold mx-auto mb-3 shadow-glow-soft">S</div>
      </div>

      <div class="relative rounded-3xl shadow-card border border-white/60 bg-white/70 backdrop-blur-xl p-7 sm:p-9">
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-night-900 mb-1">Créer votre compte</h2>
          <p class="text-sm text-slate-500">Quelques informations suffisent pour démarrer.</p>
        </div>

        @if ($errors->any())
          <div class="bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl p-4 mb-5 text-sm space-y-1 animate-fade-down">
            @foreach ($errors->all() as $error)
              <p class="flex items-start gap-2"><span class="mt-0.5">•</span> {{ $error }}</p>
            @endforeach
          </div>
        @endif

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
          @csrf

          <div>
            <label for="nom" class="field-label">Nom complet</label>
            <div class="input-icon-wrap">
              <span class="input-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              </span>
              <input id="nom" name="nom" value="{{ old('nom') }}" class="input input-with-icon @error('nom') input-error @enderror" placeholder="Jean Dupont" required autofocus>
            </div>
            @error('nom')
              <p class="text-xs text-rose-600 mt-1.5 font-medium">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="telephone" class="field-label">Téléphone</label>
            <div class="input-icon-wrap">
              <span class="input-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </span>
              <input id="telephone" name="telephone" value="{{ old('telephone') }}" class="input input-with-icon @error('telephone') input-error @enderror" placeholder="97 00 00 01" required>
            </div>

            @error('telephone')
              <p class="text-xs text-rose-600 mt-1.5 font-medium">{{ $message }}</p>
            @enderror
          </div>

          <div>
            <label for="email" class="field-label">
              E-mail <span class="text-slate-400 font-normal">(optionnel)</span>
            </label>
            <div class="input-icon-wrap">
              <span class="input-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </span>
              <input id="email" type="email" name="email" value="{{ old('email') }}" class="input input-with-icon" placeholder="vous@exemple.com">
            </div>
            @error('email')
              <p class="text-xs text-rose-600 mt-1.5 font-medium">{{ $message }}</p>
            @enderror
          </div>

          <div class="grid sm:grid-cols-2 gap-4">
            <div>
              <label for="password" class="field-label">Mot de passe</label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </span>
                <input id="password" type="password" name="password" class="input input-with-icon" required>
              </div>
              @error('password')
                <p class="text-xs text-rose-600 mt-1.5 font-medium">{{ $message }}</p>
              @enderror
            </div>

            <div>
              <label for="password_confirmation" class="field-label">Confirmation</label>
              <div class="input-icon-wrap">
                <span class="input-icon">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </span>
                <input id="password_confirmation" type="password" name="password_confirmation" class="input input-with-icon" required>
              </div>
            </div>
          </div>

          <label class="flex items-start gap-2.5 text-xs text-slate-600 cursor-pointer select-none pt-1">
            <input type="checkbox" required class="w-4 h-4 mt-0.5 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30 shrink-0">
            J'accepte les <a href="#" class="text-sika-700 font-medium hover:underline">conditions d'utilisation</a> et la <a href="{{ route('privacy') }}" class="text-sika-700 font-medium hover:underline">politique de confidentialité</a> de SikaFlow.
          </label>

          <button type="submit" class="btn-primary w-full !py-3.5 relative overflow-hidden">
            Créer mon compte
            <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
          </button>
        </form>

        <div class="relative my-7">
          <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
          <div class="relative flex justify-center"><span class="divider-label bg-transparent">Déjà inscrit ?</span></div>
        </div>

        <a href="{{ route('login') }}" class="btn-outline w-full !py-3">
          Se connecter
        </a>
      </div>

      <p class="text-center text-xs text-slate-400 mt-6 flex items-center justify-center gap-1.5">
        <i class="fa-solid fa-lock text-sika-500"></i> Vos données sont chiffrées et protégées.
      </p>
    </div>
  </div>
</section>
@endsection
