@extends('layouts.guests')

@section('title', 'BoolBnB - Affittare casa non è mai stato così facile!')

@section('content')
  <hero-section @search="searching = true" :searching='searching'></hero-section>

  <home-page v-if="!searching"></home-page>

  <searched-view v-if="searching" @back="searching = false" :apartments="{{json_encode($apartments)}}" ></searched-view>

  {{-- <div style="height: 500px" class="mymap" id="mymap"></div> --}}


@endsection