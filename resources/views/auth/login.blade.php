@extends('layouts.app')
@section('title', 'Connexion — SikaFlow')
@section('content')
<section class="max-w-md mx-auto px-4 py-16">
  <div class="bg-white p-8 rounded-2xl shadow-soft border border-slate-100">
    <h1 class="text-2xl font-bold mb-2">Bon retour 👋</h1>
    <p class="text-sm text-slate-500 mb-6">Connectez-vous à votre espace SikaFlow.</p>
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
      @csrf
      <div>
        <label class="text-sm font-medium">Numéro de téléphone</label>
        <input name="telephone" value="{{ old('telephone') }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" placeholder="+22997000001" required>
      </div>
      <div>
        <label class="text-sm font-medium">Mot de passe</label>
        <input type="password" name="password" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required>
      </div>
      <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="remember"> Se souvenir de moi</label>
      <button class="w-full py-2.5 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Se connecter</button>
    </form>
    <p class="text-sm text-slate-500 mt-6 text-center">Pas encore de compte ? <a href="{{ route('register') }}" class="text-sika-700 font-medium">Créer un compte</a></p>
  </div>
</section>
@endsection
