<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','echeance_id','abonnement_id','moyen_paiement_id','reference_transaction','passerelle','montant','statut','mode','payload','paid_at'];

    protected $casts = ['payload' => 'array', 'paid_at' => 'datetime', 'montant' => 'decimal:2'];

    public function user() { return $this->belongsTo(User::class); }
    public function echeance() { return $this->belongsTo(Echeance::class); }
    public function abonnement() { return $this->belongsTo(Abonnement::class); }
    public function moyenPaiement() { return $this->belongsTo(MoyenPaiement::class); }

}
