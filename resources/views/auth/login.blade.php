@extends('layouts.app')
@section('title', 'Connexion — SikaFlow')
@section('meta_description', 'Connectez-vous à votre compte SikaFlow pour gérer vos prêts, abonnements et paiements Mobile Money.')
@section('content')
<section class="min-h-[calc(100vh-4rem)] grid lg:grid-cols-2">
  {{-- Hero panel --}}
  <div class="relative overflow-hidden hero-gradient text-white px-6 py-12 sm:py-16 lg:py-0 flex flex-col justify-center">
    <div class="absolute inset-0 hero-grid"></div>
    <div class="hero-glow w-80 h-80 bg-sika-500/25 -top-16 -right-16 animate-blob"></div>
    <div class="hero-glow w-64 h-64 bg-gold-500/10 bottom-10 left-8 animate-blob" style="animation-delay: -6s"></div>

    <div class="relative z-10 max-w-md mx-auto lg:mx-0 lg:ml-auto lg:mr-14 xl:mr-20 animate-fade-up">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-2.5 mb-10 group">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-sika-400 to-sika-700 flex items-center justify-center text-white font-bold shadow-glow-soft group-hover:rotate-6 group-hover:scale-105 transition-transform duration-300">S</div>
        <span class="font-display font-bold text-xl">Sika<span class="text-sika-400">Flow</span></span>
      </a>

      <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight mb-4 tracking-tight">
        Reprenez le contrôle de vos <span class="text-gradient">finances</span>
      </h1>
      <p class="text-slate-300 text-base leading-relaxed mb-9">
        Connectez-vous pour suivre vos prêts, gérer vos abonnements et ne plus jamais manquer une échéance.
      </p>

      <ul class="space-y-4">
        @foreach([
          ['M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'Rappels automatiques avant chaque échéance'],
          ['M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'Paiements Mobile Money sécurisés'],
          ['M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z', 'Tableau de bord clair et intuitif'],
        ] as $feature)
          <li class="flex items-start gap-3 text-sm text-slate-300">
            <span class="shrink-0 w-9 h-9 rounded-xl bg-white/10 border border-white/10 backdrop-blur flex items-center justify-center">
              <svg class="w-4 h-4 text-sika-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $feature[0] }}"/></svg>
            </span>
            {{ $feature[1] }}
          </li>
        @endforeach
      </ul>

      <div class="mt-10 hidden lg:flex items-center gap-4 text-xs text-slate-400">
        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> MTN MoMo</span>
        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Moov Money</span>
        <span class="flex items-center gap-1.5"><svg class="w-4 h-4 text-sika-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg> Cartes bancaires</span>
      </div>
    </div>
  </div>

  {{-- Form panel --}}
  <div class="flex items-center justify-center px-4 py-12 sm:py-16 bg-slate-50 relative overflow-hidden">
    <div class="absolute -top-24 -right-24 w-80 h-80 bg-sika-100/60 rounded-full blur-3xl pointer-events-none"></div>
    <div class="w-full max-w-md relative animate-fade-up" style="animation-delay: 0.1s">
      <div class="text-center mb-8 lg:hidden">
        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-sika-500 to-sika-700 flex items-center justify-center text-white font-bold mx-auto mb-3 shadow-glow-soft">S</div>
      </div>

      <div class="relative rounded-3xl shadow-card border border-white/60 bg-white/70 backdrop-blur-xl p-7 sm:p-9">
        <div class="mb-8">
          <h2 class="text-2xl font-bold text-night-900 mb-1 flex items-center gap-2.5">
            Bon retour <i class="fa-solid fa-hand text-sika-600 text-2xl animate-float"></i>
          </h2>
          <p class="text-sm text-slate-500">Entrez vos identifiants pour accéder à votre espace.</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-5">
          @csrf

          <div>
            <label for="telephone" class="field-label">Numéro de téléphone</label>
            <div class="input-icon-wrap">
              <span class="input-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </span>
              <input id="telephone" name="telephone" value="{{ old('telephone') }}" class="input input-with-icon @error('telephone') input-error @enderror" placeholder="97 00 00 01" required autofocus>
            </div>

            @error('telephone')
              <p class="mt-2 text-xs text-rose-600 font-medium flex items-center gap-1.5">
                <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/></svg>
                {{ $message }}
              </p>
            @enderror
          </div>

          <div x-data="{ show: false }">
            <label for="password" class="field-label">Mot de passe</label>
            <div class="input-icon-wrap">
              <span class="input-icon">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
              </span>
              <input id="password" :type="show ? 'text' : 'password'" name="password" class="input input-with-icon !pr-12" required>
              <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 p-1 text-slate-400 hover:text-slate-600 transition-colors" tabindex="-1" aria-label="Afficher le mot de passe">
                <svg x-show="!show" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                <svg x-show="show" x-cloak class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
              </button>
            </div>
          </div>

          <label class="flex items-center gap-2.5 text-sm text-slate-600 cursor-pointer select-none">
            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30">
            Se souvenir de moi
          </label>

          <button type="submit" class="btn-primary w-full !py-3.5 relative overflow-hidden">
            Se connecter
            <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
          </button>
        </form>

        <div class="relative my-7">
          <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
          <div class="relative flex justify-center"><span class="divider-label bg-transparent">Nouveau sur SikaFlow ?</span></div>
        </div>

        <a href="{{ route('register') }}" class="btn-outline w-full !py-3">
          Créer un compte
        </a>
      </div>

      <p class="text-center text-xs text-slate-400 mt-6">
        En vous connectant, vous acceptez nos conditions d'utilisation.
      </p>
    </div>
  </div>
</section>
@endsection
