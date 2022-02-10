<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
  public function user() {
    return $this->belongsTo('App\User');
  }

  public function address() {
    return $this->hasOne('App\Address');
  }

  public function sponsor() {
    return $this->belongsToMany('App\Sponsor');
  }

}
