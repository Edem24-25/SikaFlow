<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Creancier extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'type', 'telephone', 'email', 'adresse'];

    public function prets() { return $this->hasMany(Pret::class); }

}
