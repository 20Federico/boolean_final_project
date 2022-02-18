<?php

use App\Apartment;
use App\Message;
use Illuminate\Database\Seeder;

class MessagesSeeder extends Seeder 
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

      $msgGreeting = [
        'Buongiorno', 'Buonasera', 'Salve', 'Ciao', ''
      ];

      $msgWhy = [
        'la contatto perché ho un dubbio', 'ti contatto per un\'informazione', 'un\'informazione', 'ho un dubbio', ''
      ];

      $msgQuestion = [
        'i letti sono matrimoniali o singoli?', 
        'è presente l\'ascensore?', 
        'sono consentiti animali domestici? ho due gatti da cui non mi separo mai!',
        'è molto distante dal centro della citta? con che mezzi ci posso arrivare?', 
        'a che ora è il checkout?',
        'posso portare il mio cane? è di taglia media ed è molto tranquillo',
        'ho preotato per domani, arriverò la sera tardi, per sarebbe un problema fare il check-in alle 21:30 circa?'
      ];

      $msgThanks = [
        'grazie in anticipo', '', 'grazie', 'attendo notizie', ''
      ];

      $msgFinalGreeting = [];

      $apartments = Apartment::where('id', 279)->get('id');

      foreach ($apartments as $apartment) {
        
        for ($i=0; $i < 1; $i++) { 
          
          $newMessage = new Message();

          $randName = $names[rand(0, count($names) - 1)];
          $randSurame = $surnames[rand(0, count($surnames) - 1)];
          $randEmail = strtolower($randName) . strtolower($randSurame) . '@gmail.com';    

          $newMessage->email_sender = $randEmail;
          $newMessage->content = 'serfgawefnoiwe';
          $newMessage->apartment_id = $apartment->id;

          $newMessage->save();

        }

      }

    }

}