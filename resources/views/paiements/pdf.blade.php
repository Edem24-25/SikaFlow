<!DOCTYPE html><html><head><meta charset="utf-8"><title>Relevé de paiements</title>
<style>body{font-family:DejaVu Sans;font-size:11px} h1{color:#106847} table{width:100%;border-collapse:collapse} th,td{border:1px solid #ddd;padding:6px}</style></head><body>
<h1>SikaFlow — Relevé de paiements</h1>
<table><thead><tr><th>Date</th><th>Référence</th><th>Passerelle</th><th>Mode</th><th>Montant</th><th>Statut</th></tr></thead><tbody>
@foreach($paiements as $p)<tr><td>{{ $p->paid_at?->format('d/m/Y H:i') }}</td><td>{{ $p->reference_transaction }}</td><td>{{ $p->passerelle }}</td><td>{{ $p->mode }}</td><td>{{ number_format($p->montant,0,',',' ') }} FCFA</td><td>{{ $p->statut }}</td></tr>@endforeach
</tbody></table></body></html>
