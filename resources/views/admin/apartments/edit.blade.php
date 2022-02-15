@extends('layouts.admin')

@section('title', 'Apartment - Edit Apartment')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modifica la tua abitazione - <strong>{{$apartment->title}}</strong></div>

                <div class="card-body">
                    <form action=" {{ route('admin.apartments.update', $apartment->id) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right" >Titolo Appartamento</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" value="{{$apartment->title}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street_name" class="col-md-4 col-form-label text-md-right" >Indirizzo</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="street_name" id="street_name" value="{{$apartment->address->street_name}}">
                            </div>
                            <div class="col-md-1 pl-0">
                                <input type="text" class="form-control" name="street_number" id="street_number" value="{{$apartment->address->street_number}}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">CAP</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{$apartment->address->zip_code}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right" >Città</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" id="city" value="{{$apartment->address->city}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right" >Paese</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" id="country" value="{{$apartment->address->country}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $apartment->description!!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cover_img" class="col-md-4 col-form-label text-md-right">Immagine</label>

                            <div class="col-md-6">
                                {{-- <input type="file" name="cover_img" id="cover_img" class="form-control" value=""> --}}
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">{{ $apartment->coverImg }}</label>
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_img" value="{{ $apartment->coverImg }}">
                                  </div>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="price_day" class="col-md-4 col-form-label text-md-right" >Prezzo a notte</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price_day" id="price_day" value="{{$apartment->price_day}}">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="n_rooms" class="col-md-4 col-form-label text-md-right" >Numero stanze</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_rooms" id="n_rooms" value="{{$apartment->n_rooms}}">                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="n_baths" class="col-md-4 col-form-label text-md-right" >Numero Bagni</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_baths" id="n_baths" value="{{$apartment->n_baths}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="n_beds" class="col-md-4 col-form-label text-md-right" >Numero letti</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_beds" id="n_beds" value="{{$apartment->n_beds}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="square_meters" class="col-md-4 col-form-label text-md-right" >Dimensioni</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="square_meters" id="square_meters" value="{{$apartment->square_meters}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right" >L'abitazione è condivisa?</label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="shared" id="flexRadioDefault1" value="1" @if($apartment->shared ===1) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Condivisa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shared" id="flexRadioDefault2" value="0" @if($apartment->shared ===0) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Non condivisa
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right" >L'abitazione è condivisa?</label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault1" value="1" @if($apartment->visible ===1) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Pubblica subito
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault2" value="0"  @if($apartment->visible ===0) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Pubblica in seguito
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right" >Servizi aggiuntivi</label>
                            <div class="col-md-6 d-flex align-items-center gap-3">
                                
                                @foreach ($services as $service)
                                    
                                <div class="form-check mr-4">
                                    <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="services[]" @if ($apartment->services->contains($service)) checked
                                    @endif>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{ $service->name }}
                                    </label>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Aggiungi Abitazione</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script> --}}
@endsection