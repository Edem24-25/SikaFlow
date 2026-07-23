<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Abonnement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','libelle','fournisseur','montant','periodicite','prochaine_echeance','statut','prelevement_auto','moyen_paiement_id'];

    protected $casts = ['prochaine_echeance' => 'date', 'prelevement_auto' => 'boolean', 'montant' => 'decimal:2'];

    public function user() { return $this->belongsTo(User::class); }
    public function moyenPaiement() { return $this->belongsTo(MoyenPaiement::class); }
    public function paiements() { return $this->hasMany(Paiement::class); }

}
