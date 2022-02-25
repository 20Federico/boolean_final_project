@extends('layouts.admin')

@section('title', 'Apartments')

@section('content')
  
  @if(session('message'))
    <div class="alert alert-success"> {{session('message')}}</div>
  @endif

  <h2 class="mb-5">I miei Appartamenti</h2>
  
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">Lista Appartamenti
      <a href="{{route('admin.apartments.create')}}" class="btn btn-success">
        Aggiungi nuovo
      </a>
    </div>
    <div class="card-body orange-bg">
      <ul class="list-group">
        @if (count($apartmentsList) == 0)
        <div class="text-center">
          <h3 class="fw-8">
            Nessun appartamento disponibile
          </h3>
        </div>
        @endif
        @foreach ($apartmentsList as $apartment)
            
          
          <div class="row row-cols-1 row-cols-md-6 align-items-center text-center apartment-card mb-3 orange-border">
            <div class="d-none d-xl-inline-block col-lg-1">
              
              <div class="row row-cols-1 text-center fw-lighter text-small flex-shrink-0 me-lg-3">
                Creato il
                @php
                echo date_format($apartment->created_at,"d/m/Y");
                @endphp ore
                @php echo date_format($apartment->created_at,"H:i:s");
                @endphp
              </div>
            </div>

            <div class="col-md-6 col-lg-5 col-xl-4 text-start d-flex flex-column flex-md-row align-items-center p-0">
              <div class="img-container flex-shrink-0 mb-3 mb-md-0 me-md-3 ">
                {{-- <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="cover-img w-100 h-100" alt=""> --}}
                @if (substr($apartment->cover_img, 0, 4 ) === 'http')
                  <img src="{{ url($apartment->cover_img) }}" class="cover-img w-100 h-100" alt="">
                @else    
                  <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="cover-img w-100 h-100" alt="">
                @endif
              </div>
              <div class="text-title pe-md-2">{{ $apartment->title }}</div>

            </div>

            <div class="col-4 col-md-1 col-lg-2 mt-4 mt-md-0 border-md-start border-2 py-3">
              <i class="fa fa-envelope" aria-hidden="true"></i>
                <p class="d-none d-lg-block m-0">New messages</p>
                {{-- estrapolare dati DB --}}
                <p class="m-0">
                  {{-- {{ $apartment->messages }} --}}
                  @php
                      $messageToRead = [];
                      foreach ($apartment->messages as $item) {
                        $item->read;
                        if ($item->read== 0) 
                          array_push($messageToRead, $item);
                      }
                      echo count($messageToRead);
                  @endphp
                </p>
            </div>
            
            <div class="col-4 col-md-1 col-lg-1 mt-4 mt-md-0 border-md-start border-2 py-3">
              <i class="fa fa-eye" aria-hidden="true"></i>
                <p class="d-none d-lg-block m-0">Views</p>
                {{-- estrapolare dati DB --}}
                <p class="m-0">
                  @php
                    $visits = [];
                    foreach ($apartment->visits as $visit) {
                      if ($visit->apartment_id == $apartment->id) 
                        array_push($visits, $visit->apartment_id);
                    }  
                    echo count($visits);
                  @endphp
                </p>
                
            </div>

            <div class="col-4 col-md-2 col-lg-2 mt-4 mt-md-0 border-md-start border-md-end border-2 py-3">
              <i class="fa fa-rocket" aria-hidden="true"></i>
                {{-- Estrapolare dati DB --}}
                <p class="m-0">

                  @if(count($apartment->sponsor) == 0)
                    <span>Base</span>
                    {{ $apartment->pivot }}
                  @else
                    <span>Premium</span>
                  @endif  
                  
                </p>
                <p class="d-none d-lg-inline-block fw-lighter text-small m-0">
                  @foreach ($apartmentSponsoredList as $item)
                    @foreach ($item as $value)
                        
                        @if ($value->apartment_id == $apartment->id)
                          @php
                              $time = strtotime($value->expiry);

                              $dateExpiry = date('Y/m/d',$time);
                              $hourExpiry = date('H:i:s',$time);

                              echo $dateExpiry . "<br>" . $hourExpiry;
                          @endphp
                        @endif

                    @endforeach
                  @endforeach
                </p>
            </div>
            {{-- Pulsanti --}}
            <div class="col-lg-2 mt-4 mt-md-0 f-shrink-0 2">
              <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-orange w-100"> 
                <div class="p d-md-none d-lg-block">Modifica</div> 
                <i class="fa fa-paint-brush d-lg-none" aria-hidden="true"></i>
              </a>
              
              <a type="button" class="btn theme-btn-white w-100" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $apartment->id }}">
                <div class="p d-md-none d-lg-block">Elimina</div> 
                <i class="fa fa-trash d-lg-none" aria-hidden="true"></i>
              </a>
              

              <div class="modal fade" id="exampleModal{{ $apartment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Conferma eleminzione</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-start">
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

              <a href="{{ route('admin.apartments.show', $apartment->id) }}" class="btn theme-btn-white w-100">
                <div class="p d-md-none d-lg-block">Vedi</div> 
                <i class="fa fa-eye d-lg-none" aria-hidden="true"></i>
              </a>
            </div>
          </div>

        @endforeach
      </ul>
    </div>
  </div>
@endsection