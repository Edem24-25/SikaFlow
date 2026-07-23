@extends('layouts.app')
@section('title', 'À propos — SikaFlow par HODD GLOBAL')
@section('content')
<section class="max-w-4xl mx-auto px-4 py-16">
  <h1 class="text-4xl font-bold mb-4">À propos de SikaFlow</h1>
  <p class="text-slate-600 mb-6">SikaFlow est la première solution phare de <strong>HODD GLOBAL</strong>, une jeune structure béninoise évoluant dans le secteur des technologies financières. Notre mission : simplifier la gestion quotidienne des engagements financiers récurrents des particuliers.</p>
  <div class="grid md:grid-cols-3 gap-6 mt-10">
    <div class="p-6 rounded-2xl bg-white border border-slate-100 shadow-soft">
      <h3 class="font-semibold text-lg mb-2">Mission</h3>
      <p class="text-sm text-slate-600">Centraliser le suivi des prêts et abonnements et automatiser les paiements pour réduire oublis et pénalités.</p>
    </div>
    <div class="p-6 rounded-2xl bg-white border border-slate-100 shadow-soft">
      <h3 class="font-semibold text-lg mb-2">Vision</h3>
      <p class="text-sm text-slate-600">Devenir la référence en Afrique de l'Ouest pour la gestion automatisée des remboursements.</p>
    </div>
    <div class="p-6 rounded-2xl bg-white border border-slate-100 shadow-soft">
      <h3 class="font-semibold text-lg mb-2">Valeurs</h3>
      <p class="text-sm text-slate-600">Sécurité, transparence, simplicité et proximité avec nos utilisateurs.</p>
    </div>
  </div>
</section>
@endsection
