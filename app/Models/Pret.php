<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pret extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','creancier_id','reference','montant_principal','taux_interet','duree_mois','periodicite','date_debut','statut','prelevement_auto','moyen_paiement_id'];

    protected $casts = [
        'date_debut' => 'date',
        'prelevement_auto' => 'boolean',
        'montant_principal' => 'decimal:2',
        'taux_interet' => 'decimal:2',
    ];

    public function user() { return $this->belongsTo(User::class); }
    public function creancier() { return $this->belongsTo(Creancier::class); }
    public function moyenPaiement() { return $this->belongsTo(MoyenPaiement::class); }
    public function echeances() { return $this->hasMany(Echeance::class)->orderBy('date_echeance'); }

}
