@extends('layouts.admin')

@section('title', 'Apartment - Edit Apartment')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12  py-3 py-md-0">
            <div class="card">
                <div class="card-header">Modifica la tua abitazione - <strong>{{$apartment->title}}</strong></div>

                <div class="card-body">
                    <div class="mb-4">
                        <em>I campi contrassegnati da <span style="color: rgb(207, 29, 29)">*</span> sono obbligatori</em>
                    </div>
                    <form action=" {{ route('admin.apartments.update', $apartment->id) }} " method="post" enctype="multipart/form-data">
                        @csrf
                        @method('patch')

                        <div class="form-group row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-right" >Titolo Appartamento <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" value="{{old('title') ?? $apartment->title}}">
                                @error('title')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="street_name" class="col-md-4 col-form-label text-md-right" >Indirizzo <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-5 mb-2 mb-md-0">
                                <input type="text" class="form-control @error('street_name') is-invalid @enderror" name="street_name" id="street_name" value="{{old('street_name') ?? $apartment->address->street_name}}">
                                @error('street_name')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                            <div class="col-md-1 ps-md-0">
                                <input type="text" class="form-control @error('street_number') is-invalid @enderror" name="street_number" id="street_number" value="{{ old('street_number') ?? $apartment->address->street_number}}">
                                @error('street_number')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">CAP <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" id="zip_code" value="{{old('zip_code') ?? $apartment->address->zip_code}}">
                                @error('zip_code')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-right" >Citt?? <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" id="city" value="{{old('city') ?? $apartment->address->city}}">
                                @error('city')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-right" >Nazione <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" id="country" value="{{old('country') ?? $apartment->address->country}}">
                                @error('country')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="7" class="form-control @error('description') is-invalid @enderror">{!! old('description') ?? $apartment->description !!}</textarea>
                                @error('description')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                          <label @click="editImgVisible = false" for="cover_img" class="col-md-4 col-form-label text-md-right">Immagine <span style="color: rgb(207, 29, 29)">*</span></label>
                          <div class="col-md-6">
                              <div class="custom-file">
                                <input @click="editImgVisible = false" type="file" class="form-control" id="cover_img" name="cover_img" value="{{ $apartment->coverImg }}">
                              </div>
                                <div v-if="editImgVisible">
                                  @if (substr($apartment->cover_img, 0, 4 ) === 'http')
                                  <img src="{{ url($apartment->cover_img) }}" class="img-thumbnail" alt="">
                                  @else    
                                  <img src="{{ asset('storage/' . $apartment->cover_img) }}" class="img-thumbnail" alt="">
                                  @endif
                                </div>
                          </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="price_day" class="col-md-4 col-form-label text-md-right" >Prezzo per notte (???) <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('price_day') is-invalid @enderror" name="price_day" id="price_day" value="{{old('price_day') ?? $apartment->price_day}}">
                                @error('price_day')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="n_rooms" class="col-md-4 col-form-label text-md-right" >Numero stanze <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('n_rooms') is-invalid @enderror" name="n_rooms" id="n_rooms" value="{{old('n_rooms') ?? $apartment->n_rooms}}"> 
                                @error('n_rooms')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror                             
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="n_baths" class="col-md-4 col-form-label text-md-right" >Numero bagni <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('n_baths') is-invalid @enderror" name="n_baths" id="n_baths" value="{{old('n_baths') ??  $apartment->n_baths}}">
                                @error('n_baths')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="n_beds" class="col-md-4 col-form-label text-md-right" >Numero posti letto <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('n_beds') is-invalid @enderror" name="n_beds" id="n_beds" value="{{old('n_beds') ??  $apartment->n_beds}}">
                                @error('n_beds')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="square_meters" class="col-md-4 col-form-label text-md-right" >Dimensioni (m<sup>2</sup>) <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6">
                                <input type="number" class="form-control @error('square_meters') is-invalid @enderror" name="square_meters" id="square_meters" value="{{old('square_meters') ??  $apartment->square_meters}}">
                                @error('square_meters')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label class="col-md-4 col-form-label text-md-right" >L'abitazione ?? condivisa? <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check me-3">
                                    <input class="form-check-input @error('shared') is-invalid @enderror" type="radio" name="shared" id="flexRadioDefault1" value="1"   @if($apartment->shared == 1) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Condivisa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('shared') is-invalid @enderror" type="radio" name="shared" id="flexRadioDefault2" value="0"   @if($apartment->shared == 0) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Non condivisa
                                    </label>
                                </div>
                            </div>
                            @error('shared')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                        </div>
                        <div class="form-group row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-right" >Visibilit?? <span style="color: rgb(207, 29, 29)">*</span></label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault1" value="1" @if($apartment->visible == 1) checked @endif>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Visibile
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault2" value="0"  @if($apartment->visible == 0) checked @endif>
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
                            <div class="col-md-6 d-flex flex-wrap align-items-center gap-3" style="text-transform: capitalize">
                                
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