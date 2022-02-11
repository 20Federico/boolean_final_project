<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ApartmentController extends Controller
{
    public function index()
    {
        $apartmentsList = Apartment::where('user_id', Auth::user()->id)->get();
        return view('admin.apartments.index', compact($apartmentsList));
    }


    public function show(Apartment $apartment)
    {
        return view('admin.apartments.show', compact('apartment'));
    }

    public function create()
    {
        return view('admin.apartments.create');
    }

    public function store(Request $request)
    {
        // $data = $request->all();
        // $apartment = new Apartment();
        // $apartment->fill($data);
        // $apartment->save();


        // $address = new Address();
        // $address->fill($data);
        // $apartment->address()->save($address);

        $apartment = new Apartment();
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
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;

        $apartment->address()->save($address);
        Session::flash('message', 'New Apartment has been added successfully.');
        return redirect()->route('admin.apartments.index');
    }

    public function update(Request $request, Apartment $apartment)
    {
        // $data = $request->all();
        // $apartment->fill($data);
        // $apartment->address()->fill($data);
        // $apartment->save();

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


        $apartment->address->street_name = $request->street_name;
        $apartment->address->street_number = $request->street_number;
        $apartment->address->city = $request->city;
        $apartment->address->country = $request->country;
        $apartment->address->zip_code = $request->zip_code;
        $apartment->address->latitude = $request->latitude;
        $apartment->address->longitude = $request->longitude;

        $apartment->push();

        Session::flash('message', 'Apartment has been updated successfully.');

        return redirect()->route("admin.apartments.show", $apartment->id);
    }

    public function destroy($id)
    {
        Apartment::destroy($id);
        Session::flash('message', 'Apartment has been deleted');
        return redirect('admin.apartments.home');
    }
}
