<?php

use App\Apartment;
use Illuminate\Database\Seeder;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $apartments = [
        [
          'title'=>'casa di campagna',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>34,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>2,
          'address_id'=>1
        ],
      ];

      foreach ($apartments as $apartment) {
        $newApartment = new Apartment();

        $newApartment->title = $apartment['title'];
        $newApartment->description = $apartment['description'];
        $newApartment->cover_img = $apartment['cover_img'];
        $newApartment->price_day = $apartment['price_day'];
        $newApartment->n_rooms = $apartment['n_rooms'];
        $newApartment->n_baths = $apartment['n_baths'];
        $newApartment->n_beds = $apartment['n_beds'];
        $newApartment->square_meters = $apartment['square_meters'];
        $newApartment->shared = $apartment['shared'];
        $newApartment->user_id = $apartment['user_id'];
        $newApartment->address_id = $apartment['address_id'];

        $newApartment->save();
      }

    }
}
