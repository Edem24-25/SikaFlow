@extends('layouts.app')
@section('title','Mon profil — SikaFlow')
@section('content')
<section class="max-w-4xl mx-auto px-4 py-8 sm:py-12">

  {{-- Header hero --}}
  <div class="relative hero-gradient rounded-3xl p-6 sm:p-8 mb-8 overflow-hidden reveal">
    <div class="absolute -top-10 -right-10 w-48 h-48 bg-white/5 rounded-full"></div>
    <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-white/5 rounded-full"></div>
    <div class="absolute top-1/2 right-32 w-16 h-16 bg-white/5 rounded-full"></div>

    <div class="relative flex flex-col sm:flex-row items-center sm:items-end gap-6">
      <div class="relative group">
        <div class="w-24 h-24 rounded-2xl bg-white/20 backdrop-blur-sm border-2 border-white/30 flex items-center justify-center text-white text-4xl font-bold shadow-xl ring-4 ring-white/10 group-hover:ring-sika-300/50 transition-all duration-300">
          {{ strtoupper(substr($user->nom, 0, 1)) }}
        </div>
        <div class="absolute -bottom-2 -right-2 w-7 h-7 rounded-full bg-emerald-400 border-2 border-white flex items-center justify-center shadow-lg">
          <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
        </div>
      </div>

      <div class="text-center sm:text-left">
        <h1 class="text-2xl sm:text-3xl font-bold text-white">{{ $user->nom }}</h1>
        <p class="text-sika-200 text-sm mt-1">{{ $user->email }}</p>
        <div class="flex items-center justify-center sm:justify-start gap-3 mt-3 flex-wrap">
          <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium
            {{ $user->isAdmin() ? 'bg-gold-400/20 text-yellow-300 border border-yellow-400/30' : 'bg-white/10 text-white border border-white/20' }}">
            @if($user->isAdmin())
              <i class="fa-solid fa-crown text-[10px]"></i> Administrateur
            @else
              <i class="fa-solid fa-user text-[10px]"></i> Utilisateur
            @endif
          </span>
          @if($user->telephone)
            <span class="inline-flex items-center gap-1.5 text-xs text-sika-200">
              <i class="fa-solid fa-phone text-[10px]"></i> {{ $user->telephone }}
            </span>
          @endif
        </div>
      </div>

      @if(!$user->isAdmin())
      <div class="sm:ml-auto flex gap-3 text-center">
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

  <div class="grid md:grid-cols-2 gap-6">

    {{-- Informations personnelles --}}
    <div class="card overflow-hidden reveal">
      <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/50">
        <div class="w-9 h-9 rounded-xl bg-sika-100 flex items-center justify-center">
          <i class="fa-solid fa-user text-sika-600"></i>
        </div>
        <div>
          <h2 class="font-semibold text-slate-800 text-sm">Informations personnelles</h2>
          <p class="text-xs text-slate-400">Vos données de contact</p>
        </div>
      </div>
      <form method="POST" action="{{ route('profile.update') }}" class="p-6 space-y-4">
        @csrf @method('PUT')
        <div>
          <label class="field-label">Nom complet</label>
          <div class="relative">
            <i class="fa-solid fa-user text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-sm pointer-events-none"></i>
            <input id="nom" name="nom" type="text" value="{{ old('nom', $user->nom) }}" class="input !pl-10" placeholder="Votre nom complet">
          </div>
        </div>
        <div>
          <label class="field-label">Téléphone</label>
          <div class="relative">
            <i class="fa-solid fa-phone text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-sm pointer-events-none"></i>
            <input id="telephone" name="telephone" type="tel" value="{{ old('telephone', $user->telephone) }}" class="input !pl-10" placeholder="+229 xx xx xx xx">
          </div>
        </div>
        <div>
          <label class="field-label">Adresse e-mail</label>
          <div class="relative">
            <i class="fa-solid fa-envelope text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-sm pointer-events-none"></i>
            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="input !pl-10" placeholder="vous@exemple.com">
          </div>
        </div>
        <button type="submit" class="btn-primary w-full !py-3 relative overflow-hidden">
          <i class="fa-solid fa-check"></i> Enregistrer les modifications
          <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
        </button>
      </form>
    </div>

    {{-- Mot de passe --}}
    <div class="card overflow-hidden reveal reveal-delay-1">
      <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/50">
        <div class="w-9 h-9 rounded-xl bg-rose-100 flex items-center justify-center">
          <i class="fa-solid fa-shield-halved text-rose-600"></i>
        </div>
        <div>
          <h2 class="font-semibold text-slate-800 text-sm">Sécurité du compte</h2>
          <p class="text-xs text-slate-400">Changez votre mot de passe</p>
        </div>
      </div>
      <form method="POST" action="{{ route('profile.password') }}" x-data="{ showCurrent: false, showNew: false, showConfirm: false, strength: 0 }" class="p-6 space-y-4">
        @csrf @method('PUT')

        <div>
          <label class="field-label">Mot de passe actuel</label>
          <div class="relative">
            <i class="fa-solid fa-lock text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-sm pointer-events-none"></i>
            <input :type="showCurrent ? 'text' : 'password'" name="current_password" class="input !pl-10 !pr-10" placeholder="••••••••">
            <button type="button" @click="showCurrent=!showCurrent" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <i x-show="!showCurrent" class="fa-regular fa-eye"></i>
              <i x-show="showCurrent" x-cloak class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
        </div>

        <div>
          <label class="field-label">Nouveau mot de passe</label>
          <div class="relative">
            <i class="fa-solid fa-key text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-sm pointer-events-none"></i>
            <input :type="showNew ? 'text' : 'password'" name="password" @input="strength = $event.target.value.length > 12 ? 3 : $event.target.value.length > 8 ? 2 : $event.target.value.length > 4 ? 1 : 0" class="input !pl-10 !pr-10" placeholder="••••••••">
            <button type="button" @click="showNew=!showNew" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <i x-show="!showNew" class="fa-regular fa-eye"></i>
              <i x-show="showNew" x-cloak class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
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

        <div>
          <label class="field-label">Confirmation</label>
          <div class="relative">
            <i class="fa-solid fa-lock text-slate-400 absolute left-3.5 top-1/2 -translate-y-1/2 text-sm pointer-events-none"></i>
            <input :type="showConfirm ? 'text' : 'password'" name="password_confirmation" class="input !pl-10 !pr-10" placeholder="••••••••">
            <button type="button" @click="showConfirm=!showConfirm" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-slate-400 hover:text-slate-600 transition-colors">
              <i x-show="!showConfirm" class="fa-regular fa-eye"></i>
              <i x-show="showConfirm" x-cloak class="fa-regular fa-eye-slash"></i>
            </button>
          </div>
        </div>

        <button type="submit" class="w-full !py-3 inline-flex items-center justify-center gap-2 rounded-xl bg-rose-500 text-white text-sm font-semibold hover:bg-rose-600 active:scale-95 transition-all duration-150 shadow-soft">
          <i class="fa-solid fa-shield-halved"></i> Changer le mot de passe
        </button>
      </form>
    </div>

  </div>

  {{-- Activité récente --}}
  @if(!$user->isAdmin())
  <div class="mt-6 card overflow-hidden reveal">
    <div class="flex items-center gap-3 px-6 py-4 border-b border-slate-100 bg-slate-50/50">
      <div class="w-9 h-9 rounded-xl bg-indigo-100 flex items-center justify-center">
        <i class="fa-solid fa-chart-pie text-indigo-600"></i>
      </div>
      <div>
        <h2 class="font-semibold text-slate-800 text-sm">Résumé du compte</h2>
        <p class="text-xs text-slate-400">Vue d'ensemble de votre activité</p>
      </div>
    </div>
    <div class="grid grid-cols-2 sm:grid-cols-4 divide-x divide-y sm:divide-y-0 divide-slate-100">
      <div class="p-5 text-center group hover:bg-sika-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-sika-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <i class="fa-solid fa-file-invoice-dollar text-sika-600"></i>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->prets()->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Prêts actifs</div>
      </div>
      <div class="p-5 text-center group hover:bg-amber-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-amber-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <i class="fa-solid fa-arrows-rotate text-amber-600"></i>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->abonnements()->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Abonnements</div>
      </div>
      <div class="p-5 text-center group hover:bg-emerald-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-emerald-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <i class="fa-solid fa-money-bill-wave text-emerald-600"></i>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->paiements()->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Paiements</div>
      </div>
      <div class="p-5 text-center group hover:bg-rose-50/50 transition-colors">
        <div class="w-10 h-10 rounded-xl bg-rose-100 flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
          <i class="fa-solid fa-bell text-rose-600"></i>
        </div>
        <div class="text-2xl font-bold text-slate-800">{{ $user->notifications()->whereNull('lu_at')->count() }}</div>
        <div class="text-xs text-slate-500 mt-0.5">Non lues</div>
      </div>
    </div>
  </div>
  @endif

</section>
@endsection
