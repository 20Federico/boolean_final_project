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
      $users = [
        [
          'name'=>'Mario',
          'surname'=>'Rossi',
          'birth_date'=>'1965-04-25',
          'email'=>'mario.rossi@gmail.com',
          'password'=>'password'
        ],
        [
          'name'=>'Giuseppe',
          'surname'=>'Verdi',
          'birth_date'=>'1966-04-25',
          'email'=>'giuseppe.verdi@gmail.com',
          'password'=>'password'
        ],
        [
          'name'=>'Maria',
          'surname'=>'Rossi',
          'birth_date'=>'2000-04-25',
          'email'=>'maria.rossi@gmail.com',
          'password'=>'password'
        ],
        [
          'name'=>'Mariuccio',
          'surname'=>'Rossi',
          'birth_date'=>'1965-07-25',
          'email'=>'mariuccio.rossi@gmail.com',
          'password'=>'password'
        ],
        [
          'name'=>'Simone',
          'surname'=>'Rossi',
          'birth_date'=>'1965-04-28',
          'email'=>'simone.rossi@gmail.com',
          'password'=>'password'
        ],
      ];

      foreach ($users as $user) {
        $newUser = new User();

        $newUser->name = $user['name'];
        $newUser->surname = $user['surname'];
        $newUser->birth_date = $user['birth_date'];
        $newUser->email = $user['email'];
        $newUser->password = $user['password'];

        $newUser->save();
      }
    }
}
