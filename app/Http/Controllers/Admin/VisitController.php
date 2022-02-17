<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use App\Visit;

class VisitController extends Controller
{
    public function show(Apartment $apartment){
        $visits = Visit::where('apartment_id', $apartment->id);
        return view('admin.visits.show', ['visits'=>$visits, 'apartment'=>$apartment]);
    }
}
