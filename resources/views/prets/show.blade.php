@extends('layouts.app')
@section('title', 'Prêt ' . $pret->reference . ' — SikaFlow')
@section('content')
<section class="max-w-6xl mx-auto px-4 py-10">
  <div class="flex justify-between items-start mb-6">
    <div>
      <div class="text-xs uppercase text-slate-400">Prêt</div>
      <h1 class="text-3xl font-bold">{{ $pret->reference }}</h1>
      <p class="text-slate-500">{{ $pret->creancier->nom }} · {{ ucfirst($pret->creancier->type) }}</p>
    </div>
    <div class="flex gap-2">
      <a href="{{ route('prets.pdf', $pret) }}" class="px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 text-sm">📄 PDF</a>
      <a href="{{ route('prets.edit', $pret) }}" class="px-4 py-2 rounded-lg border border-slate-200 hover:bg-slate-50 text-sm">Modifier</a>
      <form method="POST" action="{{ route('prets.destroy', $pret) }}" onsubmit="return confirm('Supprimer ce prêt ?')">
        @csrf @method('DELETE')
        <button class="px-4 py-2 rounded-lg text-sm text-rose-700 border border-rose-200 hover:bg-rose-50">Supprimer</button>
      </form>
    </div>
  </div>

  <div class="grid md:grid-cols-4 gap-4 mb-8">
    <div class="p-4 rounded-xl bg-white border border-slate-100"><div class="text-xs text-slate-400">Montant</div><div class="font-bold text-lg">{{ number_format($pret->montant_principal,0,',',' ') }} FCFA</div></div>
    <div class="p-4 rounded-xl bg-white border border-slate-100"><div class="text-xs text-slate-400">Taux</div><div class="font-bold text-lg">{{ $pret->taux_interet }} %</div></div>
    <div class="p-4 rounded-xl bg-white border border-slate-100"><div class="text-xs text-slate-400">Durée</div><div class="font-bold text-lg">{{ $pret->duree_mois }} mois</div></div>
    <div class="p-4 rounded-xl bg-white border border-slate-100"><div class="text-xs text-slate-400">Auto</div><div class="font-bold text-lg">{{ $pret->prelevement_auto ? 'Oui' : 'Non' }}</div></div>
  </div>

  <div class="bg-white rounded-2xl border border-slate-100 shadow-soft overflow-hidden">
    <div class="p-5 border-b border-slate-100"><h2 class="font-semibold text-lg">Échéancier</h2></div>
    <table class="w-full text-sm">
      <thead class="bg-slate-50 text-slate-500 text-xs uppercase">
        <tr><th class="text-left px-4 py-3">#</th><th class="text-left px-4 py-3">Date</th><th class="text-left px-4 py-3">Montant</th><th class="text-left px-4 py-3">Statut</th><th></th></tr>
      </thead>
      <tbody class="divide-y divide-slate-100">
        @foreach($pret->echeances as $e)
          <tr>
            <td class="px-4 py-3 font-medium">{{ $e->numero }}</td>
            <td class="px-4 py-3">{{ $e->date_echeance->format('d/m/Y') }}</td>
            <td class="px-4 py-3">{{ number_format($e->montant,0,',',' ') }} FCFA</td>
            <td class="px-4 py-3">
              @php $c = ['payee'=>'bg-sika-100 text-sika-700','a_venir'=>'bg-slate-100 text-slate-600','en_retard'=>'bg-rose-100 text-rose-700']; @endphp
              <span class="px-2 py-0.5 rounded-full text-xs {{ $c[$e->statut] ?? 'bg-slate-100' }}">{{ str_replace('_',' ',$e->statut) }}</span>
            </td>
            <td class="px-4 py-3 text-right">
              @if($e->statut !== 'payee')
                <form method="POST" action="{{ route('echeances.pay', $e) }}" class="inline-flex gap-2">
                  @csrf
                  <select name="moyen_paiement_id" class="text-xs rounded border-slate-200 border px-2 py-1" required>
                    @foreach(auth()->user()->moyensPaiement as $m)
                      <option value="{{ $m->id }}">{{ $m->operateur }} · {{ $m->numero }}</option>
                    @endforeach
                  </select>
                  <button class="text-xs px-3 py-1 rounded bg-sika-600 text-white hover:bg-sika-700">Payer</button>
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</section>
@endsection
