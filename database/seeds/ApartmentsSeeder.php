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
          'price_day'=>43,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>1,
        ],
        [
          'title'=>'casa tua',
          'description'=>'va che bella casa ',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>34,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>2,
        ],
        [
          'title'=>'casa con soppalco',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>340,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>6,
        ],
        [
          'title'=>'villa a schiera',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>78,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>7,
        ],
        [
          'title'=>'bungalow',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>24,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>8,
        ],
        [
          'title'=>'calda igloo',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>999,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>9,
        ],
        [
          'title'=>'piscina con casa',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>3,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>10,
        ],
        [
          'title'=>'villa da riccone',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>3400,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>2,
        ],
        [
          'title'=>'magione immersa nella natura',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>56,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>2,
        ],
        [
          'title'=>'casetta sull\'albero',
          'description'=>'va che bella casa',
          'cover_img'=>'dfrgsedrg',
          'price_day'=>1,
          'n_rooms'=>5,
          'n_baths'=>1,
          'n_beds'=>2,
          'square_meters'=>60,
          'shared'=> false,
          'user_id'=>2,
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

        $newApartment->save();
      }

    }
}
