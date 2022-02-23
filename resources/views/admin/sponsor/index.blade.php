@extends('layouts.admin')

@section('title', 'Sponsors')

@section('content')
<div class="container">
      <div class="mb-4 my-3">
          <h1>Metti in evidenza il tuo annuncio - {{$apartment->title}}</h1>
          <p class="fs-4">
            Sponsorizza il tuo appartamento per farlo comparire in alto nelle ricerce. Avrai molte più possibilità di affittarlo!
          </p>
      </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
              
                <div class="card mb-3">
                    <div class="card-header">Sponsors</div>
    
                    <div class="card-body">
                        
                      <form id="payment-form" action="{{route('admin.sponsors.store', $apartment->id)}}" method="post">
                        @csrf
                        @method("POST")
                        
                        {{-- Error message for empty sponsorship field --}}
                        @if (session('sponsorshipError'))
                        <div class="alert alert-danger">
                            <p>{{ session('sponsorshipError') }}</p>
                        </div>
                        @endif
                
                        <!-- IMPORTO INPUT -->
                        <label for="amount">
                          <div class="input-wrapper amount-wrapper">
                            <select id="amount" name="amount" class="form-control">
                              <option selected disabled style="display: none">Seleziona una sponsorship</option>
                              @foreach($sponsorList as $sponsor)
                                <option value="{{ $sponsor->id }}"> 
                                  {{ $sponsor->price_euro }}€ / {{ $sponsor->duration_hours }} h
                                </option>
                              @endforeach
                            </select>
                          </div>
                        </label>
                
                        <!-- PAGAMENTI LISTA -->
                        <div class="bt-drop-in-wrapper">
                          <div id="bt-dropin"></div>
                        </div>
                
                        {{-- ClientToken for js --}}
                        <input id="clientToken" type="hidden" value="{{ $clientToken }}"/>
                
                        <!-- SUBMIT -->
                        <input id="nonce" name="payment_method_nonce" type="hidden" />
                        <button class="btn btn-success" type="submit">Acquista</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
    
@section('extra_scripts')
    <script src="https://js.braintreegateway.com/web/dropin/1.22.1/js/dropin.min.js"></script>
    <script src="{{ asset('js/pay.js') }}"></script>
@endsection