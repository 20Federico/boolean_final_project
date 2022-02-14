<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $surnames = [
        'rossi', 'Verdi', 'Bianchi', 'Canepa', 'Leica', 'Murru', 'Nora', 'Yoda', 'Loda', 'Soda'
      ];

      for ($i=0; $i < 5 ; $i++) { 

        $newUser = new User();

        $randUserName = 'user';
        $alreadyExists = User::where('name', $randUserName)->first();
        $counter = 1;

        while ($alreadyExists) {
          $newUserName = 'user#' . $counter;

          $alreadyExists = User::where('name', $newUserName)->first();

          if (!$alreadyExists) {
            $randUserName = $newUserName; 
          } else {
            $counter++;
          }
        }

        $newUser->name = $randUserName;
        $newUser->surname = $surnames[rand(0, count($surnames) - 1)];
        $newUser->birth_date = rand(1950, 2003) . '-' . str_pad(rand(1, 12), 2, '0', STR_PAD_LEFT) . '-' . str_pad(rand(1, 28), 2, '0', STR_PAD_LEFT);
        $newUser->email = $randUserName . '@gmail.com';
        $newUser->password = 'password';

        $newUser->save();
      }
    }
}
