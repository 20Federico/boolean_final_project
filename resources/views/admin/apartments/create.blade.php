@extends('layouts.admin')

@section('title', 'Apartment - create')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aggiungi abitazione</div>

                <div class="card-body">
                    <form action=" {{ route('admin.apartments.store') }} " method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right" >Titolo Appartamento</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="street_name" class="col-md-4 col-form-label text-md-right" >Indirizzo</label>
                            <div class="col-md-4">
                                <input type="text" class="form-control" name="street_name" id="street_name" placeholder="Via">
                            </div>
                            <div class="col-md-2 pl-0">
                                <input type="text" class="form-control" name="street_number" id="price_day" placeholder="Civico">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-right" >cap</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="zip_code" id="zip_code">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right" >Città</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" id="city">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right" >Paese</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="country" id="country">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descrizione</label>

                            <div class="col-md-6">
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cover_img" class="col-md-4 col-form-label text-md-right">Immagine</label>

                            <div class="col-md-6">
                                {{-- <input type="file" name="cover_img" id="cover_img" class="form-control" value=""> --}}
                                <div class="custom-file">
                                    <label class="custom-file-label" for="customFile">Scegli file</label>
                                    <input type="file" class="custom-file-input" id="customFile" name="cover_img">
                                  </div>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <label for="price_day" class="col-md-4 col-form-label text-md-right" >Prezzo a notte</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="price_day" id="price_day">
                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="n_rooms" class="col-md-4 col-form-label text-md-right" >Numero stanze</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_rooms" id="n_rooms">                                
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="n_baths" class="col-md-4 col-form-label text-md-right" >Numero Bagni</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_baths" id="n_baths">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="n_beds" class="col-md-4 col-form-label text-md-right" >Numero letti</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_beds" id="n_beds">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="square_meters" class="col-md-4 col-form-label text-md-right" >Dimensioni</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="square_meters" id="square_meters" placeholder="Metri quadri">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right" >L'abitazione è condivisa?</label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="shared" id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Condivisa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="shared" id="flexRadioDefault2" value="0">
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
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault1" value="1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Pubblica subito
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="visible" id="flexRadioDefault2" value="0">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Pubblica in seguito
                                    </label>
                                </div>
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