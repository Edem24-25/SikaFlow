@extends('layouts.app')
@section('title', 'Inscription — SikaFlow')

@push('styles')
<style>
  .auth-input {
    width: 100%;
    border-radius: 0.75rem;
    border: 1px solid #e2e8f0;
    padding: 0.75rem 1rem 0.75rem 2.75rem;
    font-size: 0.9375rem;
    transition: all 0.2s ease;
    background: #fff;
  }
  .auth-input:focus {
    outline: none;
    border-color: #1ba36b;
    box-shadow: 0 0 0 3px rgba(27, 163, 107, 0.15);
  }
  .auth-input::placeholder { color: #94a3b8; }
</style>
@endpush

@section('content')
<section class="min-h-[calc(100vh-4rem)] grid lg:grid-cols-2">
  {{-- Hero panel --}}
  <div class="relative overflow-hidden hero-gradient text-white px-6 py-12 sm:py-16 lg:py-0 flex flex-col justify-center order-2 lg:order-1">
    <div class="hero-glow w-80 h-80 bg-sika-500/25 -top-16 -left-16 absolute"></div>
    <div class="hero-glow w-64 h-64 bg-gold-500/10 bottom-10 right-8 absolute"></div>

    <div class="relative z-10 max-w-md mx-auto lg:mx-0 lg:ml-12 xl:ml-20 animate-fade-up">
      <a href="{{ route('home') }}" class="inline-flex items-center gap-2 mb-8 group">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-sika-400 to-sika-600 flex items-center justify-center text-white font-bold shadow-glow group-hover:scale-105 transition-transform">S</div>
        <span class="font-display font-bold text-xl">SikaFlow</span>
      </a>

      <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight mb-4">
        Rejoignez <span class="text-sika-400">500+</span> utilisateurs
      </h1>
      <p class="text-slate-300 text-base leading-relaxed mb-8">
        Créez votre compte en quelques secondes et commencez à gérer vos prêts et abonnements sans stress.
      </p>

      {{-- Stats cards --}}
      <div class="grid grid-cols-2 gap-3 mb-8">
        @foreach([
          ['0 FCFA', 'Inscription gratuite'],
          ['98 %', 'Ponctualité'],
          ['2 000+', 'Prêts gérés'],
          ['24/7', 'Accès en ligne'],
        ] as $stat)
          <div class="rounded-xl bg-white/5 backdrop-blur border border-white/10 px-4 py-3">
            <div class="text-lg font-bold text-sika-400">{{ $stat[0] }}</div>
            <div class="text-xs text-slate-400 mt-0.5">{{ $stat[1] }}</div>
          </div>
        @endforeach
      </div>

      {{-- Preview card --}}
      <div class="rounded-2xl bg-white/5 backdrop-blur border border-white/10 p-5 shadow-2xl animate-float hidden sm:block">
        <div class="text-xs uppercase text-slate-400 tracking-wider">Votre prochaine échéance</div>
        <div class="mt-2 flex items-end justify-between gap-3">
          <div>
            <div class="text-2xl font-bold">45 000 FCFA</div>
            <div class="text-xs text-slate-400 mt-1">Ecobank · dans 3 jours</div>
          </div>
          <span class="px-2 py-1 rounded-md bg-gold-500/20 text-gold-400 text-xs shrink-0">Auto</span>
        </div>
      </div>
    </div>
  </div>

  {{-- Form panel --}}
  <div class="flex items-center justify-center px-4 py-10 sm:py-14 lg:py-16 bg-slate-50 order-1 lg:order-2">
    <div class="w-full max-w-md animate-fade-up">
      <div class="text-center mb-8 lg:hidden">
        <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-sika-500 to-sika-700 flex items-center justify-center text-white font-bold mx-auto mb-3 shadow-soft">S</div>
      </div>

      <div class="bg-white rounded-2xl shadow-soft border border-slate-100 p-6 sm:p-8">
        <div class="mb-7">
          <h2 class="text-2xl font-bold text-night-900 mb-1">Créer votre compte</h2>
          <p class="text-sm text-slate-500">Quelques informations suffisent pour démarrer.</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-4">
          @csrf

          <div>
            <label for="nom" class="block text-sm font-medium text-slate-700 mb-1.5">Nom complet</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              </span>
              <input id="nom" name="nom" value="{{ old('nom') }}" class="auth-input" placeholder="Jean Dupont" required autofocus>
            </div>
          </div>

          <div>
            <label for="telephone" class="block text-sm font-medium text-slate-700 mb-1.5">Téléphone</label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              </span>
              <input id="telephone" name="telephone" value="{{ old('telephone') }}" class="auth-input" placeholder="+22997000001" required>
            </div>
          </div>

          <div>
            <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
              E-mail <span class="text-slate-400 font-normal">(optionnel)</span>
            </label>
            <div class="relative">
              <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
              </span>
              <input id="email" type="email" name="email" value="{{ old('email') }}" class="auth-input" placeholder="vous@exemple.com">
            </div>
          </div>

          <div class="grid sm:grid-cols-2 gap-4">
            <div x-data="{ show: false }">
              <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">Mot de passe</label>
              <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                </span>
                <input id="password" :type="show ? 'text' : 'password'" name="password" class="auth-input pr-11" required>
                <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors" tabindex="-1" aria-label="Afficher le mot de passe">
                  <svg x-show="!show" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                  <svg x-show="show" x-cloak class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                </button>
              </div>
            </div>

            <div x-data="{ show: false }">
              <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">Confirmation</label>
              <div class="relative">
                <span class="absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                </span>
                <input id="password_confirmation" :type="show ? 'text' : 'password'" name="password_confirmation" class="auth-input pr-11" required>
                <button type="button" @click="show = !show" class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 transition-colors" tabindex="-1" aria-label="Afficher le mot de passe">
                  <svg x-show="!show" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                  <svg x-show="show" x-cloak class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
                </button>
              </div>
            </div>
          </div>

          <label class="flex items-start gap-2.5 text-xs text-slate-600 cursor-pointer select-none pt-1">
            <input type="checkbox" required class="w-4 h-4 mt-0.5 rounded border-slate-300 text-sika-600 focus:ring-sika-500/30 shrink-0">
            J'accepte les <a href="#" class="text-sika-700 font-medium hover:underline">conditions d'utilisation</a> et la politique de confidentialité de SikaFlow.
          </label>

          <button type="submit" class="w-full py-3.5 rounded-xl bg-sika-600 text-white font-semibold hover:bg-sika-700 transition-all hover:-translate-y-0.5 shadow-soft hover:shadow-glow">
            Créer mon compte
          </button>
        </form>

        <div class="relative my-7">
          <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-slate-200"></div></div>
          <div class="relative flex justify-center text-xs"><span class="bg-white px-3 text-slate-400">Déjà inscrit ?</span></div>
        </div>

        <a href="{{ route('login') }}" class="block w-full text-center py-3 rounded-xl border-2 border-slate-200 text-slate-700 font-semibold hover:bg-slate-50 transition-colors">
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
