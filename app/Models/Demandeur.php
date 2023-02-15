<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Demandeur extends Model
{
  use HasFactory;

  public function documentDemandeurs()
  {
    return $this->hasMany(DocumentDemandeur::class);
  } 

  public function demandes()
  {
    return $this->hasMany(Demande::class);
  } 
  
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  
}
