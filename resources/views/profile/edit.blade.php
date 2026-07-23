@extends('layouts.app')
@section('title','Mon profil — SikaFlow')
@section('content')
<section class="max-w-3xl mx-auto px-4 py-10 space-y-6">
  <h1 class="text-3xl font-bold">Mon profil</h1>

  <form method="POST" action="{{ route('profile.update') }}" class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 space-y-4">
    @csrf @method('PUT')
    <h2 class="font-semibold">Informations</h2>
    <div><label class="text-sm">Nom</label><input name="nom" value="{{ old('nom', $user->nom) }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
    <div><label class="text-sm">Téléphone</label><input name="telephone" value="{{ old('telephone', $user->telephone) }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
    <div><label class="text-sm">E-mail</label><input name="email" value="{{ old('email', $user->email) }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
    <button class="px-4 py-2 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Enregistrer</button>
  </form>

  <form method="POST" action="{{ route('profile.password') }}" class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 space-y-4">
    @csrf @method('PUT')
    <h2 class="font-semibold">Mot de passe</h2>
    <div><label class="text-sm">Mot de passe actuel</label><input type="password" name="current_password" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
    <div><label class="text-sm">Nouveau mot de passe</label><input type="password" name="password" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
    <div><label class="text-sm">Confirmation</label><input type="password" name="password_confirmation" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2"></div>
    <button class="px-4 py-2 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Changer le mot de passe</button>
  </form>
</section>
@endsection
