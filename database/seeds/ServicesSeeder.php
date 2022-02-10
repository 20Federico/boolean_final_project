<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $services = ['Wi-fi', 'posto macchina', 'piscina', 'portineria', 'sauna', 'colazione inclusa', 'vista mare'];

      foreach ($services as $service) {
        $newService = new Service();

        $newService->name = $service;
        $newService->save();
      }
    }
}
