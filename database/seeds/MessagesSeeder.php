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
        'ho preotato per domani, arriverò la sera tardi, per sarebbe un problema fare il check-in alle 21:30 circa?',
        'la casa è dotata di un terrazzo?',
        'l\'appartamento a che piano si trova?',
        'è consentito fumare nell\'appartamento?',
        'la colazione è inclusa?',
        'avrei intenzione di prenotare per 2 mesi consecutivi, è possibile avere uno sconto?',
        'ci sono negozi nei dintorni?'
      ];

      $msgThanks = [
        'grazie in anticipo', '', 'grazie', 'attendo notizie', 'resto in attesa di un riscontro',
      ];

      $msgFinalGreeting = [
        'arrivederci', 'cordiali saluti', 'a presto', 'distinti saluti', 'saluti' 
      ];

      
      // aggiungi messaggi per un appartamento specifico
      // $apartments = Apartment::where('id', 279)->get('id'); 

      //aggiungi messaggi per tutti gli appartamenti di un utente specifico
      // $apartments = Apartment::where('user_id', 1)->get('id');

      //aggiungi messaggi per tutti gli appartamenti 
      $apartments = Apartment::get('id');


      foreach ($apartments as $apartment) {
        
        for ($i=0; $i < 2; $i++) { 
          
          $newMessage = new Message();

          $randName = $names[rand(0, count($names) - 1)];
          $randSurame = $surnames[rand(0, count($surnames) - 1)];
          $randEmail = strtolower($randName) . strtolower($randSurame) . '@gmail.com';    
          
          $randContent = $msgGreeting[rand(0, count($msgGreeting) - 1)] . ', ' . 
                          $msgWhy[rand(0, count($msgWhy) - 1)] . ', ' . 
                          $msgQuestion[rand(0, count($msgQuestion) - 1)] . ' ' .
                          $msgThanks[rand(0, count($msgThanks) - 1)] . ', ' .
                          $msgFinalGreeting[rand(0, count($msgFinalGreeting) - 1)] . '. ' .
                          $randName . ' ' . $randSurame . '.';
          
          $newMessage->email_sender = $randEmail;
          $newMessage->content = $randContent; 
          $newMessage->apartment_id = $apartment->id;

          $newMessage->save();

        }

      }

    }

}