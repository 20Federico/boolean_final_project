<?php

use App\Address;
use App\Apartment;
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

      $apartments = Apartment::orderBy('created_at', 'DESC')->limit(15)->get('id');

      foreach ($apartments as $apartment) {
        
        $newAddress = new Address();

        $newAddress->latitude = rand(41815098, 41962825) / 1000000;
        $newAddress->longitude = rand(12383517, 12600497) / 1000000;
        $newAddress->apartment_id = $apartment->id;

        $newAddress->save();
      }
    }
}
