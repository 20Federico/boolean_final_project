@extends('layouts.admin')

@section('title', 'Apartments')


@section('content')


<h1>Appartamento: </h1>

<h2>Statistiche</h2>
<div>Visite totali: {{count($visits)}}</div>
<div>Visite totali: {{count($messages)}}</div>
<div class="row">
    <div class="col text-center">
        <h3>Visits</h3>
        <chart-component :charttitle="{title: 'Visits'}" :statistics="{{json_encode($visits)}}"></chart-component>
    </div>
    <div class="col text-center">
    <h3>Messages</h3>
        <chart-component :charttitle="{title: 'Messages'}" :statistics="{{json_encode($messages)}}"></chart-component>
    </div>

</div>



@endsection
