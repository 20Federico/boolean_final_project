<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $names = [
        'Federico', 'Riccardo', 'Enrico', 'Timur', 'Eduardo', 'Sara', 'Luisa', 'Lara', 'Davide', 'Roberto', 'Alberto', 'Giacomo', 'Chiara', 'Camilla', 'Bob', 'Marco', 'Toni', 'Mauro', 'Luigia'
      ];

      $surnames = [
        'rossi', 'Verdi', 'Bianchi', 'Canepa', 'Leica', 'Murru', 'Nora', 'Yoda', 'Loda', 'Soda', 'Coda', 'Toga', 'Franzetti', 'Casetta', 'Zei', 'Casadei', 'Biga', 'Diga', 'Riga', 'Giacometti'
      ];

      for ($i=0; $i < 10 ; $i++) { 

        $newUser = new User();

        $randName = $names[rand(0, count($names) - 1)];
        $randSurame = $surnames[rand(0, count($surnames) - 1)];

        $randEmail = strtolower($randName) . strtolower($randSurame) . '@gmail.com';
        $alreadyExists = User::where('email', $randEmail)->first();
        $counter = 1;

        while ($alreadyExists) {
          $newEmail = strtolower($randName) . strtolower($randSurame) . $counter . '@gmail.com';

          $alreadyExists = User::where('email', $newEmail)->first();

          if (!$alreadyExists) {
            $randEmail = $newEmail; 
          } else {
            $counter++;
          }
        }

        $newUser->name = $randName;
        $newUser->surname = $randSurame;
        $newUser->birth_date = rand(1950, 2003) . '-' . str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT);
        $newUser->email = $randEmail;
        $newUser->password = Hash::make('password');
        
        $newUser->save();
      }
    }
}
