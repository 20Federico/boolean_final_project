@extends('layouts.guests')

@section('title', 'BoolBnB - Affittare casa non è mai stato così facile!')




@section('content')
  <hero-section @search="searching = true" ></hero-section>
  <home-page v-show="!searching"></home-page>
  <searched-view v-show="searching" @back="searching = false" :search='search'></searched-view>
@endsection