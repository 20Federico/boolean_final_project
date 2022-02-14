@extends('layouts.admin')

@section('title', 'Apartments')


@section('content')
  <h2>I miei Appartamenti</h2>
  <div class="text-center my-5">
    <a href="{{route('admin.apartments.create')}}" class="btn btn-success">
      Aggiungi nuovo
    </a>
  </div>
  
  <div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">Lista Appartamenti
      <a href="{{route('admin.apartments.create')}}" class="btn btn-success">
        Aggiungi nuovo
      </a>
    </div>
    <div class="card-body">
      <ul class="list-group">
        @foreach ($apartmentsList as $apartment)
            {{-- @dd($apartment); --}}
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <div class="col-4" style="text-transform: capitalize;">
                Nome: {{ $apartment->title }}
              </div>
              <div class="col-7 d-flex justify-content-end align-items-center">

                <div class="mr-4">
                  Aggiunto il: 
                  @php
                  echo date_format($apartment->created_at, 'd/m/Y');
                  @endphp
                </div>
                  
              
                <div class="mr-4" style="width: 115px;">
                  Stato: 
                  @if ($apartment->visible)
                  Pubblicato
                  @else
                  Privato
                  @endif
                </div>
                <div class="mr-4" style="width: 93px;">
                  Prezzo: {{ $apartment->price_day }} €
                </div>
                <a class="btn btn-primary" href="{{ route('admin.apartments.show', $apartment->id) }}">Dettagli</a>
                
              </div>
              <div class="col-1">
                <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post">
                  @csrf
                  @method('delete')
                  
                  
                  <button class="btn btn-outline-danger" type="submit">Elimina</button>
                </form>

              </div>
              
          </li>
            @endforeach
          </ul>
    </div>
  </div>
@endsection