@extends('layouts.app')
@section('title','Prêts — Admin SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-file-invoice-dollar text-sika-500"></i> Administration
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Tous les prêts</h1>
      <p class="text-slate-500 text-sm mt-1">Vue globale des engagements enregistrés.</p>
    </div>
    <span class="px-3.5 py-2 rounded-xl bg-slate-100 text-slate-600 text-sm font-semibold flex items-center gap-2">
      <i class="fa-solid fa-file-invoice-dollar text-slate-400"></i> {{ $prets->total() }} prêts
    </span>
  </div>

  <div class="card overflow-hidden reveal reveal-delay-1">
    <div class="table-responsive">
      <table class="w-full text-sm min-w-[700px]">
        <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
          <tr>
            <th class="text-left px-5 py-3.5 font-semibold">Réf.</th>
            <th class="text-left px-5 py-3.5 font-semibold">Utilisateur</th>
            <th class="text-left px-5 py-3.5 font-semibold">Créancier</th>
            <th class="text-right px-5 py-3.5 font-semibold">Montant</th>
            <th class="text-right px-5 py-3.5 font-semibold">Durée</th>
            <th class="text-left px-5 py-3.5 font-semibold">Statut</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse($prets as $p)
            @php $map = ['actif' => 'bg-emerald-100 text-emerald-700', 'cloture' => 'bg-slate-100 text-slate-600', 'en_retard' => 'bg-rose-100 text-rose-700', 'annule' => 'bg-slate-100 text-slate-600']; @endphp
            <tr class="hover:bg-slate-50/60 transition-colors">
              <td class="px-5 py-3.5 font-mono text-xs text-slate-600 whitespace-nowrap">{{ $p->reference }}</td>
              <td class="px-5 py-3.5 font-medium text-slate-800">{{ $p->user->nom }}</td>
              <td class="px-5 py-3.5 text-slate-500">{{ $p->creancier->nom }}</td>
              <td class="px-5 py-3.5 text-right font-semibold text-night-900 whitespace-nowrap">{{ number_format($p->montant_principal,0,',',' ') }} FCFA</td>
              <td class="px-5 py-3.5 text-right text-slate-500">{{ $p->duree_mois }} mois</td>
              <td class="px-5 py-3.5">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $map[$p->statut] ?? 'bg-slate-100 text-slate-600' }}">{{ $p->statut }}</span>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="p-12 text-center text-slate-400">Aucun prêt enregistré.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-5">{{ $prets->links() }}</div>
</section>
@endsection
