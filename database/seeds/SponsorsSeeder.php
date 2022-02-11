<?php

use App\Sponsor;
use Illuminate\Database\Seeder;

class SponsorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $sponsors = [
        [
          'price'=>2.99,
          'duration'=>24
        ],
        [
          'price'=>5.99,
          'duration'=>72
        ],
        [
          'price'=>9.99,
          'duration'=>144
        ],
      ];

      foreach ($sponsors as $sponsor) {

        $new_sponsor = new Sponsor();
        $new_sponsor->price_euro = $sponsor['price'];
        $new_sponsor->duration_hours = $sponsor['duration'];

        $new_sponsor->save();
      }


    }
}
