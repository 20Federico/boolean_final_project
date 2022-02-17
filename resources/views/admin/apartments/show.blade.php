@extends('layouts.admin')

{{-- use illuminate --}}

@section('title', 'Apartment - show')

@section('more_scripts')
    
@endsection
  <style>
    #map {
        width: 80%;
        height: 500px;


    }

    .marker-icon {
        background-position: center;
        background-size: 22px 22px;
        border-radius: 50%;
        height: 22px;
        left: 4px;
        position: absolute;
        text-align: center;
        top: 3px;
        transform: rotate(45deg);
        width: 22px;
    }

    .marker {
        height: 30px;
        width: 30px;
    }

    .marker-content {
        background: #c30b82;
        border-radius: 50% 50% 50% 0;
        height: 30px;
        left: 50%;
        margin: -15px 0 0 -15px;
        position: absolute;
        top: 50%;
        transform: rotate(-45deg);
        width: 30px;
    }

    .marker-content::before {
        background: #ffffff;
        border-radius: 50%;
        content: "";
        height: 24px;
        margin: 3px 0 0 3px;
        position: absolute;
        width: 24px;
    }

  </style>
  <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps.css' />

  <script src='https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.18.0/maps/maps-web.min.js' defer></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" defer></script>

  <script defer>

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
@section('content')

<div class="main-container m-auto h-50 w-100">
    <!-- immagine casa -->
    <div class="housepic-container w-100 d-flex justify-content-center">
        <div class="img-container my-carousel position-relative">
          @if (substr($apartment->cover_img, 0, 4 ) === 'http')
            <img src="{{ url($apartment->cover_img) }}" class="img-fluid" alt="">
          @else    
            <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="img-fluid" alt="">
          @endif
        </div>
    </div>

    <div class="container py-5">
      
      <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-primary btn-lg mb-4">Modifica</a>
        <a href="#" class="btn btn-warning btn-lg mb-4">Messaggi</a>
        <a href="{{route('admin.sponsors.index', $apartment->id)}}" class="btn btn-success btn-lg mb-4">Sponsorizza</a>
        <a href="#" class="btn btn-info btn-lg mb-4">Statistiche</a>
        <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post">
          @csrf
          @method('delete')
          <button class="btn btn-outline-danger btn-lg" type="submit" onclick="return confirm('Are you sure you want to delete this appartment? With this apartment all related messages will be deleted')">Elimina</button>
        </form>
      </div>

      {{-- Titolo casa --}}
      <h2 class="display-5"><strong>{{ $apartment->title }}</strong></h2>

      @if ($apartment->visible)
      <p class="text-success">Visibile agli utenti</p>
      @else
      <p class="text-danger">NON visibile agli utenti</p>
      @endif
      <p class="mb-0 text-secondary">Creato il: {{$apartment->created_at}}</p>
      <p class="pb-3 text-secondary">Ultima modifica: {{$apartment->updated_at}}</p>

      <!-- sottocontainer -->
      <div class="ms-4">

        @if (isset($apartment->address->city))
          <p class="fs-3">{{ $apartment->address->city }}, {{ $apartment->address->country }}</p>
        @endif


        <p class="pb-2 fs-4">
            <strong>{{ $apartment->price_day }}€</strong>
            /notte
        </p>

        <p class="w-50">
          {{ $apartment->description }}
        </p>

        <section class="pb-3 w-25">
            <h3>Dettagli</h3>
            <hr>
            <ul>
              <li class="my-lh"><span class="ps-2 fs-5">Stanze: {{ $apartment->n_rooms }}</span></li>
              <li class="my-lh"><span class="ps-2 fs-5">Bagni: {{ $apartment->n_baths }}</span></li>
              <li class="my-lh"><span class="ps-2 fs-5">Posti letto: {{ $apartment->n_beds }}</span></li>
              <li class="my-lh"><span class="ps-2 fs-5">Grandezza: {{ $apartment->square_meters }} m<sup>2</sup></span></li>
              <li class="my-lh"><span class="ps-2 fs-5">Condiviso: {{ $apartment->shared ? 'Sì' : 'No' }}</span></li>
            </ul>
        </section>
        <section class="pb-5 w-25">
            <h3>Servizi aggiuntivi</h3>
            <hr>
            <ul>
              @foreach ($apartment->services as $service)
                <li class="my-lh"><span class="ps-2">{{ $service->name }}</span></li>  
              @endforeach
            </ul>
        </section>
      </div>

        
        <h1>Position</h1>
        @if (isset($apartment->address))
          <p>{{$apartment->address->country}} {{$apartment->address->city}} {{$apartment->address->zip_code}} {{$apartment->address->street_name}} {{$apartment->address->street_number}} </p>
        @endif

        <div class="container">
          <div class="map px-5 px-5" id="map"></div>
        </div>

        <div class="position d-none">
          <div id="lat"  value="{{$apartment->address->latitude}}"></div>
          <div id="lon" value="{{$apartment->address->longitude}}"></div>
        </div>
        
    </div>


    @endsection
