<?php

use App\Apartment;
use App\Http\Controllers\Admin\ApartmentController;
use App\Sponsor;
use App\SponsorApartment;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Route::get('/', function () {
  return view('welcome');
})->name('home'); */

// Route::get('/home', 'HomeController@index')->name("admin.home");

Route::namespace("Admin")
  ->prefix("admin")
  ->name("admin.")
  ->middleware("auth")
  ->group(function () {

    Route::resource("apartments", "ApartmentController");
    Route::resource("visits", "VisitController");
    Route::resource("messages", "MessageController");
    Route::get('{apartment}/sponsors', 'SponsorController@index')->name('sponsors.index');
    Route::post('{apartment}/sponsors', 'SponsorController@store')->name('sponsors.store');
  });

Auth::routes();

/* Route::get("{any?}", function () {
  return view("guests.home");
})->where("any", ".*");  */

Route::resource("apartments", "Guest\ApartmentController")->except(["store"]);
Route::post("{apartment}/apartments", "Guest\ApartmentController@store")->name("apartments.store");

Route::get('/', function () {

  $apartments = Apartment::limit(10)->with('services', 'address', 'sponsor')->get();
  $sponsored = SponsorApartment::whereDate('expiry', '>', Carbon::now())->orderBy("created_at", "DESC")->get("apartment_id");
  $pluto = [];

  foreach ($sponsored as $value) {
    $apartment = Apartment::where("id", $value->apartment_id)->get();
    array_push($pluto, $apartment);
  }

  /*   $apartmentsSponsored = Apartment::with('services', 'address', 'sponsor')->where('sponsor' <> [])->get(); */

  return view('guests.home', ['apartments' => $apartments, 'pluto' => $pluto]);
})->name('guests.home');
