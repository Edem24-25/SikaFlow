@extends('layouts.app')
@section('title', 'Prêt ' . $pret->reference . ' — SikaFlow')
@section('content')
<section class="max-w-7xl mx-auto px-4 py-8 sm:py-12">
  {{-- Header --}}
  <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start gap-4 mb-8 reveal">
    <div>
      <div class="flex items-center gap-2 text-slate-400 text-xs uppercase tracking-widest mb-2">
        <i class="fa-solid fa-file-invoice-dollar text-sika-500"></i> Prêt
      </div>
      <h1 class="text-3xl font-bold text-night-900 tracking-tight flex items-center gap-3 flex-wrap">
        {{ $pret->reference }}
        @php
          $badges = ['actif'=>'badge-green','en_cours'=>'badge-green','termine'=>'badge-slate','suspendu'=>'badge-amber','en_retard'=>'badge-red'];
        @endphp
        <span class="{{ $badges[$pret->statut] ?? 'badge-slate' }} text-xs">{{ str_replace('_',' ',$pret->statut) }}</span>
      </h1>
      <p class="text-slate-500 mt-1 flex items-center gap-2">
        <span class="w-6 h-6 rounded-md overflow-hidden inline-flex"><x-company-logo :name="$pret->creancier->nom" class="w-full h-full object-cover" /></span>
        {{ $pret->creancier->nom }} · {{ ucfirst($pret->creancier->type) }}
      </p>
    </div>
    <div class="flex flex-wrap gap-2.5">
      <a href="{{ route('prets.pdf', $pret) }}" class="btn-outline !py-2.5 !px-4 text-sm">
        <i class="fa-solid fa-file-pdf text-rose-500"></i> PDF
      </a>
      <a href="{{ route('prets.edit', $pret) }}" class="btn-ghost !py-2.5 !px-4 text-sm border border-slate-200">
        <i class="fa-solid fa-pen"></i> Modifier
      </a>
      <form method="POST" action="{{ route('prets.destroy', $pret) }}" onsubmit="return confirm('Supprimer ce prêt ?')">
        @csrf @method('DELETE')
        <button class="btn-danger !py-2.5 !px-4 text-sm">
          <i class="fa-solid fa-trash-can"></i> Supprimer
        </button>
      </form>
    </div>
  </div>

  {{-- Key figures --}}
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    @foreach([
      ['Montant', number_format($pret->montant_principal,0,',',' ') . ' FCFA', 'fa-coins', 'from-sika-500 to-sika-700'],
      ['Taux d\'intérêt', $pret->taux_interet . ' %', 'fa-percent', 'from-gold-400 to-gold-500'],
      ['Durée', $pret->duree_mois . ' mois', 'fa-clock', 'from-indigo-500 to-indigo-700'],
      ['Prélèvement auto', $pret->prelevement_auto ? 'Activé' : 'Désactivé', 'fa-rotate', $pret->prelevement_auto ? 'from-emerald-500 to-emerald-700' : 'from-slate-400 to-slate-600'],
    ] as $i => $kpi)
      <div class="group relative p-5 rounded-3xl bg-white border border-slate-100 shadow-card card-hover reveal reveal-delay-{{ $i + 1 }} overflow-hidden">
        <div class="absolute -top-8 -right-8 w-20 h-20 bg-gradient-to-br {{ $kpi[3] }} opacity-10 rounded-full blur-xl group-hover:scale-150 group-hover:opacity-20 transition-all duration-700"></div>
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br {{ $kpi[3] }} text-white flex items-center justify-center mb-3 shadow-soft">
          <i class="fa-solid {{ $kpi[2] }}"></i>
        </div>
        <div class="text-xs text-slate-400">{{ $kpi[0] }}</div>
        <div class="font-bold text-lg text-night-900 mt-0.5">{{ $kpi[1] }}</div>
      </div>
    @endforeach
  </div>

  {{-- Échéancier --}}
  <div class="card overflow-hidden reveal">
    <div class="p-5 sm:p-6 border-b border-slate-100 bg-gradient-to-r from-slate-50/80 to-transparent flex items-center gap-3">
      <div class="w-9 h-9 rounded-xl bg-sika-100 text-sika-600 flex items-center justify-center">
        <i class="fa-solid fa-calendar-days"></i>
      </div>
      <div>
        <h2 class="font-semibold text-night-900">Échéancier</h2>
        <p class="text-xs text-slate-400">{{ $pret->echeances->count() }} échéances générées automatiquement</p>
      </div>
    </div>
    <div class="table-wrap">
      <table class="table-base">
        <thead class="table-head">
          <tr>
            <th>#</th>
            <th>Date</th>
            <th>Montant</th>
            <th>Statut</th>
            <th class="text-right">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($pret->echeances as $e)
            <tr>
              <td class="font-bold text-slate-700">{{ $e->numero }}</td>
              <td class="text-slate-600">{{ $e->date_echeance->format('d/m/Y') }}</td>
              <td class="font-semibold text-slate-800">{{ number_format($e->montant,0,',',' ') }} FCFA</td>
              <td>
                @php $c = ['payee'=>'badge-green','a_venir'=>'badge-slate','en_retard'=>'badge-red']; @endphp
                <span class="{{ $c[$e->statut] ?? 'badge-slate' }}">{{ str_replace('_',' ',$e->statut) }}</span>
              </td>
              <td class="text-right">
                @if($e->statut !== 'payee')
                  @if(auth()->user()->moyensPaiement->isEmpty())
                    <a href="{{ route('moyens.create') }}" class="text-xs px-3 py-2 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition-colors inline-flex items-center gap-1.5">
                      <i class="fa-solid fa-plus text-[10px]"></i> Ajouter un moyen de paiement
                    </a>
                  @else
                    <form method="POST" action="{{ route('echeances.pay', $e) }}" class="inline-flex items-center gap-2">
                      @csrf
                      <select name="moyen_paiement_id" class="text-xs rounded-lg border-slate-200 border px-2.5 py-2 focus:ring-sika-500/30 focus:border-sika-400 bg-white text-slate-600" required>
                        <option value="">Choisir...</option>
                        @foreach(auth()->user()->moyensPaiement as $m)
                          <option value="{{ $m->id }}">{{ $m->operateur }} · {{ $m->numero }}</option>
                        @endforeach
                      </select>
                      <button type="submit" class="text-xs px-3.5 py-2 rounded-lg bg-sika-600 text-white hover:bg-sika-500 transition-colors inline-flex items-center gap-1.5 font-semibold">
                        <i class="fa-solid fa-credit-card text-[10px]"></i> Payer
                      </button>
                    </form>
                  @endif
                @else
                  <span class="text-xs text-slate-400 inline-flex items-center gap-1"><i class="fa-solid fa-circle-check text-sika-500"></i> Payée</span>
                @endif
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-5 flex items-center gap-2 text-xs text-slate-400 justify-center">
    <svg class="w-4 h-4 text-sika-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
    Paiements sécurisés par <span class="font-semibold text-slate-500">Kkiapay</span>
  </div>
</section>
@endsection
