<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Apartment;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function show($id)
    {

        $appartamento_id = $id;
        $apartment = Apartment::find($appartamento_id);

        //PASSO I DATI DI VISITE E MESSAGGI

        $visits = DB::select('SELECT count(id), MONTHNAME(created_at) from `visits` WHERE apartment_id = :id AND YEAR(CURRENT_DATE()) = YEAR(created_at) group by MONTHNAME(created_at)', ['id' => $appartamento_id]);
        $messages = DB::select('SELECT count(id), MONTHNAME(created_at) from `messages` WHERE apartment_id = :id AND YEAR(CURRENT_DATE()) = YEAR(created_at) group by MONTHNAME(created_at)', ['id' => $appartamento_id]);

        return view('admin.visits.show', ['visits' => $visits, 'apartment' => $apartment, 'messages' => $messages]);
    }
}
