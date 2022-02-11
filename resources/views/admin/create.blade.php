@extends('layouts.app')

@section('content')
<div class="container">

    <form action=" " method="post">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label" >Titolo Appartamento</label>
            <input type="text" class="form-control" name="title" id="field_title">
            <br>
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">serie</label>
            <input type="texarea" class="form-control" name="series" id="field_series">
            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
            
        </div>
    
    <button type="reset" class="btn btn-primary">Reset</button>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
@endsection