<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
  public function apartment() {
    return $this->belongsToMany('App\Apartment');
  }
}
