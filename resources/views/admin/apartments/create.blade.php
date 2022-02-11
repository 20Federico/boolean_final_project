@extends('layouts.admin')

@section('title', 'Apartment - create')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Aggiungi abitazione</div>

                <div class="card-body">
                    <form method="POST" action="">
                        @csrf

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right" >Titolo Appartamento</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="title" id="title">
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
                            <label for="n_baths" class="col-md-4 col-form-label text-md-right" >Dimensioni</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="n_baths" id="n_baths" placeholder="Metri quadri">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-md-4 col-form-label text-md-right" >L'abitazione è condivisa?</label>
                            <div class="col-md-6 d-flex align-items-center">
                                
                                <div class="form-check mr-3">
                                    <input class="form-check-input" type="radio" name="share" id="flexRadioDefault1" value="true">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Condivisa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="no_share" id="flexRadioDefault2" value="false">
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Non condivisa
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