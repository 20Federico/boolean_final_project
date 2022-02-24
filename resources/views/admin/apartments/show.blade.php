{{-- @extends('layouts.adminShow') --}}
@extends('layouts.admin')

@section('title', 'Apartment - show')

@section('content')

<div class="container py-3">
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

    <div class="py-3">

        <div class="container nav-responsive d-flex flex-wrap justify-content-center d-flex-wrap">
            <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn-responsive btn btn-primary btn-lg mb-3">Modifica</a>
            <a href="#messaggi" class="btn-responsive btn btn-warning btn-lg mb-3">Messaggi</a>
            @if(count($apartment->sponsor) == 0)
            <a href="{{route('admin.sponsors.index', $apartment->id)}}" class="btn-responsive btn btn-success btn-lg mb-3">Sponsorizza</a>
            @endif
            <a href="{{ route('admin.visits.show', $apartment->id) }}" class="btn-responsive btn btn-info btn-lg mb-3">Statistiche</a>
            {{-- <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post" class="btn-responsive">
                @csrf
                @method('delete')
                <button class="btn-responsive btn btn-outline-danger btn-lg" type="submit" onclick="return confirm('Are you sure you want to delete this appartment? With this apartment all related messages will be deleted')">Elimina</button>
            </form> --}}
            <!-- Button trigger modal -->
            <div>

              <button type="button" class="btn-responsive btn btn-outline-danger btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $apartment->id }}">
                Elimina
              </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal{{ $apartment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Conferma eleminzione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    Vuoi davvero cancellare l'appartamento?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post" class="btn-responsive">
                      @csrf
                      @method('delete')
                      <button class="btn btn-outline-danger" type="submit" >Elimina</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="container py-4">
            {{-- Titolo casa --}}
            <h2 class="display-5"><strong>{{ $apartment->title }}</strong></h2>

            @if ($apartment->visible)
            <p class="text-success">Visibile agli utenti</p>
            @else
            <p class="text-danger">NON visibile agli utenti</p>
            @endif
            <p class="mb-0 text-secondary">Creato il: {{$apartment->created_at}}</p>
            <p class="mb-0 text-secondary">Ultima modifica: {{$apartment->updated_at}}</p>

        </div>


        <!-- sottocontainer -->
        <div class="container">

            {{-- @if (isset($apartment->address->city))
            <p class="fs-3">{{ $apartment->address->city }}, {{ $apartment->address->country }}</p>
            @endif --}}

            <hr class="mb-3">
            <div class=" fs-4 d-flex justify-content-between ">
                <h3 class="m-0">Prezzo a notte</h3>
                <div>{{ $apartment->price_day }} €</div>

            </div>
            <hr class="my-3">
            <div class="fs-5">
                <h3>Descrizione</h3>
                <p style="overflow-wrap:break-word">
                  {{ $apartment->description }}
                </p>
            </div>
            <hr class="my-3">
            <div class="fs-5">
                <h3>Sponsor</h3>
                <span style="overflow-wrap:break-word">
                
                  @if(count($apartment->sponsor) == 0)
                    <span>Base</span>
                  @else
                    <span>Premium</span>
                  @endif
                </span>
            </div>
            <hr class="my-3">
            <section>
                <h3>Info generali</h3>

                <ul>
                    <li><span class="fs-5">Stanze: {{ $apartment->n_rooms }}</span></li>
                    <li><span class="fs-5">Bagni: {{ $apartment->n_baths }}</span></li>
                    <li><span class="fs-5">Posti letto: {{ $apartment->n_beds }}</span></li>
                    <li><span class="fs-5">Grandezza: {{ $apartment->square_meters }} m<sup>2</sup></span></li>
                    <li><span class="fs-5">Condiviso: {{ $apartment->shared ? 'Sì' : 'No' }}</span></li>
                </ul>
            </section>
            <hr class="my-3">
            <section>
                <h3>Servizi</h3>

                <ul>
                    @foreach ($apartment->services as $service)
                      <li><span class="ps-2 fs-5 serv-li">{{$service->name}}</span></li>
                    @endforeach
                </ul>
            </section>
            <hr class="my-3">
            <section>
                <h3>Indirizzo</h3>
                @if (isset($apartment->address))
                <span class="fs-5">
                  {{$apartment->address->street_name}} ,
                  {{$apartment->address->street_number}} ,
                  {{$apartment->address->zip_code}} ,
                  {{$apartment->address->city}} ,
                  {{$apartment->address->country}} 
                </span>
                @endif
            </section>
            <section class="pt-5">

                <div class="map" id="map"></div>

            </section>
        </div>

        <div class="position d-none">
            <div id="lat" value="{{$apartment->address->latitude}}"></div>
            <div id="lon" value="{{$apartment->address->longitude}}"></div>
        </div>

    </div>

    {{-- area messaggi --}}

    <div class="container">
      <div class="card mb-3">
        <div class="card-header">
          <h5 class=" my-2 my-md-0">
            Messaggi
          </h5> 
        </div>
      <div id="messaggi" class="card-body">
        <ul class="list-group">
          @if (count($messages) == 0)
          <div class="text-center">
            Non hai nuovi messaggi
          </div>
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
    </div>
  </div>
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
