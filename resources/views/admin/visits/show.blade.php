@extends('layouts.admin')

@section('title', 'Apartments')


@section('content')

    
    <h1>Appartamento: {{ $apartment->title }}</h1>

    <h2>Statistiche</h2>
    <div>Visite totali: </div>
    <div>Visite di oggi: </div>

@endsection
