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
            {{-- <li class="list-group-item {{$apartment->visible == false ? 'list-group-item-secondary' : ''}}">
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
              <div class="col col-md-2 mt-1 mt-md-0">
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
          </li> --}}
          <div class="apartment-card d-flex mb-3 border border-2">
            {{-- data --}}
            <div class="date-apartment d-flex align-items-center pe-3 me-3 border-end border-2">
              <p class="fw-lighter fs-6 text-center">23/23/2022 <br>
              ore <br>
              15:22:22
              </p>
            </div>
            {{--thumbnail  --}}
            <div class="img-container position-relative">
              @if (substr($apartment->cover_img, 0, 4 ) === 'http')
                  <img src="{{ url($apartment->cover_img) }}" class="img-fluid" alt="">
                @else    
                  <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="img-fluid" alt="">
                @endif
            </div>
            {{-- testi principali --}}
            <div class="apartment-data d-flex flex-column justify-content-center flex-grow-1 ms-3 ps-3 border-2">
              <div class="title pb-2 fw-light fs-5">{{ $apartment->title }}</div>
              {{-- <div class="new-messages d-flex align-items-center">
                <p class="pe-4"> Hai 2 nuovi messaggi</p>
                
                <a href="#" class="btn btn-orange ">Leggi</a>
              </div>   --}}
            </div>
            
            <div class="apartment-data ps-3 border-start border-2 pe-0">
              <i class="fa fa-envelope" aria-hidden="true"></i>
              <p>New messages</p>
      
              {{-- estrapolare dati DB --}}
              <p>3</p>
            </div>
      
      
            <div class="apartment-data ps-3 border-start border-end border-2">
              <i class="fa fa-eye" aria-hidden="true"></i>
              <p>Views</p>
              {{-- estrapolare dati DB --}}
              <p>3</p>
            </div>
      
            <div class="apartment-data border-end border-2">
              <i class="fa fa-rocket" aria-hidden="true"></i>
              {{-- Estrapolare dati DB --}}
              <p>Advanced Plan</p>
              <p class="fw-lighter fs-7">ends 23/12/21 ore 15:30</p>
            </div>
            <div class="end-card justify-content-end align-items-center d-flex">
              <div class="modifier-buttons d-flex flex-column">
                {{-- completare con dati DB --}}
      
                <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-orange mb-3">Modifica casa</a>
                <a href="{{ route('admin.apartments.destroy', $apartment->id) }}" class="btn theme-btn-white">Elimina casa</a>
              </div>
            </div>
          </div>
        @endforeach
      </ul>
    </div>
  </div>
@endsection