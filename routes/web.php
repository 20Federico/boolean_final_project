<?php

use App\Http\Controllers\Admin\ApartmentController;
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

Route::get('/', function () {
  return view('welcome');
})->name('home');

Route::get('/home', 'HomeController@index')->name("admin.home");

Route::namespace("Admin")
  ->prefix("admin")
  ->name("admin.")
  ->middleware("auth")
  ->group(function () {

    Route::resource("apartments", "ApartmentController");
    Route::resource("visits", "VisitController");
    Route::resource("messages", "MessageController");
    Route::resource("sponsors", "SponsorController");
  });

Auth::routes();
