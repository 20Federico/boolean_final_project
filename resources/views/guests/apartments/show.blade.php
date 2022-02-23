@extends('layouts.guests')

@section('title', 'Apartment - show')

{{-- @section('content')

<div class=" container main-container m-auto h-50 w-100">


    <div class="housepic-container w-100 d-flex justify-content-center position-relative">
        <div class="img-container w-100 my-carousel position-relative">
            @if (substr($apartment->cover_img, 0, 4 ) === 'http')
            <img src="{{ url($apartment->cover_img) }}" class="img-fluid w-100" alt="">
            @else
            <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="img-fluid w-100" alt="">
            @endif --}}

@section('content')

<div class="main-container m-auto h-50 w-100">
    <!-- immagine casa -->
    <div class="housepic-container">
      <div class="img_container">
        @if (substr($apartment->cover_img, 0, 4 ) === 'http')
          <img src="{{ url($apartment->cover_img) }}" class="w-100" alt="">
        @else    
          <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="w-100" alt="">
        @endif
      </div>

  </div>

    <div class="container p-5 my-5 bg-white rounded shadow">
        <div class="host mb-3 mb-sm-5">
            {{-- Titolo casa --}}
            <h1 class="mb-3 mb-sm-3">{{ $apartment->title }}</h1>

            <h5 class="mb-4 mb-sm-5"><strong>Host: </strong>{{ $apartment->user->name}} {{ $apartment->user->surname}}</h5>

            <div class="mb-3 mb-sm-5">
                <h3>Presso per notte: {{ $apartment->price_day }} €</h3>
            </div>
            {{-- @if ($apartment->visible)
            <p class="text-success">Visibile agli utenti</p>
            @else
            <p class="text-danger">NON visibile agli utenti</p>
            @endif --}}
            {{-- <p class="mb-0 text-secondary">Creato il: {{$apartment->created_at}}</p> --}}
            {{-- <p class="pb-3 text-secondary">Ultima modifica: {{$apartment->updated_at}}</p> --}}

        </div>

        <div class="row row-cols-1 row-cols-md-2 d-flex flex-column flex-column-reverse f flex-md-row">
            
            <div class="col col-md-5 pe-5">
                
                
               {{--  <div class="w-50 fs-5">
                    <h3>Descrizione</h3>
                    {{ $apartment->description }}
                </div>
                <hr class="my-3"> --}}
    
                <section class="mb-4">
                    <h3>Informazioni</h3>
    
                    <ul class="list-unstyled">
                        <li class="ps-2"><span>Stanze: {{ $apartment->n_rooms }}</span></li>
                        <li class="ps-2"><span>Bagni: {{ $apartment->n_baths }}</span></li>
                        <li class="ps-2"><span>Posti letto: {{ $apartment->n_beds }}</span></li>
                        <li class="ps-2"><span>Grandezza: {{ $apartment->square_meters }} m<sup>2</sup></span></li>
                        <li class="ps-2"><span>Condiviso: {{ $apartment->shared ? 'Sì' : 'No' }}</span></li>
                    </ul>
                </section>
    
                
                @if(count($apartment->services) !== 0)
                
                      <section>
                    <h3>Servizi aggiuntivi</h3>
    
                    <ul class="list-unstyled">
                        @foreach ($apartment->services as $service)
                        <li class="ps-2">
                            @if ($service->name == "Wi-fi")
                            <span class="me-2"><i class="fas fa-wifi"></i></span>
                            @elseif ($service->name == "posto macchina")
                            <span class="me-2"><i class="fas fa-car"></i></span>
                            @elseif ($service->name == "piscina")
                            <span class="me-2"><i class="fas fa-swimming-pool"></i></span> 
                            @elseif ($service->name == "portineria")
                            <span class="me-2"><i class="fas fa-door-open"></i></span>
                            @elseif ($service->name == "sauna")
                            <span class="me-2"><i class="fas fa-hot-tub"></i></span>
                            @elseif ($service->name == "colazione inclusa")
                            <span class="me-2"><i class="fas fa-coffee"></i></span>
                            @elseif ($service->name == "vista mare")
                            <span class="me-2"><i class="fas fa-water"></i></span>
                            @endif{{$service->name}}</li>
                        @endforeach
                    </ul>
                </section>
                
                @endif
            </div>
            <div class="col col-md-7">
                <div class="border rounded fs-6 p-3 p-sm-4 shadow-sm mb-5 mb-md-0" style="word-wrap: break-word;">
                    {{-- <h3>Descrizione</h3> --}}
                    {{ $apartment->description }}  
                </div>
            </div>

        </div>
{{--         <div class="container d-flex justify-content-center gap-3 d-flex-wrap">
            <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-primary btn-lg mb-4">Modifica</a>
            <a href="#messaggi" class="btn btn-warning btn-lg mb-4">Messaggi</a>
            <a href="{{route('admin.sponsors.index', $apartment->id)}}" class="btn btn-success btn-lg mb-4">Sponsorizza</a>
            <a href="{{ route('admin.visits.show', $apartment->id) }}" class="btn btn-info btn-lg mb-4">Statistiche</a>
            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger btn-lg" type="submit" onclick="return confirm('Are you sure you want to delete this appartment? With this apartment all related messages will be deleted')">Elimina</button>
            </form>
        </div> --}}




        <!-- sottocontainer -->
        <div class="mt-5">

            {{-- @if (isset($apartment->address->city))
            <p class="fs-3">{{ $apartment->address->city }}, {{ $apartment->address->country }}</p>
            @endif --}}

            <section class="pb-2">
                <h3>Indirizzo</h3>
                @if (isset($apartment->address))
                <p class="fs-6" >{{$apartment->address->street_name}}, {{$apartment->address->street_number}}, {{$apartment->address->zip_code}}, {{$apartment->address->city}}, {{$apartment->address->country}}</p>
                @endif
            </section>
            <section class="pb-5 mb-5">

                <div class="map" id="map"></div>

            </section>
        </div>

        <div class="position d-none">
            <div id="lat" value="{{$apartment->address->latitude}}"></div>
            <div id="lon" value="{{$apartment->address->longitude}}"></div>
        </div>

        <div>
          <h3 class="mb-3">Contatta l'host</h3>
          <div>
            <div class="card shadow-sm">
              <div class="card-header" style="background-color: #d48166; color: white">Invia un messaggio</div>

              <div class="card-body">
                  <div class="mb-4">
                      <em>I campi contrassegnati da <span style="color: rgb(207, 29, 29)">*</span> sono obbligatori</em>
                  </div>
                  <form action=" {{ route('apartments.store', $apartment->id) }}  " method="post" enctype="multipart/form-data">
                      @csrf

                      <div class="form-group row mb-3">
                          <label for="title" class="col-md-4 col-form-label text-md-right">Il tuo indirizzo email <span style="color: rgb(207, 29, 29)">*</span></label>

                          <div class="col-md-7">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-3">
                          <label for="description" class="col-md-4 col-form-label text-md-right">Testo <span style="color: rgb(207, 29, 29)">*</span></label>
                          <div class="col-md-7">
                              <textarea name="description" id="description" cols="30" rows="7" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                              @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row mb-0">
                          <div class="col-md-8 offset-md-4">
                              <button type="submit" class="btn btn-primary">Invia Messaggio</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
          </div>
        </div>

    </div>

    {{-- area messaggi --}}

  {{--   <div class="card">
      <div class="card-header">
        <h5 class=" my-2 my-md-0">
          Messaggi
        </h5> 
      </div>
    <div id="messaggi" class="card-body">
      <ul class="list-group">
        @if (count($messages) == 0)
        nesson messaggio
        @endif
        @if (count($messages) > 0)
        <ul class="list-group">
          @foreach ($messages as $message)
            @if ( $message->read == 0)
            @include('admin.partials.messageList')
            @endif
          @endforeach
          
          @foreach ($messages as $message)
              @if ($message->read == 1)
              @include('admin.partials.messageList')
              @endif
          @endforeach
        </ul>
        @endif
      </ul>
    </div>
  </div> --}}
</div>
@endsection


@section('extra_scripts')
<script>

  var lat = document.getElementById('lat').getAttribute('value');
  var lon = document.getElementById('lon').getAttribute('value');
  const map = tt.map({
      key: 'hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo'
      , container: 'map'
      , center: [lon, lat]
      , zoom: 15
  });

  map.addControl(new tt.FullscreenControl());
  map.addControl(new tt.NavigationControl());

  function createMarker(icon, position, color, popupText) {
      var markerElement = document.createElement('div');
      markerElement.className = 'marker';
      var markerContentElement = document.createElement('div');
      markerContentElement.className = 'marker-content';
      markerContentElement.style.backgroundColor = color;
      markerElement.appendChild(markerContentElement);
      var iconElement = document.createElement('div');
      iconElement.className = 'marker-icon';
      iconElement.style.backgroundImage =
          'url(https://api.tomtom.com/maps-sdk-for-web/cdn/static/' + icon + ')';
      markerContentElement.appendChild(iconElement);
      var popup = new tt.Popup({
          offset: 30
      }).setText(popupText);
      // add marker to map
      new tt.Marker({
              element: markerElement
              , anchor: 'bottom'
          })
          .setLngLat(position)
          .setPopup(popup)
          .addTo(map);
  }
  createMarker('accident.colors-white.svg', [lon, lat], '#5327c3', 'SVG icon');
</script>
@endsection
{{-- @section('extra_scripts')
<script>

  var lat = document.getElementById('lat').getAttribute('value');
  var lon = document.getElementById('lon').getAttribute('value');
  const map = tt.map({
      key: 'hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo'
      , container: 'map'
      , center: [lon, lat]
      , zoom: 15
  });

  map.addControl(new tt.FullscreenControl());
  map.addControl(new tt.NavigationControl());

  function createMarker(icon, position, color, popupText) {
      var markerElement = document.createElement('div');
      markerElement.className = 'marker';
      var markerContentElement = document.createElement('div');
      markerContentElement.className = 'marker-content';
      markerContentElement.style.backgroundColor = color;
      markerElement.appendChild(markerContentElement);
      var iconElement = document.createElement('div');
      iconElement.className = 'marker-icon';
      iconElement.style.backgroundImage =
          'url(https://api.tomtom.com/maps-sdk-for-web/cdn/static/' + icon + ')';
      markerContentElement.appendChild(iconElement);
      var popup = new tt.Popup({
          offset: 30
      }).setText(popupText);
      // add marker to map
      new tt.Marker({
              element: markerElement
              , anchor: 'bottom'
          })
          .setLngLat(position)
          .setPopup(popup)
          .addTo(map);
  }
  createMarker('accident.colors-white.svg', [lon, lat], '#5327c3', 'SVG icon');
</script>
@endsection --}}