@extends('layouts.admin')

@section('title', 'Sponsors')

@section('content')
    <div>
        <h1 class="mb-5">Metti in evidenza i tuoi annunci</h1>
    </div>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Sponsors</div>
    
                    <div class="card-body">
                        <div class="row row-cols-3">

                            @foreach($sponsorList as $sponsor)
                                <div class="col">
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">Pacchetto {{$sponsor->duration_hours}}H</h5>
                                        <h6 class="card-subtitle mb-2 text-muted mb-3">Sponsorizza il tuo annuncio per {{$sponsor->duration_hours}} ore!</h6>
                                        <h5 class="mb-4">Prezzo: {{$sponsor->price_euro}} €</h5>
                                        {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                                        <div class="d-flex justify-content-between">
                                            <a href="{{route('admin.sponsors.show', $sponsor->id)}}"><button type="button" class="btn btn-success"> Dettagli </button> </a>
                                            <a href="#"><button type="button" class="btn btn-primary d-flex"> Acquista  <i class="material-icons ms-2">credit_card</i></button> </a>                                      
                                        </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection