<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SponsorApartment extends Model
{
  use SoftDeletes;
  protected $table = "sponsor_apartment";
}
