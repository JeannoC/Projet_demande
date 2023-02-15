<?php

namespace App\Models;

use App\Models\Demandeur;
use App\Models\PreValidation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
  use HasFactory;

  public function demandeur()
  {
    return $this->belongsTo(Demandeur::class);
  }
}
