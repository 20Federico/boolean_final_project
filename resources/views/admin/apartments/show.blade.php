@extends('layouts.adminShow')

@section('title', 'Apartment - show')

@section('content')

<div class=" container main-container m-auto h-50 w-100">


    <div class="housepic-container w-100 d-flex justify-content-center position-relative">
        <div class="img-container w-100 my-carousel position-relative">
            @if (substr($apartment->cover_img, 0, 4 ) === 'http')
            <img src="{{ url($apartment->cover_img) }}" class="img-fluid w-100" alt="">
            @else
            <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="img-fluid w-100" alt="">
            @endif
        </div>

    </div>

    <div class="container py-5">

        <div class="container d-flex justify-content-center gap-3 d-flex-wrap">
            <a href="{{ route('admin.apartments.edit', $apartment->id) }}" class="btn btn-primary btn-lg mb-4">Modifica</a>
            <a href="#" class="btn btn-warning btn-lg mb-4">Messaggi</a>
            <a href="{{route('admin.sponsors.index', $apartment->id)}}" class="btn btn-success btn-lg mb-4">Sponsorizza</a>
            <a href="{{ route('admin.visits.show', $apartment->id) }}" class="btn btn-info btn-lg mb-4">Statistiche</a>
            <form action="{{ route('admin.apartments.destroy', $apartment->id) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger btn-lg" type="submit" onclick="return confirm('Are you sure you want to delete this appartment? With this apartment all related messages will be deleted')">Elimina</button>
            </form>
        </div>

        <div class="ms-4">
            {{-- Titolo casa --}}
            <h2 class="display-5"><strong>{{ $apartment->title }}</strong></h2>

            @if ($apartment->visible)
            <p class="text-success">Visibile agli utenti</p>
            @else
            <p class="text-danger">NON visibile agli utenti</p>
            @endif
            <p class="mb-0 text-secondary">Creato il: {{$apartment->created_at}}</p>
            <p class="pb-3 text-secondary">Ultima modifica: {{$apartment->updated_at}}</p>

        </div>


        <!-- sottocontainer -->
        <div class="ms-4">

            {{-- @if (isset($apartment->address->city))
            <p class="fs-3">{{ $apartment->address->city }}, {{ $apartment->address->country }}</p>
            @endif --}}

            <hr class="my-3">
            <div class="pb-2 fs-4 d-flex justify-content-between">
                <h3>1 night price : </h3>
                <div>{{ $apartment->price_day }} €</div>

            </div>
            <hr class="my-3">
            <div class="w-50 fs-5">
                <h3>Description</h3>
                {{ $apartment->description }}
            </div>
            <hr class="my-3">
            <section>
                <h3>General information</h3>

                <ul class="apartment__details">
                    <li class="my-lh"><span class="fs-5">Stanze: {{ $apartment->n_rooms }}</span></li>
                    <li class="my-lh"><span class="ps-2 fs-5">Bagni: {{ $apartment->n_baths }}</span></li>
                    <li class="my-lh"><span class="ps-2 fs-5">Posti letto: {{ $apartment->n_beds }}</span></li>
                    <li class="my-lh"><span class="ps-2 fs-5">Grandezza: {{ $apartment->square_meters }} m<sup>2</sup></span></li>
                    <li class="my-lh"><span class="ps-2 fs-5">Condiviso: {{ $apartment->shared ? 'Sì' : 'No' }}</span></li>
                </ul>
            </section>
            <hr class="my-3">
            <section class="pb-5">
                <h3>Services</h3>

                <ul class="apartment__services">
                    @foreach ($apartment->services as $service)
                    <li class="my-lh "><span class="ps-2 fs-5 serv-li">{{$service->name}}</span></li>
                    @endforeach
                </ul>
            </section>
            <hr class="my-3">
            <section class="pb-5">
                <h3>Address</h3>
                @if (isset($apartment->address))
                <p class="fs-5">{{$apartment->address->country}} {{$apartment->address->city}} {{$apartment->address->zip_code}} {{$apartment->address->street_name}} {{$apartment->address->street_number}} </p>
                @endif
            </section>
            <section class="pb-5">

                <div class="map" id="map"></div>

            </section>
        </div>

        <div class="position d-none">
            <div id="lat" value="{{$apartment->address->latitude}}"></div>
            <div id="lon" value="{{$apartment->address->longitude}}"></div>
        </div>

    </div>
    @endsection
