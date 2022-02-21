<li class="list-group-item {{$message->read == false ? 'list-group-item-secondary' : ''}}">
  <div class="row row-cols-1 row-cols-md-3 align-items-center">
    <div class="col">
      @if ($message->read == false)
        <i class="fa fa-envelope me-1" aria-hidden="true"></i>
      @else
        <i class="fa fa-envelope-open me-1" aria-hidden="true"></i>
      @endif
      
      {{ $message->email_sender }}
    </div>
    <div class="col mb-1 mb-md-0">
      <span>Ricevuto: 
        @php
          echo date_format($message->created_at, 'd/m/Y');
        @endphp
      </span>
    </div>
    <div class="col d-flex justify-content-center">
      <div class="pe-3">
        <a class="btn btn-primary" href="{{ route('admin.messages.show', $message->id) }}">Dettagli</a>
      </div>
      <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $message->id }}">
        Elimina
      </button>
      @include('admin.partials.modal.delete_modal')
    </div>
  </div>
</li>