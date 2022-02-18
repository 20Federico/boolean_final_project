@extends('layouts.admin')

@section('title', 'Message')

@section('content')
  <div class="card">
    <div class="card-header">
      Lista Messaggi
      <span class="ps-2">Tot Messaggi: {{ $totMessages }}</span>
      <span class="ps-2">Tot Messaggi da leggere: {{ $totMessagesToRead }}</span>
    </div>
    <div class="card-body">
      <ul class="list-group">

        @if (count($messageList) == 0)
        <div class="text-center">
          <h3 class="fw-8">
            Non hai messaggi
          </h3>
        </div>
        @endif
        @if (count($messageToReadList) > 0)
        <ul class="list-group">
          @foreach ($messageToReadList as $message)
            <li class="list-group-item {{$message->read == false ? 'list-group-item-secondary' : ''}}">
              <div class="row align-items-center">
                <div class="col">
                  @if ($message->read)
                    <i class="fa fa-envelope-open" aria-hidden="true"></i>
                  @else
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                  @endif
                  <span class="ps-2">
                    <strong>{{ $message->apartment->title }}</strong>
                  </span>
                </div>
                <div class="col">
                  {{ $message->email_sender }}
                </div>
                <div class="col">
                  {{ $message->created_at }}
                </div>
                <div class="col d-flex">
                  <div class="pe-3">
                    <a class="btn btn-primary" href="{{ route('admin.messages.show', $message->id) }}">Dettagli</a>
                  </div>
                  
                  {{ $message->id }}
                  <!-- Button trigger modal -->
                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Elimina{{ $message->id }}
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...{{ $message->id }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                          <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger" type="submit">Elimina {{ $message->id }}</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>         
            </li>
          @endforeach
          <hr>
        </ul>
        @endif
        
        @foreach ($messageReadList as $message)
          <li class="list-group-item {{$message->read == false ? 'list-group-item-secondary' : ''}}">
            <div class="row align-items-center">
              <div class="col">
                @if ($message->read)
                  <i class="fa fa-envelope-open" aria-hidden="true"></i>
                @else
                  <i class="fa fa-envelope" aria-hidden="true"></i>
                @endif
                <span class="ps-2">
                  <strong>{{ $message->apartment->title }}</strong>
                </span>
              </div>
              <div class="col">
                {{ $message->email_sender }}
              </div>
              <div class="col">
                {{ $message->created_at }}
              </div>
              <div class="col d-flex">
                <div class="pe-3">
                  <a class="btn btn-primary" href="{{ route('admin.messages.show', $message->id) }}">Dettagli</a>
                </div>
                <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
                  @csrf
                  @method('delete')
                  <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Sei sicuro di eliminare il messaggio')">Elimina</button>
                </form>
              </div>
            </div>   
                  
          </li>
        @endforeach
      </ul>
      <hr><br>
      


      <ul class="list-group">
        @foreach ($messageList as $message)
          <li class="list-group-item">
            <div class="accordion accordion-flush" id="accordionFlushExample">
              <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#message_{{ $message->id }}" aria-expanded="false" aria-controls="message_{{ $message->id }}">
                    <div class="container">
                      <div class="row ">
                        <div class="col-3 ps-0">
                          @if ($message['read'])
                            <i class="fa fa-envelope-open" aria-hidden="true"></i>
                          @else
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                          @endif
                          <span class="ps-3">{{ $message->apartment->title }}</span>
                        </div>
                        <div class="col-3">
                          <span class="">{{ $message->created_at }}</span>
                        </div>
                      </div>
                    </div>
                  </button>
                </h2>
                <div id="message_{{ $message->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                  <div class="accordion-body">
                    
                    <div class="row align-items-center">
                      <div class="col-3">
                        <h6>Info mittente:</h6> {{ $message->email_sender }} <br>
                      </div>
                      <div class="col position-relative">
                        <h6>Messaggio:</h6>
                        {{ $message->content }} <br>
                      </div>
                      <div class="col-2">
                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="post">
                          @csrf
                          @method('delete')
                          <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Sei sicuro di eliminare il messaggio')">Elimina</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </li>
        @endforeach
      </ul>
      </div>
  </div>

@endsection