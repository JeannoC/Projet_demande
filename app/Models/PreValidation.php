<?php

namespace App\Models;

use App\Models\User;
use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreValidation extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'demande_id'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function demande()
    {
      return $this->belongsTo(Demande::class);
    }
}
