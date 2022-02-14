<?php

use App\Address;
use Illuminate\Database\Seeder;

class AddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $addresses = [
        [
          'latitude'=>41.885927,
          'longitude'=>12.471589,
          'apartment_id'=>14
        ],
        [
          'latitude'=>41.865518,
          'longitude'=>12.497436,
          'apartment_id'=>15
        ],
        [
          'latitude'=>41.874300,
          'longitude'=>12.486606,
          'apartment_id'=>16
        ],
        [
          'latitude'=>41.876519,
          'longitude'=>12.463625,
          'apartment_id'=>23
        ],
        [
          'latitude'=>41.883972,
          'longitude'=>12.457821,
          'apartment_id'=>17
        ],
        [
          'latitude'=>41.891410,
          'longitude'=>12.492563,
          'apartment_id'=>18
        ],
        [
          'latitude'=>41.836743,
          'longitude'=>12.486700,
          'apartment_id'=>19
        ],
        [
          'latitude'=>41.943763,
          'longitude'=>12.541150,
          'apartment_id'=>20
        ],
        [
          'latitude'=>41.969856,
          'longitude'=>12.436043,
          'apartment_id'=>21
        ],
        [
          'latitude'=>41.968584,
          'longitude'=>12.437293,
          'apartment_id'=>22
        ],
      ];

      foreach ($addresses as $address) {
        $newAddress = new Address();

        $newAddress->latitude = $address['latitude'];
        $newAddress->longitude = $address['longitude'];
        $newAddress->apartment_id = $address['apartment_id'];

        $newAddress->save();
      }
    }
}
