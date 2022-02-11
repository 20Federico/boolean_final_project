<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
  public function apartment() {
    return $this->belongsTo('App\Apartment');
  }
}
