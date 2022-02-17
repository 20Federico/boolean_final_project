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
    <div class="card-body">
      <ul class="list-group">
        @if (count($apartmentsList) == 0)
        <div class="text-center">
          <h3 class="fw-8">
            Nessun appartamento disponibile
          </h3>
        </div>
        @endif
        @foreach ($apartmentsList as $apartment)
            <li class="list-group-item {{$apartment->visible == false ? 'list-group-item-secondary' : ''}}">
              <div class="row row-cols-md-6 row-cols-1 align-items-center">
                <a href="{{ route('admin.visits.show', $apartment->id) }}">Vedi Statistica</a>
              
              <div class="col col-md-4" style="text-transform: capitalize;">
                {{ $apartment->title }}
              </div>
              <div class="col col-md-6">
                <div class="row row-cols-md-3 row-cols-1">
                  <div class="col col-md-5">
                    Aggiunto il: 
                    @php
                    echo date_format($apartment->created_at, 'd/m/Y');
                    @endphp
                  </div>
                    
                
                  <div class="col col-md-4" >
                    Stato: 
                    @if ($apartment->visible)
                    Pubblicato
                    @else
                    Privato
                    @endif
                  </div>
                  <div class="col col-md-3">
                    Prezzo: {{ $apartment->price_day }} €
                  </div>
                </div>
              </div>
              <div class="col col col-md-2 mt-1 mt-md-0">
                <div class="row">
                  <div class="col p-md-0">
                    <a class="btn btn-primary" href="{{ route('admin.apartments.show', $apartment->id) }}">Dettagli</a>
                  </div>
                  <div class="col p-0">

                    <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post">
                      @csrf
                      @method('delete')                      
                    
                      <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Are you sure you want to delete this appartment? With this apartment all related messages will be deleted')">Elimina</button>
                    </form>
                  </div>
                </div>

              </div>
            </div>
          </li>
            @endforeach
          </ul>
    </div>
  </div>
@endsection