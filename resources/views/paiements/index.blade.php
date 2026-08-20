@extends('layouts.app')
@section('title','Historique des paiements — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-money-bill-wave text-sika-500"></i> Paiements
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Historique des paiements</h1>
      <p class="text-slate-500 text-sm mt-1">Toutes vos transactions Kkiapay en un coup d'œil.</p>
    </div>
    <a href="{{ route('paiements.pdf') }}" class="btn-outline !py-2.5 text-sm">
      <i class="fa-solid fa-file-pdf text-rose-500"></i> Relevé PDF
    </a>
  </div>

  @if($paiements->isNotEmpty())
    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 mb-6 reveal reveal-delay-1">
      @php
        $total = $paiements->sum('montant');
        $reussis = $paiements->where('statut', 'reussi')->count();
      @endphp
      <div class="card p-4 sm:p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider">Total payé</div>
        <div class="text-xl sm:text-2xl font-bold text-night-900 mt-1">{{ number_format($total,0,',',' ') }} FCFA</div>
      </div>
      <div class="card p-4 sm:p-5">
        <div class="text-xs text-slate-400 uppercase tracking-wider">Transactions</div>
        <div class="text-xl sm:text-2xl font-bold text-night-900 mt-1">{{ $paiements->count() }}</div>
      </div>
      <div class="card p-4 sm:p-5 col-span-2 sm:col-span-1">
        <div class="text-xs text-slate-400 uppercase tracking-wider">Réussies</div>
        <div class="text-xl sm:text-2xl font-bold text-emerald-600 mt-1">{{ $reussis }}</div>
      </div>
    </div>
  @endif

  <div class="bg-white rounded-3xl border border-slate-100 shadow-card overflow-hidden reveal reveal-delay-1">
    <div class="table-responsive">
      <table class="w-full text-sm min-w-[760px]">
        <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
          <tr>
            <th class="text-left px-5 py-3.5 font-semibold">Date</th>
            <th class="text-left px-5 py-3.5 font-semibold">Référence</th>
            <th class="text-left px-5 py-3.5 font-semibold">Objet</th>
            <th class="text-left px-5 py-3.5 font-semibold">Passerelle</th>
            <th class="text-left px-5 py-3.5 font-semibold">Mode</th>
            <th class="text-right px-5 py-3.5 font-semibold">Montant</th>
            <th class="text-left px-5 py-3.5 font-semibold">Statut</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse($paiements as $p)
            <tr class="hover:bg-slate-50/60 transition-colors">
              <td class="px-5 py-3.5 whitespace-nowrap text-slate-500">{{ $p->paid_at?->format('d/m/Y H:i') }}</td>
              <td class="px-5 py-3.5 font-mono text-xs text-slate-600">{{ $p->reference_transaction }}</td>
              <td class="px-5 py-3.5 font-medium text-slate-800">{{ $p->echeance?->pret?->creancier?->nom ?? $p->abonnement?->libelle }}</td>
              <td class="px-5 py-3.5">
                <span class="inline-flex items-center gap-1.5 text-xs uppercase font-semibold text-slate-600">
                  <span class="w-6 h-6 rounded-md bg-night-900 text-white text-[9px] font-black flex items-center justify-center">K</span>
                  {{ $p->passerelle }}
                </span>
              </td>
              <td class="px-5 py-3.5 text-slate-500">{{ $p->mode }}</td>
              <td class="px-5 py-3.5 text-right font-semibold text-night-900">{{ number_format($p->montant,0,',',' ') }} FCFA</td>
              <td class="px-5 py-3.5">
        @php
          $map = ['reussi' => 'bg-emerald-100 text-emerald-700', 'en_attente' => 'bg-amber-100 text-amber-700', 'echoue' => 'bg-rose-100 text-rose-700', 'annule' => 'bg-slate-100 text-slate-600'];
        @endphp
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $map[$p->statut] ?? 'bg-slate-100 text-slate-600' }}">{{ $p->statut }}</span>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="p-12 text-center">
                <span class="w-14 h-14 mx-auto mb-3 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center">
                  <i class="fa-solid fa-money-bill-wave text-xl text-slate-300"></i>
                </span>
                <div class="text-slate-500 font-medium">Aucun paiement effectué pour le moment.</div>
                <div class="text-sm text-slate-400 mt-1">Vos transactions apparaîtront ici après le premier paiement.</div>
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-5">{{ $paiements->links() }}</div>
</section>
@endsection
