<?php

namespace App\Http\Controllers\Admin;

use App\Apartment;
use App\Http\Controllers\Controller;
use App\Sponsor;
use Illuminate\Http\Request;
use Braintree;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Apartment $apartment)
    {

      if($apartment->user_id != Auth::id()){
        return abort(401);
      }

      $sponsorList = Sponsor::all();
      $clientToken = $this->gateway()->clientToken()->generate();

      // return view('admin.sponsor.index', [
      //     "apartment" => $apartment,
      //     "sponsorList" => $sponsorList,
      //     "clientToken" => $clientToken
      // ]);
      Session::flash('message', 'La sponsorizzazione dell\'alloggio è ancora attiva');
      return view('admin.sponsor.index', compact('apartment', 'sponsorList', 'clientToken' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Apartment $apartment)
    {
      // Get data from payment form
      $data = $request->all();

      // Error message if no sponsorship has been selected 
      $sponsorshipError = 'Nessuna sponsorship selezionata.';
      if(empty($data['amount'])){
        return redirect()->back()->with('sponsorshipError', $sponsorshipError);
      }

      // Get apartment info
      $apartment_id = $apartment->id;
      
      // Get Sponsor info
      $sponsor_id = $data['amount'];
      $sponsor = Sponsor::where('id', $sponsor_id)->first();
      $sponsor_duration = $sponsor->duration_hours;
      $sponsor_price = $sponsor->price_euro;


      // Config Transaction
      $result = $this->gateway()->transaction()->sale([
        'amount' => $sponsor_price,
        'paymentMethodNonce' => $data['payment_method_nonce'],
        'options' => [
            'submitForSettlement' => true
        ]
      ]);

      // Check on Transiction
      if ($result->success || !is_null($result->transaction)) {
        $transaction = $result->transaction;
        
        // Get DeadLine
        $deadline = Carbon::now()->addHours($sponsor_duration);

        // Get Transaction id
        $transId = $transaction->id; 
        
        // Popolate Pivot sponsor_apartment Table
        $newPlace = new Apartment();    
        $newPlace->sponsor()->attach($apartment_id,
                                    [
                                    'expiry'=> $deadline,
                                    'transaction_id'=> $transId,
                                    'apartment_id' => $apartment_id,
                                    'sponsor_id' => $sponsor_id
                                    ]);

      } else {
        abort(404);
      }
    
      // return redirect()->route('user.myplace.index')->with('transId',$transId)->with('placeBuy',$place->title);
      Session::flash('message', 'Transaction Approved');
      return redirect()->route('admin.apartments.index');

    }

    private function gateway(){
      $gateway = new Braintree\gateway ([
        'environment' => getenv('BT_ENVIRONMENT'),
        'merchantId' => getenv('BT_MERCHANT_ID'),
        'publicKey' => getenv('BT_PUBLIC_KEY'),
        'privateKey' => getenv('BT_PRIVATE_KEY')
        ]);
      return $gateway;
    }
}
