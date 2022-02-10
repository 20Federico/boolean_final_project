<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
  public function apartment() {
    return $this->belongsToMany('App\Apartment');
  }
}
