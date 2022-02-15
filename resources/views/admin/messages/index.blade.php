@extends('layouts.admin')

@section('title', 'Message')

@section('content')
@foreach ($messageList as $message)
<div>id messaggio{{ $message["id"] }}</div>
    <div>{{ $message->content }}</div>
    <div>riferito appartamento con id: {{ $message->apartment_id }}</div>
    <div>{{ $message->email_sender }}</div>
    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
        @csrf
        @method('delete')
        
      
        <button class="btn btn-outline-danger" type="submit">Elimina</button>
    </form>
@endforeach
    
@endsection