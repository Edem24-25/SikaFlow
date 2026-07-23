<!DOCTYPE html>
<html><head><meta charset="utf-8"><title>Échéancier {{ $pret->reference }}</title>
<style>body{font-family:DejaVu Sans;font-size:11px;color:#111} h1{color:#106847} table{width:100%;border-collapse:collapse;margin-top:12px} th,td{border:1px solid #ddd;padding:6px;text-align:left} th{background:#f4f7f5}</style>
</head><body>
<h1>SikaFlow — Échéancier du prêt {{ $pret->reference }}</h1>
<p><strong>Utilisateur :</strong> {{ $pret->user->nom }} — {{ $pret->user->telephone }}<br>
<strong>Créancier :</strong> {{ $pret->creancier->nom }}<br>
<strong>Montant :</strong> {{ number_format($pret->montant_principal,0,',',' ') }} FCFA — <strong>Taux :</strong> {{ $pret->taux_interet }}% — <strong>Durée :</strong> {{ $pret->duree_mois }} mois</p>
<table>
  <thead><tr><th>N°</th><th>Date</th><th>Montant</th><th>Statut</th></tr></thead>
  <tbody>
    @foreach($pret->echeances as $e)
      <tr><td>{{ $e->numero }}</td><td>{{ $e->date_echeance->format('d/m/Y') }}</td><td>{{ number_format($e->montant,0,',',' ') }} FCFA</td><td>{{ $e->statut }}</td></tr>
    @endforeach
  </tbody>
</table>
<p style="margin-top:20px;font-size:9px;color:#666">Document généré le {{ now()->format('d/m/Y H:i') }} — SikaFlow / HODD GLOBAL</p>
</body></html>
