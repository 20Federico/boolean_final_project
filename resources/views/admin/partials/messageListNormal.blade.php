
          <li class="list-group-item {{$message->read == false ? 'list-group-item-secondary' : ''}}">
            <div class="row row-cols-1 row-cols-md-4 align-items-center">
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
              <div class="col mb-1 mb-md-0">
                {{ $message->created_at }}
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
                  
