<li class="list-group-item {{$message->read == false ? 'list-group-item-secondary' : ''}}">
    <div class="accordion accordion-flush" id="accordionFlushExample">
      <div class="accordion-item bg-transparent">
        <h2 class="accordion-header" id="flush-headingOne">
            
          <button href="{{ route("admin.messages.show", $message->id) }}" class="accordion-button collapsed px-0 bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#message_{{ $message->id }}" aria-expanded="false" aria-controls="message_{{ $message->id }}">
            <div class="container bg-transparent">
              <div class="row ">
                <div class="col-md-3 ps-0">
                  @if ($message['read'])
                    <i class="fa fa-envelope-open d-none d-md-inline" aria-hidden="true"></i>
                    <span class="px-0 text-capitalize">{{ $message->apartment->title }}</span>
                    @else
                    <i class="fa fa-envelope d-none d-md-inline" aria-hidden="true"></i>
                    <span class="px-0 text-capitalize fw-bold">{{ $message->apartment->title }}</span>
                  @endif
                </div>
                <div class="col-md-3 ps-0">
                  {{ $message->email_sender }}
                </div>
                <div class="col-md-2 ps-0">
                  <span class="text-capitalize">
                    @php
                        echo date_format($message->created_at, 'd/m/Y');
                    @endphp  
                  </span>
                </div>
              </div>
            </div>
          </button>
        </h2>
        <div id="message_{{ $message->id }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
          <div class="accordion-body">
            
            <div class="row align-items-center">
              <div class="col-md-3 mb-2">
                <h6 class="mb-0">Info mittente:</h6> {{ $message->email_sender }} <br>
              </div>
              <div class="col mb-3">
                <h6 class="mb-0">Messaggio:</h6>
                {{ $message->content }} <br>
              </div>
              <div class="col-md-2 text-end">
                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{ $message->id }}">
                  Elimina
                </button>
                @include('admin.partials.modal.delete_modal')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </li>