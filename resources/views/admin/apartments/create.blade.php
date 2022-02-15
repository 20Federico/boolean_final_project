@extends('layouts.admin')

@section('title', 'Apartment - create')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Aggiungi abitazione</div>

                <div class="card-body">
                    <div class="mb-4">
                        <em>I campi contrassegnati da * sono obbligatori</em>
                    </div>
                    <form action=" {{ route('admin.apartments.store') }} " method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titolo Appartamento *</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" placeholder="Titolo del tuo annuncio" required>
                                @if($errors->first('title'))
                                    <div class="alert-danger text-center">{{$errors->first('title')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="street_name" class="col-md-4 col-form-label text-md-right">Indirizzo *</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="street_name" id="street_name" placeholder="Via" value="{{ old('street_name') }}" required> 
                                @if($errors->first('street_name'))
                                    <div class="alert-danger text-center">{{$errors->first('street_name')}}</div>
                                @endif
                            </div>

                            <div class="col-md-1 pl-0">
                                <input type="text" class="form-control" name="street_number" id="street_number" placeholder="Civico" value="{{ old('street_number') }}" required>
                                @if($errors->first('street_number'))
                                    <div class="alert-danger text-center">{{$errors->first('street_number')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">CAP *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="CAP" value="{{ old('zip_code') }}" required>
                                @if($errors->first('zip_code'))
                                    <div class="alert-danger text-center">{{$errors->first('zip_code')}}</div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Città *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" id="city" placeholder="Città" value="{{ old('city') }}" required>
                                @if($errors->first('city'))
                                    <div class="alert-danger text-center">{{$errors->first('city')}}</div>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Nazione *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" id="country" placeholder="Nazione" value="{{ old('country') }}" required>
                                @if($errors->first('country'))
                                    <div class="alert-danger text-center">{{$errors->first('country')}}</div>
                                @endif
                            </div>
                        </div>
                     
                        <div class="form-group row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione *</label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control" required>{{ old('description') }}</textarea>
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
                                    {{-- <label class="custom-file-label" for="customFile">Scegli file</label> --}}
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_img" required>
                                    @if($errors->first('cover_img'))
                                        <div class="alert-danger text-center">{{$errors->first('cover_img')}}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label for="price_day" class="col-md-4 col-form-label text-md-right">Prezzo per notte (€) *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price_day" id="price_day" placeholder="€" value="{{ old('price_day') }}" required>
                                @if($errors->first('price_day'))
                                    <div class="alert-danger text-center">{{$errors->first('price_day')}}</div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label for="n_rooms" class="col-md-4 col-form-label text-md-right">Numero stanze *</label>
                            <div class="col-md-6">
                                <input type="number" min="1" class="form-control" name="n_rooms" id="n_rooms" value="{{ old('n_rooms') }}" required>
                                @if($errors->first('n_rooms'))
                                    <div class="alert-danger text-center">{{$errors->first('n_rooms')}}</div>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group row mb-3">
                            <label for="n_baths" class="col-md-4 col-form-label text-md-right">Numero bagni *</label>
                            <div class="col-md-6">
                                <input type="number" min="1" class="form-control" name="n_baths" id="n_baths" value="{{ old('n_baths') }}" required>
                                @if($errors->first('n_baths'))
                                    <div class="alert-danger text-center">{{$errors->first('n_baths')}}</div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row mb-3">
                            <label for="n_beds" class="col-md-4 col-form-label text-md-right">Numero posti letto *</label>
                            <div class="col-md-6">
                                <input type="number" min="1" class="form-control" name="n_beds" id="n_beds" value="{{ old('n_beds') }}" required>
                                @if($errors->first('n_beds'))
                                    <div class="alert-danger text-center">{{$errors->first('n_beds')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="square_meters" class="col-md-4 col-form-label text-md-right">Dimensioni (m<sup>2</sup>) *</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="square_meters" id="square_meters" placeholder="Metri quadri" value="{{ old('square_meters') }}" required>
                                @if($errors->first('square_meters'))
                                    <div class="alert-danger text-center">{{$errors->first('square_meters')}}</div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-right">L'abitazione è condivisa? *</label>
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="shared" id="flexRadioDefault1" value="1" required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Condivisa
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shared" id="flexRadioDefault2" value="0" required>
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
                            <label for="" class="col-md-4 col-form-label text-md-right">Visibilità *</label>
                            <div class="col-md-6 d-flex align-items-center">

                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Visible
                                    </label>
                                </div>



                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault2" value="0">
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
                            <label for="" class="col-md-4 col-form-label text-md-right">Servizi aggiuntivi</label>
                            <div class="col-md-6 d-flex align-items-center gap-3">

                                @foreach ($services as $service)
                                    <div class="form-check mr-4">
                                        <input class="form-check-input" type="checkbox" value="{{ $service->id }}" name="services[]">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $service->name }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Pubblica Annuncio</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript">
</script>
<script type="text/javascript">
  bkLib.onDomLoaded(nicEditors.allTextAreas);
</script> --}}
