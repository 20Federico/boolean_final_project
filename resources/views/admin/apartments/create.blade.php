@extends('layouts.admin')

@section('title', 'Apartment - create')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Aggiungi abitazione</div>

                <div class="card-body">
                    <form action=" {{ route('admin.apartments.store') }} " method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">Titolo Appartamento</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title" required>@if($errors->first('title'))
                                <div class="alert-danger">{{$errors->first('title')}}</div>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">

                            <label for="street_name" class="col-md-4 col-form-label text-md-right">Indirizzo</label>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="street_name" id="street_name" placeholder="Via"> @if($errors->first('street_name'))
                                <div class="alert-danger">{{$errors->first('street_name')}}</div>
                                @endif
                            </div>

                            <div class="col-md-1 pl-0">
                                <input type="text" class="form-control" name="street_number" id="street_number" placeholder="Civico" required>@if($errors->first('street_number'))
                                <div class="alert-danger">{{$errors->first('street_number')}}</div>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right">cap</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip_code" id="zip_code" required>
                            </div>

                        </div>
                        @if($errors->first('zip_code'))
                        <div class="alert-danger">{{$errors->first('zip_code')}}</div>
                        @endif


                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">Città</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" id="city" required>
                            </div>

                        </div>
                        @if($errors->first('city'))
                        <div class="alert-danger">{{$errors->first('city')}}</div>
                        @endif


                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">Paese</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" id="country" required>
                            </div>

                        </div>
                        @if($errors->first('country'))
                        <div class="alert-danger">{{$errors->first('country')}}</div>
                        @endif



                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">Descrizione</label>

                            <div class="col-md-6">
                                <textarea name="description" id="" cols="30" rows="10" class="form-control" required></textarea>
                            </div>

                        </div>

                        @if($errors->first('description'))
                        <div class="alert-danger">{{$errors->first('description')}}</div>
                        @endif

                        <div class="form-group row">
                            <label for="cover_img" class="col-md-4 col-form-label text-md-right">Immagine</label>

                            <div class="col-md-6">
                                {{-- <input type="file" name="cover_img" id="cover_img" class="form-control" value=""> --}}
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">Scegli file</label>
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_img" required>
                                </div>

                            </div>

                        </div>
                        @if($errors->first('cover_img'))
                        <div class="alert-danger">{{$errors->first('cover_img')}}</div>
                        @endif
                        <div class="form-group row">
                            <label for="price_day" class="col-md-4 col-form-label text-md-right">Prezzo a notte</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price_day" id="price_day" required>

                            </div>
                        </div>
                        @if($errors->first('price_day'))
                        <div class="alert-danger">{{$errors->first('price_day')}}</div>
                        @endif


                        <div class="form-group row">
                            <label for="n_rooms" class="col-md-4 col-form-label text-md-right">Numero stanze</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_rooms" id="n_rooms" required>
                            </div>

                        </div>
                        @if($errors->first('n_rooms'))
                        <div class="alert-danger">{{$errors->first('n_rooms')}}</div>
                        @endif


                        <div class="form-group row">
                            <label for="n_baths" class="col-md-4 col-form-label text-md-right">Numero Bagni</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_baths" id="n_baths" required>
                            </div>
                            @if($errors->first('n_baths'))
                            <div class="alert-danger">{{$errors->first('n_baths')}}</div>
                            @endif
                        </div>




                        <div class="form-group row">
                            <label for="n_beds" class="col-md-4 col-form-label text-md-right">Numero letti</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_beds" id="n_beds" required>
                            </div>


                            @if($errors->first('n_beds'))
                            <div class="alert-danger">{{$errors->first('n_beds')}}</div>
                            @endif
                        </div>




                        <div class="form-group row">
                            <label for="square_meters" class="col-md-4 col-form-label text-md-right">Dimensioni</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="square_meters" id="square_meters" placeholder="Metri quadri" required>
                            </div>
                            @if($errors->first('square_meters'))
                            <div class="alert-danger">{{$errors->first('square_meters')}}</div>
                            @endif
                        </div>






                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">L'abitazione è condivisa?</label>
                            <div class="col-md-6 d-flex align-items-center">

                                <div class="form-check mr-3">
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
                            <div class="alert-danger">{{$errors->first('street_number')}}</div>
                            @endif



                        </div>
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right">L'abitazione è condivisa?</label>
                            <div class="col-md-6 d-flex align-items-center">

                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault1" value="1" required>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Pubblica subito
                                    </label>
                                </div>



                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault2" value="0" required>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Pubblica in seguito
                                    </label>
                                </div>

                            </div>
                            @if($errors->first('visible'))
                            <div class="alert-danger">{{$errors->first('visible')}}</div>
                            @endif
                        </div>
                        <div class="form-group row">
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
                                <button type="submit" class="btn btn-primary">Aggiungi Abitazione</button>
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
