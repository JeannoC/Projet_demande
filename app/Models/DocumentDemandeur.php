<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Demandeur;

class DocumentDemandeur extends Model
{
    use HasFactory;

    public function demandeurs()
    {
      return $this->hasMany(Demandeur::class);
    }
}
