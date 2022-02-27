<?php

namespace App\Http\Controllers\Guest;

use App\Address;
use App\Apartment;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Support\Facades\Session;
use App\Visit;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*      $apartments = Apartment::limit(10)->with('services', 'address')->get();

        return view('guests.home', compact('apartments')); */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {

        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'description' => 'required|min:10',
        ]);

        $newMessage = new Message();
        $newMessage->email_sender = $request->email;
        $newMessage->content = $request->description;
        $newMessage->apartment_id = $apartment->id;
        $newMessage->save();

        Session::flash('message', 'Message sent correctly');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment, Request $request)




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


        $appartamento_id = $apartment->id;
        $ipClient = $request->getClientIp();
        $nowDate = Carbon::now('Europe/Rome');
        $lastVisitClient = Visit::where('apartment_id', $appartamento_id)->where('ip_address', $ipClient)->orderBy('created_at', 'desc')->first();
        if ($lastVisitClient == null) {
            createVisit($ipClient, $appartamento_id);
        } else {
            $dataTimeClient = date_format(Carbon::parse($lastVisitClient->attributesToArray()['created_at'], 'Europe/Rome'), 'Y-m-d H:i:s');
            $diff_in_minutes = Carbon::createFromDate($dataTimeClient)->diffInMinutes(Carbon::createFromDate($nowDate));
            if ($diff_in_minutes > 30) {
                createVisit($ipClient, $appartamento_id);
            }
        }






        $address = Address::where('apartment_id', $apartment->id)->get(['latitude', 'longitude']);
        /* $messages = Message::orderBy('created_at', 'desc')->where('apartment_id', $apartment->id)->get(); */

        return view('guests.apartments.show', ['apartment' => $apartment, 'address' => $address/* , 'messages' => $messages */]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
