@extends('layouts.admin')

@section('title', 'Messagio')

@section('content')
    
    <div class="card">
        <div class="card-header">
            <div class="">
                <div class="row row-cols-md-2 row-cols-1 justify-content-between">
                    <div class="col col-md-7 mb-2 mb-md-0">
                        <h5 class="m-0">
                            Appartamento: {{ $message->apartment->title }}
                        </h5> 

                    </div>
                    <div class="col col-md-3 text-md-end">
                        @php
                            $text = "Ricevuto il: ";
                            $pippo = date_format($message->created_at, 'd/m/Y');
                            echo "<h6 class='m-0'>" . $text . $pippo . "</h6>";
                        @endphp
                    </div>
                </div>

            </div>
        </div>
        <div class="card-body">
          <ul class="list-group">
            <ul class="list-group">
              <li class="list-group-item">
                <div><strong>Inviato da:</strong> 
                    {{ $message->email_sender }}
                </div>
                <div>
                    <strong>contenuto:</strong> 
                    <p>{{ $message->content }}</p>
                </div>
             
                <a class="btn btn-primary" href="#" onclick="GoBackWithRefresh();return false;">torna ai messaggi</a>
                
              </li>
            </ul>
          </ul>
        </div>
    </div>
    <script>
        function GoBackWithRefresh(event) {
            if ('referrer' in document) {
                window.location = document.referrer;
                /* OR */
                //location.replace(document.referrer);
            } else {
                window.history.back();
            }
        }
    </script>
@endsection