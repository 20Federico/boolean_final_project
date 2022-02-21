<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Apartment;
use App\Message;
use App\Visit;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function show(Apartment $apartment, $id)
    {
        //CREO LA VISITA (DA SPOSTARE NEL VISITCONTROLLER PUBBLICO)
        function createVisit($ip, $appId)
        {
            $visit = new Visit();
            $visit->n_visits = 1;
            $visit->ip_address = $ip;
            $visit->apartment_id = $appId;
            $visit->save();
        }

        $appartamento_id = $id;
        
        $ipClient = Request::ip();
        $nowDate = Carbon::now('Europe/Rome');
        $lastVisitClient = Visit::where('apartment_id', $appartamento_id)->where('ip_address', $ipClient)->orderBy('created_at', 'desc')->first();
        if ($lastVisitClient == null) {
            createVisit($ipClient, $appartamento_id);
        } else {
            $dataTimeClient = date_format(Carbon::parse($lastVisitClient->attributesToArray()['created_at'],'Europe/Rome'), 'Y-m-d H:i:s');
            $diff_in_minutes = Carbon::createFromDate($dataTimeClient)->diffInMinutes(Carbon::createFromDate($nowDate));
            if($diff_in_minutes > 30){
                createVisit($ipClient, $appartamento_id);
            }
        }

        //PASSO I DATI DI VISITE E MESSAGGI
       
        $visits = DB::select('SELECT count(id), MONTHNAME(created_at) from `visits` WHERE apartment_id = :id AND YEAR(CURRENT_DATE()) = YEAR(created_at) group by MONTHNAME(created_at)', ['id' => $appartamento_id]);
        $messages = DB::select('SELECT count(id), MONTHNAME(created_at) from `messages` WHERE apartment_id = :id AND YEAR(CURRENT_DATE()) = YEAR(created_at) group by MONTHNAME(created_at)', ['id' => $appartamento_id]);
      
        return view('admin.visits.show', ['visits' => $visits, 'apartment' => $apartment, 'messages' => $messages]);
    }
}
