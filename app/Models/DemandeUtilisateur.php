<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DemandeUtilisateur extends Model
{
    use HasFactory;

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
