@extends('layouts.admin')

@section('title', 'Dettagli pacchetto: ' . $sponsor->duration_hours ."H")

@section('content')
<div>
    <h1 class="mb-5">Dettagli pacchetto {{$sponsor->duration_hours}}H</h1>
</div>
    
@endsection