<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
  protected $fillable = [
    'price_euro',
    'duration_hours'
  ];

  public function apartment() {

    return $this->belongsToMany('App\Apartment', 'sponsor_apartment');

  }
  
  public $timestamps = false;
}
