<?php

namespace App\Http\Controllers\Guest;

use App\Address;
use App\Apartment;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $newMessage = new Message();
        $newMessage->email_sender = $request->email;
        $newMessage->content = $request->description;
        $newMessage->apartment_id = $apartment->id;
        $newMessage->save();
        return redirect()->route('guests.home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Apartment $apartment)
    {
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
