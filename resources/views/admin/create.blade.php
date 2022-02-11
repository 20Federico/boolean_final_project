@extends('layouts.app')

@section('content')
<div class="container">

    <form action=" " method="post">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label" >Titolo Appartamento</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="cover_img" class="form-label">Immagine</label>
            <input type="file" name="cover_img" id="cover_img" class="form-control" value="">
        </div>
        <div class="mb-3">
            <label for="price_day" class="form-label" >Prezzo a notte</label>
            <input type="text" class="form-control" name="price_day" id="price_day">
        </div>
        <div class="mb-3">
            <label for="n_rooms" class="form-label" >Numero stanze</label>
            <input type="text" class="form-control" name="n_rooms" id="n_rooms">
        </div>
        <div class="mb-3">
            <label for="n_baths" class="form-label" >Numero Bagni</label>
            <input type="text" class="form-control" name="n_baths" id="n_baths">
        </div>
        <div class="mb-3">
            <label for="n_baths" class="form-label" >Dimensioni (Metri quadri)</label>
            <input type="text" class="form-control" name="n_baths" id="n_baths">
        </div>
        <div class="mb-3">
            <label for="n_baths" class="form-label" >Casa condivisa</label>
            <select name="cars" id="cars">
                <option value="true">Si</option>
                <option value="false">No</option>
              </select>
        </div>
    
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection