<!DOCTYPE html>
<html class='use-all-space'>
<head>
    <meta http-equiv='X-UA-Compatible' content='IE=Edge' />
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no' />
    <title>SearchBox</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel='stylesheet' type='text/css' href='https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox.css' />
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.1.2-public-preview.15/services/services-web.min.js"></script>
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js"></script>
</head>

<body>

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aggiungi abitazione</div>

                    <div class="card-body">
                        <form method="POST" action="">
                            @csrf

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Titolo Appartamento</label>

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
                                <label for="price_day" class="col-md-4 col-form-label text-md-right">Prezzo a notte</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="price_day" id="price_day">

                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="n_rooms" class="col-md-4 col-form-label text-md-right">Numero stanze</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="n_rooms" id="n_rooms">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="n_baths" class="col-md-4 col-form-label text-md-right">Numero Bagni</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="n_baths" id="n_baths">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="n_baths" class="col-md-4 col-form-label text-md-right">Dimensioni</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="n_baths" id="n_baths" placeholder="Metri quadri">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="" class="col-md-4 col-form-label text-md-right">L'abitazione è condivisa?</label>
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

                            <h1>Inserisci indirizzo completo</h1>
                            <div id="searchbar" class="py-5"></div>
                            <div id="form_address" class="d-none">

                                <div class="form-group row">
                                    <label for="street_name" class="col-md-4 col-form-label text-md-right">Street name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="street_name" id="street_name" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="street_number" class="col-md-4 col-form-label text-md-right">Street Number</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="street_name" id="street_number" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-md-4 col-form-label text-md-right">City</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="street_number" id="city" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="col-md-4 col-form-label text-md-right">Country</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="country" id="country" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="zip_code" class="col-md-4 col-form-label text-md-right">Postal Code</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="zip_code" id="zip_code" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="latitude" class="col-md-4 col-form-label text-md-right">Latitude</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="latitude" id="latitude" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="longitude" class="col-md-4 col-form-label text-md-right">Longitude</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="longitude" id="longitude" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">

                                </div>

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
    <script>
        var options = {
            searchOptions: {
                key: 'hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo'
                , language: 'en-GB'
                , limit: 5
            }
            , autocompleteOptions: {
                key: 'hwUAMJjGlcfAD2Yd3w1owWJqbrrLpfoo'
                , language: 'en-GB'
            }

        };

        var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
        var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
        var searchbar = document.getElementById('searchbar');
        searchbar.append(searchBoxHTML);




        var address_form = document.getElementById('form_address');
        var street_name = document.getElementById('street_name');
        var street_number = document.getElementById('street_number');
        var city = document.getElementById('city');
        var country = document.getElementById('country');
        var zip_code = document.getElementById('zip_code');
        var latitude = document.getElementById('latitude');
        var longitude = document.getElementById('longitude');




        ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {

            this.address_form.classList.remove('d-none');

            this.street_name.value = data.data.result.address.streetName ? data.data.result.address.streetName : null;
            this.street_number.value = parseInt(data.data.result.address.streetNumber) ? parseInt(data.data.result.address.streetNumber) : null;
            this.city.value = data.data.result.address.municipality ? data.data.result.address.municipality : null;
            this.country.value = data.data.result.address.country ? data.data.result.address.country : null;
            this.zip_code.value = data.data.result.address.postalCode ? data.data.result.address.postalCode : null;
            this.latitude.value = data.data.result.position.lat ? data.data.result.position.lat : null;
            this.longitude.value = data.data.result.position.lng ? data.data.result.position.lng : null;



            this.street_name.placeholder = data.data.result.address.streetName ? data.data.result.address.streetName : '';
            this.street_number.placeholder = parseInt(data.data.result.address.streetNumber) ? parseInt(data.data.result.address.streetNumber) : '';
            this.city.placeholder = data.data.result.address.municipality ? data.data.result.address.municipality : '';
            this.country.placeholder = data.data.result.address.country ? data.data.result.address.country : '';
            this.zip_code.placeholder = data.data.result.address.postalCode ? data.data.result.address.postalCode : '';
            this.latitude.placeholder = data.data.result.position.lat ? data.data.result.position.lat : '';
            this.longitude.placeholder = data.data.result.position.lng ? data.data.result.position.lng : '';
        });


        ttSearchBox.on('tomtom.searchbox.resultscleared', function() {
            this.address_form.classList.add('d-none');

            this.street_name.value = null;
            this.street_number.value = null;
            this.city.value = null;
            this.country.value = null;
            this.zip_code.value = null;
            this.latitude.value = null;
            this.longitude.value = null;



            this.street_name.placeholder = '';
            this.street_number.placeholder = '';
            this.city.placeholder = '';
            this.country.placeholder = '';
            this.zip_code.placeholder = '';
            this.latitude.placeholder = '';
            this.longitude.placeholder = '';
        });

    </script>

</body>

</html>
