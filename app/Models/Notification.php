<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','type','titre','message','lu_at','payload'];

    protected $casts = ['payload' => 'array', 'lu_at' => 'datetime'];

    public function user() { return $this->belongsTo(User::class); }

}
