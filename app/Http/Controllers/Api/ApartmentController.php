<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Service;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index(){


        $apartments = Apartment::with('services','address','sponsor')->where('visible', 1)->get();
        $services = Service::all();


        return compact('services','apartments');
    }
}
