@extends('layouts.app')
@section('title', 'Vérification du téléphone — SikaFlow')
@section('content')
<section class="max-w-md mx-auto px-4 py-16 sm:py-24">
  <div class="bg-white rounded-3xl shadow-soft border border-slate-100 p-8 text-center relative overflow-hidden">
    {{-- Decorative backgrounds --}}
    <div class="absolute -top-10 -right-10 w-24 h-24 bg-sika-500/5 rounded-full"></div>
    <div class="absolute -bottom-10 -left-10 w-24 h-24 bg-sika-500/5 rounded-full"></div>

    {{-- Icon --}}
    <div class="w-16 h-16 rounded-2xl bg-sika-50 text-sika-600 flex items-center justify-center mx-auto mb-6 shadow-sm">
      <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
    </div>

    <h1 class="text-2xl font-bold text-slate-800 mb-2">Vérifiez votre téléphone</h1>
    <p class="text-slate-500 text-sm mb-6">
      Nous avons envoyé un code de vérification SMS à 6 chiffres au numéro <span class="font-semibold text-slate-700">{{ $telephone }}</span>.
    </p>

    {{-- Success/Error Alerts --}}
    @if(session('success'))
      <div class="mb-6 p-4 rounded-xl bg-emerald-50 border border-emerald-100 text-emerald-700 text-sm font-medium flex items-center gap-2">
        <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        <span>{{ session('success') }}</span>
      </div>
    @endif

    @if($errors->any())
      <div class="mb-6 p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 text-sm font-medium text-left">
        <div class="flex items-center gap-2 mb-1">
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
          class="w-full tracking-[0.5em] text-center text-2xl font-bold py-3.5 border border-slate-200 rounded-xl outline-none focus:ring-2 focus:ring-sika-500 focus:border-transparent transition-all placeholder:text-slate-200 hover:border-sika-300"
          required
          autofocus
          autocomplete="one-time-code"
        >
      </div>

      <button 
        type="submit" 
        class="w-full py-3 bg-sika-600 hover:bg-sika-700 text-white font-semibold rounded-xl transition-all shadow-soft hover:-translate-y-0.5"
      >
        Valider le code
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
            <span x-show="canResend">Renvoyer un nouveau code par SMS</span>
            <span x-show="!canResend">Renvoyer dans <span x-text="secondsLeft" class="font-bold"></span>s</span>
          </button>
        </p>
      </form>
    </div>

    {{-- Logout Link --}}
    <div class="mt-6">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-xs text-slate-400 hover:text-slate-600 transition-colors underline">
          Se déconnecter
        </button>
      </form>
    </div>
  </div>
</section>
@endsection
