<?php

use App\Service;
use App\Address;
use App\Apartment;
use App\User;
use Illuminate\Database\Seeder;

class ApartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      $users = User::orderBy('created_at', 'DESC')->limit(10)->get('id');

      $TitleTypes = ['appartamento', 'casa', 'villa', 'casa vacanze', 'abitazione', 'alloggio', 'palazzo', 'attico', 'monolocale', 'bilocale'];
      $TitleAdjs = ['', ' splendido', ' tranquillo', ' ampio', ' luminoso', ' confortevole', ' moderno', ' classico'];
      $TitlePlus = ['', ' con vista', ' con terrazzo', ' centro città', ' periferia', ' con giardino'];

      $randCoverImgs = [
        'https://q4g9y5a8.rocketcdn.me/wp-content/uploads/2020/02/home-banner-2020-02-min.jpg',
        'https://www.nottingham.ac.uk/Creative-energy-homes/images-multimedia/EONHouseMain.png',
        'https://www.croatialuxuryrent.com/storage/upload/60a/bf3/6be/IMG_5654_tn.jpg',
        'https://news.airbnb.com/wp-content/uploads/sites/4/2021/09/07_Winnie-the-Pooh-Living-Room-Airbnb-CREDIT-Henry-Woide.jpg?fit=2662,1776',
        'https://a0.muscache.com/im/pictures/prohost-api/Hosting-19781762/original/64b85b47-5552-4c04-bc26-ff573d88e09f.jpeg?im_w=720',
        'https://www.casamagazine.it/wp-content/uploads/2021/02/la-casa-a-roma-di-mario-draghi-il-palazzo.jpg',
        'https://images-1.casa.it/360x265/listing/5a6aa6d60f995a3af18a69062672bcfc',
        'https://images-1.casa.it/360x265/listing/95ec378090721e410d852ab72828bf47',
        'https://roma.corriere.it/methode_image/2022/01/17/Roma/Foto%20Roma%20-%20Trattate/Immagini%20Torresina%20immobile%20a%205%20stelle-kbnE-U33101874587194t6F-656x492@Corriere-Web-Roma.jpg',
        'https://cdn.gestim.biz/custom/0637/foto/20211026170316-2.jpg',
        'https://pic.im-cdn.it/image/1009218993/cover-m-c.jpg',
        'https://images.cambiocasa.it/r/aHR0cHM6Ly9pbWcubWlvZ2VzdC5jb20vNzc1OS9pbW1fMTU3NTgzLTEyODAtLmpwZw==',
        'https://pic.im-cdn.it/image/976023013/cover-m-c.jpg',
        'https://10619-2.s.cdn12.com/rests/original/110_500086577.jpg',
        'https://pwm.im-cdn.it/image/1078954969/cover-m-c.jpg',
        'https://agestanet.risorseimmobiliari.it/public/annunci/09656/1765450/F_241619.jpg',
      ];

      $randDescriptions = [
        "La casa si trova nel cuore della città eterna. Vicinissima alla famosa piazza di Campo de Fiori, ideale per visitare a piedi tutti i maggiori siti turistici e enogastronomici di Roma.",
        "3 in 1 Roma San Pietro is a 3 double rooms apartment, I rent each room with private bathroom to a different couple of guests. There is a common area at the entrance where you can relax and read guides. Is no longer a B&B since january 2019 but you can use kettle&coffee machine everyday all day and enjoy some snacks!",
        "Lovely apartment on the second floor of an elegant building with concierge located on a quiet street in the central Rione Monti. The apartment is ideal for couples and families who want to spend their holidays in Rome.",
        "perfect renovated apartment located on the 2nd floor consisting of bedroom with bathroom, living room with sofa bed with the second bathroom connected then a fully equipped kitchen and finally a 5 m2 balcony equipped with a coffee table. All rooms have air conditioning Wi-Fi Nespresso kettle electric oven microwave oven and each room is equipped with TV. Then as a condominium space you have a 50 m2 communal terrace where all guests can use",
        "L'affittacamere dispone di 7 camere con bagno privato e si trova in una delle migliori zone di Roma, vicino la stazione Termini e il Colosseo; La via è situata di fronte a un parco, fra le chiese di San Giovanni Laterano e Santa Croce in Gerusalemme. A pochi passi tutti i mezzi di trasporto pubblico. A disposizione la cucina ben attrezzata da condividere con gli altri ospiti. (Si prega di leggere il resto prima di prenotare)",
        "Roma Ostiense - Ampia, luminosa e silenziosissima stanza matrimoniale nuova, finemente arredata, con bagno privato e balcone, zona centrale servita da tutti i mezzi di trasporto. Situata di fronte alla stazione ferroviaria Ostiense, con collegamento diretto all’aereoporto di Roma Fiumicino e alla stazione di Roma Termini. Ad un minuto dalla metro B fermata Piramide, il centro storico è raggiungibile in 15 minuti a piedi (Circo Massimo, Colosseo, Aventino). Adiacente quartiere Testaccio.",
        "Grazioso studio situato in una posizione privilegiata nel centro storico di Roma, a breve distanza da Largo di Torre Argentina, Campo de' Fiori, Piazza Navona , Pantheon, Piazza Venezia e San Pietro. Nonostante questo un ambiente riservato e silenzioso nella notte. Uscendo dal portone troverete ristoranti e le botteghe storiche di Roma.",
        "It is easy to move around the entire city of Rome from San Lorenzo thanks to the good tram, bus and metro connections and proximity to ROMA TERMINI AND ROMA TIBURTINA STATION!!!",
        "Posizionato in una area verde , all'interno di una villa che risale al 1700, l'appartamento si trova a poca distanza da Piazza S. Pietro (10 minuti a piedi). E' collegato con in mezzi pubblici (treno Stazione di S. Pietro e autobus - linea 64 per il centro) a poca distanza. Supermercato aperto tutti i giorni 24 ore su 24 a 300 metri.",
        "Per ragioni di sicurezza e igiene causa epidemia da Covid 19, il servizio colazione è sospeso. Il b&b offre camere totalmente attrezzate e arredate con molto buon gusto e particolare cura dei dettagli che garantiranno la vostra privacy in un ambiente confortevole al riparo dai rumori della città. Il mio quartiere è molto carino e vivi la vita da romani.",
      ];

      foreach ($users as $user) {
        
        for ($i=0; $i < 3 ; $i++) { 
          
          $newApartment = new Apartment();

          $randTitle = $TitleTypes[rand(0, count($TitleTypes) - 1)] . $TitleAdjs[rand(0, count($TitleAdjs) - 1)] . $TitlePlus[rand(0, count($TitlePlus) - 1)] ;
          $alreadyExists = Apartment::where('title', $randTitle)->first();

          while ($alreadyExists) {
            $newTitle = $TitleTypes[rand(0, count($TitleTypes) - 1)] . $TitleAdjs[rand(0, count($TitleAdjs) - 1)] . $TitlePlus[rand(0, count($TitlePlus) - 1)] ;

            $alreadyExists = Apartment::where('title', $newTitle)->first();

            if (!$alreadyExists) {
              $randTitle = $newTitle;
            }
          }

          $newApartment->title = $randTitle; 

          $newApartment->description = $randDescriptions[rand(0, count($randDescriptions) - 1)];
          $newApartment->cover_img = $randCoverImgs[rand(0, count($randCoverImgs) - 1)];
          $newApartment->price_day = rand(20, 200);
          $newApartment->n_rooms = rand(1, 10);
          $newApartment->n_baths = rand(1, 3);
          $newApartment->n_beds = rand(1,4);
          $newApartment->square_meters = rand(40, 200);
          $newApartment->shared = rand(0, 1);
          $newApartment->user_id = $user->id;

          $newApartment->save();

          $services = Service::all();
          $newApartment->services()->sync($services);

          $address = new Address();
          $address->latitude = rand(41815098, 41962825) / 1000000;;
          $address->longitude = rand(12383517, 12600497) / 1000000;
          $address->apartment_id = $newApartment->id;

          $address->save();
        }

      }

    }
}
