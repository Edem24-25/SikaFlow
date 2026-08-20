@extends('layouts.app')
@section('title', 'Mes prêts — SikaFlow')
@section('content')
<section class="max-w-7xl mx-auto px-4 py-8 sm:py-12">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-file-invoice-dollar text-sika-500"></i> Engagements
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Mes prêts</h1>
      <p class="text-slate-500 text-sm mt-1">Suivez vos remboursements et vos échéanciers.</p>
    </div>
    <a href="{{ route('prets.create') }}" class="btn-primary relative overflow-hidden">
      <i class="fa-solid fa-plus"></i> Nouveau prêt
      <span class="absolute inset-y-0 -left-1/2 w-1/3 bg-white/25 blur-md -skew-x-12 animate-shimmer pointer-events-none"></span>
    </a>
  </div>

  <div class="card overflow-hidden reveal reveal-delay-1">
    <div class="table-wrap">
      <table class="table-base">
        <thead class="table-head">
          <tr>
            <th>Référence</th>
            <th>Créancier</th>
            <th>Montant</th>
            <th>Durée</th>
            <th>Statut</th>
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse($prets as $p)
            <tr>
              <td class="font-mono text-xs font-semibold text-slate-600">{{ $p->reference }}</td>
              <td>
                <div class="flex items-center gap-3">
                  <x-company-logo :name="$p->creancier->nom" class="w-9 h-9 rounded-xl shrink-0 border border-slate-100" />
                  <span class="font-medium text-slate-800">{{ $p->creancier->nom }}</span>
                </div>
              </td>
              <td class="font-semibold text-slate-800">{{ number_format($p->montant_principal,0,',',' ') }} FCFA</td>
              <td class="text-slate-600">{{ $p->duree_mois }} mois</td>
              <td>
                @php
                  $badges = [
                    'actif' => 'badge-green',
                    'en_cours' => 'badge-green',
                    'termine' => 'badge-slate',
                    'suspendu' => 'badge-amber',
                    'en_retard' => 'badge-red',
                  ];
                @endphp
                <span class="{{ $badges[$p->statut] ?? 'badge-slate' }}">{{ str_replace('_',' ',$p->statut) }}</span>
              </td>
              <td class="text-right">
                <a href="{{ route('prets.show', $p) }}" class="link-arrow text-sm">Ouvrir <i class="fa-solid fa-arrow-right text-xs"></i></a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6">
                <div class="p-12 text-center flex flex-col items-center gap-3">
                  <span class="w-14 h-14 rounded-full bg-sika-50 text-sika-500 flex items-center justify-center animate-float">
                    <i class="fa-solid fa-file-invoice-dollar text-2xl"></i>
                  </span>
                  <div class="text-slate-500">Aucun prêt enregistré.</div>
                  <a href="{{ route('prets.create') }}" class="btn-outline !py-2.5 text-sm">Ajouter votre premier prêt</a>
                </div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-5">{{ $prets->links() }}</div>
</section>
@endsection
