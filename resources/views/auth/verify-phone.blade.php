@extends('layouts.app')
@section('title', 'Vérification du téléphone — SikaFlow')
@section('content')
<section class="relative min-h-[calc(100vh-4rem)] flex items-center justify-center px-4 py-16 overflow-hidden">
  <div class="absolute inset-0 bg-grid-fade pointer-events-none"></div>
  <div class="hero-glow w-80 h-80 bg-sika-500/15 -top-20 -right-20 animate-blob"></div>
  <div class="hero-glow w-80 h-80 bg-gold-500/10 -bottom-20 -left-20 animate-blob" style="animation-delay: -6s"></div>

  <div class="relative w-full max-w-md animate-fade-up">
    <div class="relative rounded-[2rem] shadow-card border border-white/60 bg-white/80 backdrop-blur-xl p-8 sm:p-10 text-center overflow-hidden">
      <div class="absolute -top-10 -right-10 w-32 h-32 bg-sika-500/5 rounded-full"></div>
      <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-sika-500/5 rounded-full"></div>

      {{-- Icon --}}
      <div class="relative w-16 h-16 rounded-2xl bg-gradient-to-br from-sika-500 to-sika-700 text-white flex items-center justify-center mx-auto mb-6 shadow-glow-soft animate-float">
        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
      </div>

      <h1 class="text-2xl font-bold text-night-900 mb-2">Vérifiez votre téléphone</h1>
      <p class="text-slate-500 text-sm mb-7">
        Nous avons envoyé un code de vérification à 6 chiffres par e-mail. Saisissez-le pour confirmer votre numéro
        <span class="font-semibold text-sika-700">{{ $telephone }}</span>.
      </p>

      {{-- Success/Error Alerts --}}
      @if(session('success'))
        <div class="mb-6 p-4 rounded-2xl bg-emerald-50 border border-emerald-200 text-emerald-700 text-sm font-medium flex items-center gap-2.5 animate-fade-down">
          <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      @if($errors->any())
        <div class="mb-6 p-4 rounded-2xl bg-rose-50 border border-rose-200 text-rose-700 text-sm font-medium text-left">
          <div class="flex items-center gap-2 mb-1.5">
            <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <span class="font-bold">Une erreur est survenue</span>
          </div>
          <ul class="list-disc pl-5 space-y-0.5 text-xs">
            @foreach($errors->all() as $e)
              <li>{{ $e }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Code verification form --}}
      <form method="POST" action="{{ route('verification.verify') }}" class="space-y-6">
        @csrf
        <div>
          <label for="code" class="sr-only">Code OTP</label>
          <input
            type="text"
            id="code"
            name="code"
            maxlength="6"
            placeholder="0 0 0 0 0 0"
            class="w-full tracking-[0.5em] text-center text-2xl font-bold py-4 border border-slate-200 rounded-2xl outline-none focus:ring-4 focus:ring-sika-500/15 focus:border-sika-500 transition-all placeholder:text-slate-200 hover:border-sika-300"
            required
            autofocus
            autocomplete="one-time-code"
          >
        </div>

        <button type="submit" class="btn-primary w-full !py-3.5 relative overflow-hidden">
          Valider le code
          <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
        </button>
      </form>

      {{-- Resend Code form --}}
      <div class="mt-8 border-t border-slate-100 pt-6">
        <form method="POST" action="{{ route('verification.resend') }}" x-data="{ secondsLeft: 60, canResend: false }" x-init="
          const interval = setInterval(() => {
            if (secondsLeft > 0) {
              secondsLeft--;
            } else {
              canResend = true;
              clearInterval(interval);
            }
          }, 1000);
        ">
          @csrf
          <p class="text-sm text-slate-500">
            Vous n'avez pas reçu le code ? <br>
            <button
              type="submit"
              ::disabled="!canResend"
              class="mt-2 text-sm font-semibold transition-colors"
              ::class="canResend ? 'text-sika-600 hover:text-sika-700 cursor-pointer' : 'text-slate-400 cursor-not-allowed'"
            >
              <span x-show="canResend">Renvoyer un nouveau code par e-mail</span>
              <span x-show="!canResend">Renvoyer dans <span x-text="secondsLeft" class="font-bold"></span>s</span>
            </button>
          </p>
        </form>
      </div>

      {{-- Logout Link --}}
      <div class="mt-6">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="text-xs text-slate-400 hover:text-slate-600 transition-colors underline underline-offset-2">
            Se déconnecter
          </button>
        </form>
      </div>
    </div>
  </div>
</section>
@endsection
