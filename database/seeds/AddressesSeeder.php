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
          'longitude'=>12.471589
        ],
        [
          'latitude'=>41.865518,
          'longitude'=>12.497436
        ],
        [
          'latitude'=>41.874300,
          'longitude'=>12.486606
        ],
        [
          'latitude'=>41.876519,
          'longitude'=>12.463625
        ],
        [
          'latitude'=>41.883972,
          'longitude'=>12.457821
        ],
        [
          'latitude'=>41.891410,
          'longitude'=>12.492563
        ],
        [
          'latitude'=>41.836743,
          'longitude'=>12.486700
        ],
        [
          'latitude'=>41.943763,
          'longitude'=>12.541150
        ],
        [
          'latitude'=>41.969856,
          'longitude'=>12.436043
        ],
        [
          'latitude'=>41.968584,
          'longitude'=>12.437293
        ],
      ];

      foreach ($addresses as $address) {
        $newAddress = new Address();

        $newAddress->latitude = $address['latitude'];
        $newAddress->longitude = $address['longitude'];

        $newAddress->save();
      }
    }
}
