@extends('layouts.admin')

@section('title', 'Apartment - Edit Apartment')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modifica la tua abitazione - <strong>{{$apartment->title}}</strong></div>

                <div class="card-body">
                    <div class="mb-4">
                        <em>I campi contrassegnati da * sono obbligatori</em>
                    </div>
                    <form action=" {{ route('admin.apartments.update', $apartment->id) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-right" >Titolo Appartamento *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" value="{{$apartment->title}}">
                                @if($errors->first('title'))
                                    <div class="alert-danger text-center">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="street_name" class="col-md-4 col-form-label text-md-right" >Indirizzo *</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="street_name" id="street_name" value="{{$apartment->address->street_name}}">
                                @if($errors->first('street_name'))
                                    <div class="alert-danger text-center">{{$errors->first('street_name')}}</div>
                                @endif
                            </div>
                            <div class="col-md-1 pl-0">
                                <input type="text" class="form-control" name="street_number" id="street_number" value="{{$apartment->address->street_number}}">
                                @if($errors->first('street_number'))
                                    <div class="alert-danger text-center">{{$errors->first('street_number')}}</div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">CAP *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip_code" id="zip_code" value="{{$apartment->address->zip_code}}">
                                @if($errors->first('zip_code'))
                                    <div class="alert-danger text-center">{{$errors->first('zip_code')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-right" >Città *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" id="city" value="{{$apartment->address->city}}">
                                @if($errors->first('city'))
                                    <div class="alert-danger text-center">{{$errors->first('city')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-right" >Nazione *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" id="country" value="{{$apartment->address->country}}">
                                @if($errors->first('country'))
                                    <div class="alert-danger text-center">{{$errors->first('country')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione *</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control">{!! $apartment->description!!}</textarea>
                                @if($errors->first('description'))
                                    <div class="alert-danger text-center">{{$errors->first('description')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="cover_img" class="col-md-4 col-form-label text-md-right">Immagine *</label>
                            <div class="col-md-6">
                                {{-- <input type="file" name="cover_img" id="cover_img" class="form-control" value=""> --}}
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">{{ $apartment->coverImg }}</label>
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_img" value="{{ $apartment->coverImg }}">
                                    @if($errors->first('cover_img'))
                                        <div class="alert-danger text-center">{{$errors->first('cover_img')}}</div>
                                    @endif
                                  </div>
                            </div>
                            
                        </div>

                        <div class="form-group row mb-3">
                            <label for="price_day" class="col-md-4 col-form-label text-md-right" >Prezzo per notte (€) *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price_day" id="price_day" value="{{$apartment->price_day}}">
                                @if($errors->first('price_day'))
                                    <div class="alert-danger text-center">{{$errors->first('price_day')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="n_rooms" class="col-md-4 col-form-label text-md-right" >Numero stanze *</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="n_rooms" min="1" id="n_rooms" value="{{$apartment->n_rooms}}"> 
                                @if($errors->first('n_rooms'))
                                    <div class="alert-danger text-center">{{$errors->first('n_rooms')}}</div>
                                @endif                               
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="n_baths" class="col-md-4 col-form-label text-md-right" >Numero bagni *</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="n_baths" min="1" id="n_baths" value="{{$apartment->n_baths}}">
                                @if($errors->first('n_baths'))
                                    <div class="alert-danger text-center">{{$errors->first('n_baths')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="n_beds" class="col-md-4 col-form-label text-md-right" >Numero posti letto *</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="n_beds" min="1" id="n_beds" value="{{$apartment->n_beds}}">
                                @if($errors->first('n_beds'))
                                    <div class="alert-danger text-center">{{$errors->first('n_beds')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="square_meters" class="col-md-4 col-form-label text-md-right" >Dimensioni (m<sup>2</sup>) *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="square_meters" id="square_meters" value="{{$apartment->square_meters}}">
                                @if($errors->first('square_meters'))
                                    <div class="alert-danger text-center">{{$errors->first('square_meters')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-right" >L'abitazione è condivisa? *</label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check me-3">
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
                            @if($errors->first('shared'))
                                <div class="alert-danger text-center">{{$errors->first('shared')}}</div>
                            @endif
                        </div>
                        <div class="form-group row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-right" >Visibilità *</label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault1" value="1" @if($apartment->visible ===1) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Visibile
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault2" value="0"  @if($apartment->visible ===0) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nascosto
                                    </label>
                                </div>
                            </div>
                            @if($errors->first('visible'))
                                <div class="alert-danger text-center">{{$errors->first('visible')}}</div>
                            @endif
                        </div>
                        <div class="form-group row mb-4">
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
                                <button type="submit" class="btn btn-primary">Modifica Annuncio</button>
                                
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