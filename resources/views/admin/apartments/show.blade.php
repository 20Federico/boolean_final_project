@extends('layouts.admin')

{{-- use illuminate --}}

@section('title', 'Apartment - show')

@section('content')

<div class="main-container m-auto h-50 w-100">
    <!-- immagine casa -->
    <div class="housepic-container w-100 d-flex justify-content-center">
        <div class="img-container my-carousel position-relative">
            <img src="{{ asset('storage/app/public/apartments/foto_casa_prova.jpg') }}" class="img-fluid" alt="">
        </div>
    </div>
    <!-- nav secondaria -->
        <nav class="border-bottom w-100 mb-4">
            <div class="sub-nav container">
                <ul class="d-flex list-unstyled">
                    <li class="d-flex"><a class="p-4">Overview</a></li>
                    <li class="d-flex"><a class="p-4">Overview</a></li>
                    <li class="d-flex"><a class="p-4">Overview</a></li>
                </ul>
            </div>
        </nav>
    
    <!-- colonna SX contenuto -->
        <div class="container">
            <div class="row ms-0">
                <!-- inizio colonna sx -->
                <div class="col-7 pe-5">
                    <div class="tag"></div>

                    <div class="lead display-5 pb-4">{{ $apartment->title }}</div>
                    <!-- sottocontainer -->
                    <div class="ms-4">

                        <p>{{ $apartment->address->street_name }}</p>
                        <!-- posti casa -->
                        <div class="posti-casa mt-5">
                            <ul class="d-flex ps-0 ">

                                <li class="me-3 pb-5">
                                    <span>{{ $apartment->n_rooms }} Camere</span>
                                
                                </li>

                                <li class="me-3 pb-5">
                                    <span>{{ $apartment->n_beds }}</span>
                                    Letti
                                </li>

                                <li class="me-3 pb-5">
                                    <span>{{ $apartment->price_day }}$</span>
                                    /notte
                                </li>
{{-- @dd($apartment) --}}
                                <li class="me-3 pb-5">
                                    <span>{{ $apartment->square_meter }} M.q.</span>
                                </li>

                            </ul>


                            <!-- overview -->
                            <section class="pb-5">
                                <h3>Overview</h3>
                                <hr>
                                <p class="my-lh ps-3">{{ $apartment->description }}</p>
                                
                                
                                
                            </section>

                            {{-- @dd($apartment) --}}
                            <section class="pb-5">
                                <h3>Features & Amenities</h3>
                                <hr>
                                <ul>
                                    <li class="my-lh"><span class="ps-3">{{ $apartment->title }}</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    

                                </ul>
                            </section>

                            <section class="pb-5">
                                <h3>Bedding</h3>
                                <hr>
                                <ul>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    

                                </ul>
                            </section>

                            <section class="pb-5">
                                <h3>Things to Know & Policy</h3>
                                <hr>
                                <ul>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    <li class="my-lh"><span class="ps-3">description</span></li>
                                    

                                </ul>
                            </section>

                            <section class="pb-5">
                                <h3>Map & Location</h3>
                                <hr>
                                <map name=""></map>
                            </section>
                            
                            
                        </div>
                    </div>

                </div>
                <div class="col-5">
                    <aside>

                    </aside>
                </div>
            
@endsection