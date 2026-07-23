@extends('layouts.app')
@section('title', 'Inscription — SikaFlow')
@section('content')
<section class="max-w-md mx-auto px-4 py-16">
  <div class="bg-white p-8 rounded-2xl shadow-soft border border-slate-100">
    <h1 class="text-2xl font-bold mb-2">Créer votre compte</h1>
    <p class="text-sm text-slate-500 mb-6">Quelques secondes suffisent.</p>
    <form method="POST" action="{{ route('register') }}" class="space-y-4">
      @csrf
      <div><label class="text-sm font-medium">Nom complet</label><input name="nom" value="{{ old('nom') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
      <div><label class="text-sm font-medium">Téléphone</label><input name="telephone" value="{{ old('telephone') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" placeholder="+229..." required></div>
      <div><label class="text-sm font-medium">E-mail (optionnel)</label><input type="email" name="email" value="{{ old('email') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
      <div><label class="text-sm font-medium">Mot de passe</label><input type="password" name="password" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
      <div><label class="text-sm font-medium">Confirmation</label><input type="password" name="password_confirmation" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
      <label class="flex items-start gap-2 text-xs text-slate-600"><input type="checkbox" required class="mt-0.5"> J'accepte les conditions d'utilisation.</label>
      <button class="w-full py-2.5 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Créer mon compte</button>
    </form>
    <p class="text-sm text-slate-500 mt-6 text-center">Déjà inscrit ? <a href="{{ route('login') }}" class="text-sika-700 font-medium">Se connecter</a></p>
  </div>
</section>
@endsection
