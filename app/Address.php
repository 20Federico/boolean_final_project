<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Apartment;

class Address extends Model
{
  public function apartment() {
    return $this->belongsTo("App\Apartment");
  }
}
