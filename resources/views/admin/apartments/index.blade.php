@extends('layouts.admin')

@section('title', 'Apartments')


@section('content')
  <h2>I miei Appartamenti</h2>
  <div class="text-center my-5">
    <a href="{{route('admin.apartments.create')}}" class="btn btn-success">
      Aggiungi nuovo
    </a>
  </div>
@endsection