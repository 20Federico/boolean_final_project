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
          'street_name'=>'viale di Trastevere',
          'street_number'=>131,
          'city'=>'Roma',
          'country'=>'Italia',
          'zip_code'=>00153,
          'latitude'=>41.885927,
          'longitude'=>12.471589
        ],
      ];

      foreach ($addresses as $address) {
        $newAddress = new Address();

        $newAddress->street_name = $address['street_name'];
        $newAddress->street_number = $address['street_number'];
        $newAddress->city = $address['city'];
        $newAddress->country = $address['country'];
        $newAddress->zip_code = $address['zip_code'];
        $newAddress->latitude = $address['latitude'];
        $newAddress->longitude = $address['longitude'];

        $newAddress->save();
      }
    }
}
