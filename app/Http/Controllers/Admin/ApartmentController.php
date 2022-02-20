<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Http\Controllers\Controller;
use App\Apartment;
use App\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use App\Service;
use App\Sponsor;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartmentsList = Apartment::where('user_id', Auth::user()->id)->get();
        return view('admin.apartments.index', compact('apartmentsList'));
    }


    public function show(Apartment $apartment)
    {

      if($apartment->user_id != Auth::id()){
          return abort(401);
      }

      $address = Address::where('apartment_id', $apartment->id)->get(['latitude', 'longitude']);
      $messages = Message::orderBy('created_at', 'desc')->where('apartment_id', $apartment->id)->get();
      
      return view('admin.apartments.show', ['apartment'=> $apartment, 'address'=>$address, 'messages'=>$messages]);
    }

    public function create()
    {

        $services = Service::all();
        return view('admin.apartments.create', compact('services'));
    }

    public function store(Request $request)
    {



        $request->validate([
            'title' => 'required|min:8',
            'street_name' => 'required',
            'street_number' => 'required|numeric',
            'zip_code' => 'required|numeric',
            'city' => 'required',
            'country' => 'required|min:3',
            'description' => 'required|min:20',
            'price_day' => 'required|numeric|min:0',
            'n_rooms' => 'required|numeric|min:0',
            'n_baths' => 'required|numeric|min:0',
            'n_beds' => 'required|numeric|min:0',
            'square_meters' => 'required|numeric|min:0',
            'shared' => 'required',
            'visible' => 'required'
        ]);

        $address = $request->street_name . " " .
            $request->street_number . " " .
            $request->city . " " .
            $request->country . " " .
            $request->zip_code;

        //Cerco indirizzo con api/totom
        $response = Http::get('https://api.tomtom.com/search/2/search/' . $address .
            '.json?minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo');


        //Dalla risposta prendo il primo indirizzo nei risultati e assegno latitudine e longitudine
        $lat = $response->json()['results'][0]['position']['lat'];
        $lon = $response->json()['results'][0]['position']['lon'];


        $apartment = new Apartment();
        $apartment->user_id = Auth::user()->id;
        $apartment->title  = $request->title;
        $apartment->description  = $request->description;
        $apartment->price_day  = $request->price_day;
        $apartment->n_rooms  = $request->n_rooms;
        $apartment->n_baths  = $request->n_baths;
        $apartment->n_beds  = $request->n_beds;
        $apartment->square_meters  = $request->square_meters;
        $apartment->visible  = $request->visible;
        $apartment->shared  = $request->shared;
        if ($request->file('cover_img')) {
            $apartment->cover_img = Storage::put('apartments', $request->cover_img);
        }
        $apartment->save();

        $address = new Address();
        $address->street_name = $request->street_name;
        $address->street_number = $request->street_number;
        $address->city = $request->city;
        $address->country = $request->country;
        $address->zip_code = $request->zip_code;
        $address->latitude = $lat;
        $address->longitude = $lon;

        $apartment->address()->save($address);


        if (!empty($request->all()['services'])) {
            $apartment->services()->sync($request->all()['services']);
        }


        Session::flash('message', 'New Apartment has been added successfully.');
        return redirect()->route('admin.apartments.index');
    }

    public function edit(Apartment $apartment)

    {

        if($apartment->user_id != Auth::id()){
            return abort(401);
        }


        $services = Service::all();
        return view("admin.apartments.edit", [
            "apartment" => $apartment,
            "services" => $services
        ]);
    }

    public function update(Request $request, Apartment $apartment)
    {

        $request->validate([
            'title' => 'required|min:8',
            'street_name' => 'required',
            'street_number' => 'required',
            'zip_code' => 'required|numeric',
            'city' => 'required',
            'country' => 'required|min:3',
            'description' => 'required|min:20',
            'price_day' => 'required|numeric|min:0',
            'n_rooms' => 'required|numeric|min:0',
            'n_baths' => 'required|numeric|min:0',
            'n_beds' => 'required|numeric|min:0',
            'square_meters' => 'required|numeric|min:0',
            'shared' => 'required',
            'visible' => 'required',
        ]);

        $oldImg = $apartment->cover_img;
        $apartment->title  = $request->title;
        $apartment->description  = $request->description;
        $apartment->price_day  = $request->price_day;
        $apartment->n_rooms  = $request->n_rooms;
        $apartment->n_baths  = $request->n_baths;
        $apartment->n_beds  = $request->n_beds;
        $apartment->square_meters  = $request->square_meters;
        $apartment->visible  = $request->visible;
        $apartment->shared  = $request->shared;


        if ($request->file('cover_img')) {
            if ($oldImg) {
                Storage::delete($oldImg);
            }
            $apartment->cover_img = $request->file('cover_img')->store('apartments');
        }


        //Creo la riga con indirizzo
        $address = $request->street_name . " " .
            $request->street_number . " " .
            $request->street_number . " " .
            $request->city . " " .
            $request->country . " " .
            $request->zip_code;

        //Cerco indirizzo con api/totom

        $response = Http::get('https://api.tomtom.com/search/2/search/' . $address .
            '.json?minFuzzyLevel=1&maxFuzzyLevel=2&view=Unified&relatedPois=off&key=hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo');


        //Dalla risposta prendo il primo indirizzo nei risultati e assegno latitudine e longitudine
        $lat = $response->json()['results'][0]['position']['lat'];
        $lon = $response->json()['results'][0]['position']['lon'];

        $apartment->address->street_name = $request->street_name;
        $apartment->address->street_number = $request->street_number;
        $apartment->address->city = $request->city;
        $apartment->address->country = $request->country;
        $apartment->address->zip_code = $request->zip_code;
        $apartment->address->latitude = $lat;
        $apartment->address->longitude = $lon;

        $apartment->push();

        if (!empty($request->all()['services'])) {
            $apartment->services()->sync($request->all()['services']);
        } else {
          $apartment->services()->detach();
        }
        Session::flash('message', 'Apartment has been updated');
        return redirect()->route("admin.apartments.show", $apartment->id);
    }

    public function destroy($id)
    {
        $apartment = Apartment::findOrFail($id);
        if ($apartment->cover_img) {
            Storage::delete($apartment->cover_img);
        }


        // if(!empty( $apartment->services())){
        //     $apartment->services()->detach();
        // }

        // if($apartment->messages()){
        //     $apartment->messages()->delete();
        // }


        $apartment->address()->delete();
        $apartment->delete();


        
        Session::flash('message', 'Apartment with title "' . $apartment->title  . '" has been deleted');
        return redirect()->route('admin.apartments.index');
    }

    
}
