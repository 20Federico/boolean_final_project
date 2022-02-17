<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{

  use SoftDeletes;
  public function apartment() {
    return $this->belongsTo("App\Apartment");
  }
}
