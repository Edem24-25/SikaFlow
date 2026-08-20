@extends('layouts.app')
@section('title','Paiements — Admin SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-8 sm:py-10">
  <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-money-bill-wave text-sika-500"></i> Administration
      </div>
      <h1 class="text-2xl sm:text-3xl font-bold text-night-900 tracking-tight">Suivi des paiements</h1>
      <p class="text-slate-500 text-sm mt-1">Toutes les transactions de la plateforme.</p>
    </div>
    <span class="px-3.5 py-2 rounded-xl bg-slate-100 text-slate-600 text-sm font-semibold flex items-center gap-2">
      <i class="fa-solid fa-money-bill-wave text-slate-400"></i> {{ $paiements->total() }} transactions
    </span>
  </div>

  <div class="card overflow-hidden reveal reveal-delay-1">
    <div class="table-responsive">
      <table class="w-full text-sm min-w-[760px]">
        <thead class="bg-slate-50 text-slate-500 text-xs uppercase tracking-wider">
          <tr>
            <th class="text-left px-5 py-3.5 font-semibold">Date</th>
            <th class="text-left px-5 py-3.5 font-semibold">Utilisateur</th>
            <th class="text-left px-5 py-3.5 font-semibold">Passerelle</th>
            <th class="text-left px-5 py-3.5 font-semibold">Mode</th>
            <th class="text-right px-5 py-3.5 font-semibold">Montant</th>
            <th class="text-left px-5 py-3.5 font-semibold">Statut</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-slate-100">
          @forelse($paiements as $p)
            @php $map = ['reussi' => 'bg-emerald-100 text-emerald-700', 'en_attente' => 'bg-amber-100 text-amber-700', 'echoue' => 'bg-rose-100 text-rose-700', 'annule' => 'bg-slate-100 text-slate-600']; @endphp
            <tr class="hover:bg-slate-50/60 transition-colors">
              <td class="px-5 py-3.5 text-slate-500 whitespace-nowrap">{{ $p->paid_at?->format('d/m/Y H:i') }}</td>
              <td class="px-5 py-3.5">
                <div class="flex items-center gap-2.5">
                  <span class="w-8 h-8 rounded-lg bg-sika-50 border border-sika-100 text-sika-700 text-xs font-bold flex items-center justify-center">{{ strtoupper(substr($p->user->nom, 0, 1)) }}</span>
                  <span class="font-medium text-slate-800">{{ $p->user->nom }}</span>
                </div>
              </td>
              <td class="px-5 py-3.5">
                <span class="inline-flex items-center gap-1.5 text-xs uppercase font-semibold text-slate-600">
                  <span class="w-6 h-6 rounded-md bg-night-900 text-white text-[9px] font-black flex items-center justify-center">K</span>
                  {{ $p->passerelle }}
                </span>
              </td>
              <td class="px-5 py-3.5 text-slate-500">{{ $p->mode }}</td>
              <td class="px-5 py-3.5 text-right font-semibold text-night-900 whitespace-nowrap">{{ number_format($p->montant,0,',',' ') }} FCFA</td>
              <td class="px-5 py-3.5">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold {{ $map[$p->statut] ?? 'bg-slate-100 text-slate-600' }}">{{ $p->statut }}</span>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="p-12 text-center text-slate-400">Aucun paiement enregistré.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
  <div class="mt-5">{{ $paiements->links() }}</div>
</section>
@endsection
