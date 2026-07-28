@extends('layouts.app')
@section('title','Mon profil — SikaFlow')
@section('content')

<section class="max-w-4xl mx-auto px-4 py-10">

  {{-- Header hero --}}
  <div class="relative bg-gradient-to-br from-sika-600 via-sika-700 to-sika-900 rounded-3xl p-8 mb-8 overflow-hidden">
    {{-- Background decorative circles --}}
    <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-white/5 rounded-full"></div>
    <div class="absolute top-1/2 right-32 w-16 h-16 bg-white/5 rounded-full"></div>

    <div class="relative flex flex-col sm:flex-row items-center sm:items-end gap-6">
      {{-- Avatar animé --}}
      <div class="relative group">
        <div class="w-24 h-24 rounded-2xl bg-white/20 backdrop-blur-sm border-2 border-white/30 flex items-center justify-center text-white text-4xl font-bold shadow-xl ring-4 ring-white/10 group-hover:ring-sika-300/50 transition-all duration-300">
          {{ strtoupper(substr($user->nom, 0, 1)) }}
        </div>
        <div class="absolute -bottom-2 -right-2 w-7 h-7 rounded-full bg-emerald-400 border-2 border-white flex items-center justify-center shadow-lg">
          <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
        </div>
      </div>

      {{-- Infos utilisateur --}}
      <div class="text-center sm:text-left">
        <h1 class="text-2xl sm:text-3xl font-bold text-white">{{ $user->nom }}</h1>
        <p class="text-sika-200 text-sm mt-1">{{ $user->email }}</p>
        <div class="flex items-center justify-center sm:justify-start gap-3 mt-3">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium
            {{ $user->isAdmin() ? 'bg-gold-400/20 text-yellow-300 border border-yellow-400/30' : 'bg-white/10 text-white border border-white/20' }}">
            @if($user->isAdmin())
              <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
              Administrateur
            @else
              <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
              Utilisateur
            @endif
          </span>
          @if($user->telephone)
            <span class="inline-flex items-center gap-1.5 text-xs text-sika-200">
              <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
              {{ $user->telephone }}
            </span>
          @endif
        </div>
      </div>

      @if(!$user->isAdmin())
      {{-- Stats rapides --}}
      <div class="sm:ml-auto flex gap-4 text-center">
        <div class="bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
          <div class="text-2xl font-bold text-white">{{ $user->prets()->count() }}</div>
          <div class="text-xs text-sika-200 mt-0.5">Prêts</div>
        </div>
        <div class="bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
          <div class="text-2xl font-bold text-white">{{ $user->abonnements()->count() }}</div>
          <div class="text-xs text-sika-200 mt-0.5">Abonnements</div>
        </div>
        <div class="bg-white/10 backdrop-blur-sm rounded-xl px-4 py-3 border border-white/20">
          <div class="text-2xl font-bold text-white">{{ $user->paiements()->count() }}</div>
          <div class="text-xs text-sika-200 mt-0.5">Paiements</div>
        </div>
      </div>
      @endif
    </div>
  </div>

  {{-- Alerts --}}
  @if(session('success'))
    <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(()=>show=false, 4000)"
      class="mb-6 flex items-center gap-3 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-700">
      <svg class="w-5 h-5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      <span class="text-sm font-medium">{{ session('success') }}</span>
      <button @click="show=false" class="ml-auto text-emerald-400 hover:text-emerald-600"><svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    </div>
  @endif
  @if($errors->any())
    <div class="mb-6 flex items-start gap-3 p-4 rounded-xl bg-rose-50 border border-rose-200 text-rose-700">
      <svg class="w-5 h-5 mt-0.5 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
      <ul class="text-sm space-y-0.5">@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
    </div>
  @endif

  <div class="grid md:grid-cols-2 gap-6">

    {{-- Informations personnelles --}}
    <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
      <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/50">
        <div class="w-8 h-8 rounded-lg bg-sika-100 flex items-center justify-center">
          <svg class="w-4 h-4 text-sika-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        </div>
        <div>
          <h2 class="font-semibold text-slate-800 text-sm">Informations personnelles</h2>
          <p class="text-xs text-slate-400">Vos données de contact</p>
        </div>
      </div>
      <form method="POST" action="{{ route('profile.update') }}" class="p-6 space-y-4">
        @csrf @method('PUT')
        <div class="space-y-1">
          <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Nom complet</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            </div>
            <input id="nom" name="nom" type="text" value="{{ old('nom', $user->nom) }}"
              class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-sika-500 focus:border-transparent transition-all outline-none hover:border-sika-300"
              placeholder="Votre nom complet">
          </div>
        </div>
        <div class="space-y-1">
          <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Téléphone</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            </div>
            <input id="telephone" name="telephone" type="tel" value="{{ old('telephone', $user->telephone) }}"
              class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-sika-500 focus:border-transparent transition-all outline-none hover:border-sika-300"
              placeholder="+229 xx xx xx xx">
          </div>
        </div>
        <div class="space-y-1">
          <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Adresse e-mail</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            </div>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
              class="w-full pl-10 pr-4 py-2.5 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-sika-500 focus:border-transparent transition-all outline-none hover:border-sika-300"
              placeholder="vous@exemple.com">
          </div>
        </div>
        <button type="submit"
          class="w-full py-2.5 rounded-xl bg-sika-600 text-white text-sm font-semibold hover:bg-sika-700 active:scale-95 transition-all duration-150 shadow-soft flex items-center justify-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
          Enregistrer les modifications
        </button>
      </form>
    </div>

    {{-- Mot de passe --}}
    <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
      <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/50">
        <div class="w-8 h-8 rounded-lg bg-rose-100 flex items-center justify-center">
          <svg class="w-4 h-4 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        </div>
        <div>
          <h2 class="font-semibold text-slate-800 text-sm">Sécurité du compte</h2>
          <p class="text-xs text-slate-400">Changez votre mot de passe</p>
        </div>
      </div>
      <form method="POST" action="{{ route('profile.password') }}" x-data="{ showCurrent: false, showNew: false, showConfirm: false, strength: 0 }" class="p-6 space-y-4">
        @csrf @method('PUT')

        <div class="space-y-1">
          <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Mot de passe actuel</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
            </div>
            <input :type="showCurrent ? 'text' : 'password'" name="current_password"
              class="w-full pl-10 pr-10 py-2.5 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-rose-400 focus:border-transparent transition-all outline-none hover:border-rose-300"
              placeholder="••••••••">
            <button type="button" @click="showCurrent=!showCurrent" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <svg x-show="!showCurrent" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
              <svg x-show="showCurrent" x-cloak class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
            </button>
          </div>
        </div>

        <div class="space-y-1">
          <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Nouveau mot de passe</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/></svg>
            </div>
            <input :type="showNew ? 'text' : 'password'" name="password" @input="strength = $event.target.value.length > 12 ? 3 : $event.target.value.length > 8 ? 2 : $event.target.value.length > 4 ? 1 : 0"
              class="w-full pl-10 pr-10 py-2.5 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-rose-400 focus:border-transparent transition-all outline-none hover:border-rose-300"
              placeholder="••••••••">
            <button type="button" @click="showNew=!showNew" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <svg x-show="!showNew" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
              <svg x-show="showNew" x-cloak class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
            </button>
          </div>
          {{-- Indicateur de force --}}
          <div class="flex gap-1 mt-2" x-show="strength > 0" x-transition>
            <div class="h-1.5 flex-1 rounded-full transition-all duration-300" :class="strength >= 1 ? 'bg-rose-400' : 'bg-slate-200'"></div>
            <div class="h-1.5 flex-1 rounded-full transition-all duration-300" :class="strength >= 2 ? 'bg-amber-400' : 'bg-slate-200'"></div>
            <div class="h-1.5 flex-1 rounded-full transition-all duration-300" :class="strength >= 3 ? 'bg-emerald-400' : 'bg-slate-200'"></div>
            <span class="text-xs ml-1 transition-colors" :class="strength===1?'text-rose-400':strength===2?'text-amber-500':'text-emerald-500'">
              <span x-show="strength===1">Faible</span>
              <span x-show="strength===2">Moyen</span>
              <span x-show="strength===3">Fort</span>
            </span>
          </div>
        </div>

        <div class="space-y-1">
          <label class="text-xs font-semibold text-slate-500 uppercase tracking-wide">Confirmation</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
            </div>
            <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation"
              class="w-full pl-10 pr-10 py-2.5 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-rose-400 focus:border-transparent transition-all outline-none hover:border-rose-300"
              placeholder="••••••••">
            <button type="button" @click="showConfirm=!showConfirm" class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <svg x-show="!showConfirm" class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
              <svg x-show="showConfirm" x-cloak class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"/></svg>
            </button>
          </div>
        </div>

        <button type="submit"
          class="w-full py-2.5 rounded-xl bg-rose-500 text-white text-sm font-semibold hover:bg-rose-600 active:scale-95 transition-all duration-150 shadow-soft flex items-center justify-center gap-2">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
          Changer le mot de passe
        </button>
      </form>
    </div>

  </div>

  {{-- Activité récente --}}
  @if(!$user->isAdmin())
  <div class="mt-6 bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
    <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/50">
      <div class="w-8 h-8 rounded-lg bg-indigo-100 flex items-center justify-center">
        <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
      </div>
      <div>
        <h2 class="font-semibold text-slate-800 text-sm">Résumé du compte</h2>
        <p class="text-xs text-slate-400">Vue d'ensemble de votre activité</p>
      </div>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-y sm:divide-y-0 divide-slate-100">
      <div class="p-5 text-center group hover:bg-sika-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-sika-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-sika-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->prets()->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Prêts actifs</div>
      </div>
      <div class="p-5 text-center group hover:bg-amber-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->abonnements()->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Abonnements</div>
      </div>
      <div class="p-5 text-center group hover:bg-emerald-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->paiements()->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Paiements</div>
      </div>
      <div class="p-5 text-center group hover:bg-rose-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-rose-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <svg class="w-5 h-5 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->notifications()->whereNull('lu_at')->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Non lues</div>
      </div>
    </div>
  </div>
  @endif

</section>
@endsection
