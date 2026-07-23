<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MoyenPaiement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'operateur', 'numero', 'titulaire', 'is_default'];

    protected $casts = ['is_default' => 'boolean'];

    public function user() { return $this->belongsTo(User::class); }
    public function paiements() { return $this->hasMany(Paiement::class); }

}
