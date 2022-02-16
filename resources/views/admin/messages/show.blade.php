@extends('layouts.admin')

@section('title', 'Messagio')

@section('content')
    
    <div>Inviato da: {{ $message->email_sender }}</div>
    <br>
    <div>Ricevuto il: {{ $message->created_at }}</div>
    <br>
    <div>
        Appartamento: <strong>{{ $message->apartment->title }}</strong>
    </div>
    <br>
    <div>contenuto: <p>{{ $message->content }}</p></div>
 
    <a href="{{ route('admin.messages.index') }}">torna ai messaggi</a>
@endsection