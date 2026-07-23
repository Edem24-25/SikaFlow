<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Echeance extends Model
{
    use HasFactory;

    protected $fillable = ['pret_id','numero','date_echeance','montant','statut','paiement_id'];

    protected $casts = ['date_echeance' => 'date', 'montant' => 'decimal:2'];

    public function pret() { return $this->belongsTo(Pret::class); }
    public function paiement() { return $this->belongsTo(Paiement::class); }

}
