@extends('layouts.admin')

@section('title', 'Message')

@section('content')
  <div class="card">
    <div class="card-header">Lista Messaggi</div>
    <div class="card-body">
      <ul class="list-group">
        {{-- @dd($messageList) --}}
        @if (count($messageList) == 0)
        <div class="text-center">
          <h3 class="fw-8">
            Non hai messaggi
          </h3>
        </div>
        @endif
        @foreach ($messageList as $message)
        <li class="list-group-item {{$message->read == false ? 'list-group-item-secondary' : ''}}">
          
          <div class="row">
            <div class="col">Inviato da: {{ $message->email_sender }}</div>

                
            <div class="col">Riferito al appartamento: <strong>{{ $message->apartment->title }}</strong></div>
            <div class="col">Messaggio: 
              @php
                  $stringCut = substr($message['content'], 0 ,10);
                  echo "$stringCut";
                 if ( strlen($stringCut) >= 10)
                   echo '...'
              @endphp
              
            </div>
            <div class="col">Ricevuto il: {{ $message->created_at }}</div>

            <div class="col d-flex">
              <div>
                <a class="btn btn-primary" href="{{ route('admin.messages.show', $message->id) }}">Dettagli</a>
              </div>

              <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
                @csrf
                @method('delete')
              
                <button class="btn btn-outline-danger" type="submit">Elimina</button>
              </form>
            </div>
          </div>
          
        </li>
      @endforeach
      </ul>
    </div>
  </div>
  
          


    
@endsection