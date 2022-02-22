<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{

  use SoftDeletes;
  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function address()
  {
    return $this->hasOne('App\Address');
  }

  public function sponsor()
  {
    return $this->belongsToMany('App\Sponsor', 'sponsor_apartment')->withTimestamps();;
  }

  public function services()
  {
    return $this->belongsToMany('App\Service','service_apartment')->withTimestamps();
  }

  public function visits()
  {
    return $this->hasMany('App\Visit');
  }

  public function messages()
  {
    return $this->hasMany('App\Message')->withTimestamps();
  }

  protected $fillable =  [
    "title", "description", "cover_img", "price_day", "n_rooms", "n_baths", "n_beds", "square_meters", "visible", "shared"
  ];
}
