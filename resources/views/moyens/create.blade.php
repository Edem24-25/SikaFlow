@extends('layouts.app')
@section('title','Ajouter un moyen de paiement — SikaFlow')
@section('content')
<section class="max-w-lg mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Ajouter un moyen de paiement</h1>
  <form method="POST" action="{{ route('moyens.store') }}" class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 space-y-4">@csrf
    <div>
      <label class="text-sm font-medium">Type</label>
      <select name="type" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2">
        <option value="mobile_money">Mobile Money</option><option value="bancaire">Compte bancaire</option>
      </select>
    </div>
    <div><label class="text-sm font-medium">Opérateur / Banque</label><input name="operateur" placeholder="MTN, MOOV, Ecobank..." class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
    <div><label class="text-sm font-medium">Numéro / IBAN</label><input name="numero" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
    <div><label class="text-sm font-medium">Titulaire</label><input name="titulaire" value="{{ auth()->user()->nom }}" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
    <label class="flex items-center gap-2 text-sm"><input type="checkbox" name="is_default" value="1"> Définir comme moyen par défaut</label>
    <button class="w-full py-2.5 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Ajouter</button>
  </form>
</section>
@endsection
