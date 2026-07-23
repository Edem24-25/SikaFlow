@extends('layouts.app')
@section('title','Diffuser une notification — SikaFlow')
@section('content')
<section class="max-w-2xl mx-auto px-4 py-10">
  <h1 class="text-2xl font-bold mb-6">Diffuser une notification</h1>
  <form method="POST" action="{{ route('admin.notifications.store') }}" class="bg-white p-6 rounded-2xl shadow-soft border border-slate-100 space-y-4">@csrf
    <div><label class="text-sm">Cible</label>
      <select name="cible" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2">
        <option value="tous">Tous les utilisateurs</option><option value="actifs">Actifs</option><option value="suspendus">Suspendus</option>
      </select>
    </div>
    <div><label class="text-sm">Titre</label><input name="titre" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></div>
    <div><label class="text-sm">Message</label><textarea name="message" rows="4" class="mt-1 w-full rounded-lg border-slate-200 border px-3 py-2" required></textarea></div>
    <button class="px-4 py-2 rounded-lg bg-sika-600 text-white font-semibold hover:bg-sika-700">Diffuser</button>
  </form>
</section>
@endsection
