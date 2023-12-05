<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\Offer;
use App\Models\OfferTranslations;

class OffersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $offers = [
        ['id'=>1,'top'=>1],
        ['id'=>2,'top'=>1],
        ['id'=>3,'top'=>1],
        ['id'=>4,'top'=>0],
        ['id'=>5,'top'=>1],
        ['id'=>6,'top'=>1],
        ['id'=>7,'top'=>0],
        ['id'=>8,'top'=>1],
        ['id'=>9,'top'=>0],
        ['id'=>10,'top'=>1],
        ['id'=>11,'top'=>0],
        ['id'=>12,'top'=>1],
        ['id'=>13,'top'=>0],
        ['id'=>14,'top'=>1],
        ['id'=>15,'top'=>0],
        ['id'=>16,'top'=>1],
        ['id'=>17,'top'=>1],
        ['id'=>18,'top'=>0],
        ['id'=>19,'top'=>0],
        ['id'=>20,'top'=>1],
        ['id'=>21,'top'=>1],
        ['id'=>22,'top'=>0],
        ['id'=>23,'top'=>1]
        ];

        foreach ($offers as $item) {
            DB::table('offers')->insert($item);
        }

        $translarionsPl = [
            'drukowanie',
            'kserowanie',
            'oprawa_twarda',
            'oprawa_miekka',
            'bindowanie',
            'laminowanie',
            'zaproszenia',
            'winietki',
            'zawieszki',
            'numery_stolow',
            'wizytowki',
            'ulotki',
            'plakaty',
            'foldery',
            'teczki',
            'banery',
            'rollupy',
            'kalendarze',
            'bilety',
            'vouchery',
            'dyplomy',
            'naklejki',
            // Dodaj więcej kategorii, jeśli potrzebujesz
        ];

        // Kategorie w języku angielskim
        $translarionsEn = [
            'printing',
            'copying',
            'hardcover_binding',
            'softcover_binding',
            'binding',
            'laminating',
            'invitations',
            'place_cards',
            'hang_tags',
            'table_numbers',
            'business_cards',
            'flyers',
            'posters',
            'folders',
            'portfolios',
            'banners',
            'roll-ups',
            'calendars',
            'tickets',
            'vouchers',
            'diplomas',
            'stickers',
            // Add more translarions if needed
        ];


        // Tablica z danymi do wstawienia w pętli
        $data = [
            [
                'id' => 1,
                'offers_id' => 1,
                'locale' => 'pl',
                'name' => 'Drukowanie',
                'link' => 'drukowanie',
                'short_description' => 'dokumenty, plakaty, ulotki, wizytówki',
                'lead' => 'Drukujemy prace dyplomowe. Wykonujemy również wydruki na różnorodnych papierach ozdobnych.',
                'description' => 'Oferujemy drukowanie w formatach A4 i A3, czarno-białe i kolorowe. Wykonujemy pojedyncze wydruki, a także wydruki prac dyplomowych oraz wielostronicowych dokumentów, również książek. Wydruki wykonujemy z nośników danych, istnieje również możliwość przesłania plików do wydruku na adres e-mail. Wydruki wykonujemy na miejscu. Oferujemy różne papiery ozdobne, o różnych gramaturach.',
                'gallery_id'=> 1,
                'created_at' => '2023-08-31 09:07:45',
                'updated_at' => '2023-08-31 09:07:45',
            ],
            [
                'id' => 2,
                'offers_id' => 2,
                'locale' => 'pl',
                'name' => 'Kserowanie',
                'link' => 'kserowanie',
                'short_description' => 'kserujemy dokumenty, książki',
                'lead' => 'Kserujemy dokumenty, plakaty, książki',
                'description' => 'Oferujemy kserowanie i skanowanie do formatu A3 włącznie. Wykonujemy kopie dokumentów do formatu A3, kserokopie dokumentacji medycznej i innych. Skanujemy w dowolnym rozmiarze, maksymalnie w wymiarach 29,7cm x 42cm. Skany możemy wykonać do plików PDF, JPG, TIFF. Pliki elektroniczne zgrywamy na nośniki danych oraz przesyłamy na podany adres e-mial.',
                'gallery_id'=> 2,
                'created_at' => '2023-08-31 09:07:46',
                'updated_at' => '2023-08-31 09:07:46',
            ],
            [
                'id' => 3,
                'offers_id' => 3,
                'locale' => 'pl',
                'name' => 'Oprawa twarda ',
                'link' => 'oprawa_twarda',
                'short_description' => 'Oprawianie prac dyplomowych',
                'lead' => 'Oprawiamy w twarde oprawy prace licencjackie, dyplomowe, inżynierskie, magisterskie oraz doktoraty. Do wyboru duża gama kolorystyczna okładek',
                'description' => 'Oprawiamy dokumenty w oprawy twarde z napisem: Praca Licencjacka, Praca Inżynierska, Praca Magisterska, Praca Dyplomowa oraz Praca Doktorska. Istnieje również możliwość oprawy dokumentów w oprawę twardą bez napisu. 
                Posiadamy bogatą gamę kolorystyczną okładek twardych. ',
                'gallery_id'=> 3,
                'created_at' => '2023-08-31 09:07:47',
                'updated_at' => '2023-08-31 09:07:47',
            ],
            [
                'id' => 4,
                'offers_id' => 4,
                'locale' => 'pl',
                'name' => 'Oprawa miękka',
                'link' => 'oprawa_miekka',
                'short_description' => 'oprawa miękka',
                'lead' => 'Drukujemy prace na papierach ozdobnych',
                'description' => 'Oprawiamy dokumenty w oprawy miękkie maksymalnie do 150 kartek. Posiadamy bogatą gamę kolorystyczną okładek miękkich.',
                'gallery_id'=> 4,
                'created_at' => '2023-08-31 09:07:48',
                'updated_at' => '2023-08-31 09:07:48',
            ],
            [
                'id' => 5,
                'offers_id' => 5,
                'locale' => 'pl',
                'name' => 'Bindowanie dokumentów',
                'link' => 'bindowanie',
                'short_description' => 'Bindowanie dokumentów, dokumentacji',
                'lead' => 'Oferujemy bindowanie do 500 stron!',
                'description' => ' Oferujemy bindowanie prac dyplomowych oraz innych dokumentów do 500 stron! Posiadamy różnorodną gamę grzbietów do bindowania.',
                'gallery_id'=> 5,
                'created_at' => '2023-08-31 09:07:49',
                'updated_at' => '2023-08-31 09:07:49',
            ],
            [
                'id' => 6,
                'offers_id' => 6,
                'locale' => 'pl',
                'name' => 'Laminowanie',
                'link' => 'laminowanie',
                'short_description' => 'Laminujemy do formatu A3',
                'lead' => 'Laminujemy do formatu A3 zdjecia, ulotki, plakaty, dokumenty osobiste. ',
                'description' => 'Laminujemy do formatu A3 włącznie, mniejsze materiały precyzyjnie przycinamy trymerem do właściwego rozmiaru..',
                'gallery_id'=> 6,
                'created_at' => '2023-08-31 09:07:50',
                'updated_at' => '2023-08-31 09:07:50',
            ],
            [
                'id' => 7,
                'offers_id' => 7,
                'locale' => 'pl',
                'name' => 'Zaproszenia okolicznościowe',
                'link' => 'zaproszenia',
                'short_description' => 'Zaproszenia okolicznościowe',
                'lead' => 'Projektujemy i wykonujemy zaproszenia okolicznościowe. Zaproszenia ślubne, komunijne, zaproszenia na chrzciny. ',
                'description' => 'Wykonujemy różnorodne zaproszenia na imprezy okolicznościowe i nie tylko. Zaprojektujemy Twoje zaproszenie na urodziny, Chrzest Święty, Pierwszą Komunię, Weselę, a także na imprezę z okazji przejścia na emeryturę. 
                Wystarczy, że przekażesz nam informacje dotyczące imprezy oraz styl w jakim chcesz ją urządzić, a my stworzymy projekt specjalnie dla Ciebie.
                Istnieje również możliwość wybrania gotowego wzoru zaproszenia.
                Wykonujemy zaproszenia w różnych formatach, między innymi w formie pocztówki oraz składane.',
                'gallery_id'=> 7,
                'created_at' => '2023-08-31 09:07:51',
                'updated_at' => '2023-08-31 09:07:51',
            ],
            [
                'id' => 8,
                'offers_id' => 8,
                'locale' => 'pl',
                'name' => 'Winietki',
                'link' => 'winietki',
                'short_description' => 'Projektowanie winietek okazjionalnych',
                'lead' => 'Drukujemy winietki na każdą okazję',
                'description' => 'Wykonujemy winietki dopasowane do Twoich potrzeb. Istnieje możliwość zamówienia winietek składanych oraz winietek w formie wizytówki. Jeśli potrzebujesz innej formy – napisz e-mail – dostosujemy projekt do Twoich potrzeb.',
                'gallery_id'=> 8,
                'created_at' => '2023-08-31 09:07:52',
                'updated_at' => '2023-08-31 09:07:52',
            ],
            [
                'id' => 9,
                'offers_id' => 9,
                'locale' => 'pl',
                'name' => 'Zawieszki',
                'link' => 'zawieszki',
                'short_description' => 'zawieszki na butelki',
                'lead' => 'Zawieszki',
                'description' => 'Oferujemy wykonanie zawieszek na butelki. Istnieje możliwość wydruku zawieszek z projektu klienta, jak również projektu przygotowanego przez naszą firmę.
                Projekty możemy dopasować do istniejących już projektów innych elementów papeterii. ',
                'gallery_id'=> 9,
                'created_at' => '2023-08-31 09:07:53',
                'updated_at' => '2023-08-31 09:07:53',
            ],
            [
                'id' => 10,
                'offers_id' => 10,
                'locale' => 'pl',
                'name' => 'Numery stołów',
                'link' => 'numery_stolow',
                'short_description' => 'Elegancka numeracja stołów',
                'lead' => 'Drukujemy prace na papierach ozdobnych',
                'description' => 'W naszej ofercie znajduje się również możliwość wykonania numerów na stoły, zarówno stojących i przygotowanych do umieszczenia w ramkach. Projekty możemy dopasować do istniejących już projektów innych elementów papeterii. ',
                'gallery_id'=> 10,
                'created_at' => '2023-08-31 09:07:54',
                'updated_at' => '2023-08-31 09:07:54',
            ],
            [
                'id' => 11,
                'offers_id' => 11,
                'locale' => 'pl',
                'name' => 'Wizytówki',
                'link' => 'wizytowki',
                'short_description' => 'wizytówki zwykłe, laminowane, wytłaczane, złocone',
                'lead' => 'Drukujemy wizytówki w standardowych formatach, na bardzo szerokiej gamie papierów  ozdobnych',
                'description' => 'Oferujemy wykonanie wizytówek od A do Z. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku.
                W naszej ofercie znajdą Państwo szeroką gamę papierów wizytówkowych wykorzystywanych do wykonania zlecenia. 
                Oferujemy również wykonywanie wizytówek laminowanych, złoconych, tłoczonych, a także uszlachetnionych folią soft touch.',
                'gallery_id'=> 11,
                'created_at' => '2023-08-31 09:07:55',
                'updated_at' => '2023-08-31 09:07:55',
            ],
            [
                'id' => 12,
                'offers_id' => 12,
                'locale' => 'pl',
                'name' => 'Ulotki reklamowe',
                'link' => 'ulotki',
                'short_description' => 'ulotki reklamowe, informacyjne i promocyjne',
                'lead' => 'Ulotki i broszury reklamowe',
                'description' => 'Oferujemy wykonanie ulotek od A do Z. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku.
                W naszej ofercie znajdą Państwo szeroką gamę papierów wykorzystywanych do wykonania zlecenia.
                Oferujemy wykonanie ulotek w różnorodnych rozmiarach oraz formach, wykonujemy ulotki jednostronne, dwustronne, a także składane.',
                'gallery_id'=> 12,
                'created_at' => '2023-08-31 09:07:56',
                'updated_at' => '2023-08-31 09:07:56',
            ],
            [
                'id' => 13,
                'offers_id' => 13,
                'locale' => 'pl',
                'name' => 'Plakaty',
                'link' => 'plakaty',
                'short_description' => 'Plakaty reklamowe, filmowe',
                'lead' => 'Drukujemy plakaty, przy współpracy z renomowanymi drukarniami. ',
                'description' => 'Oferujemy wykonanie plakatów od A do Z. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku.
                W naszej ofercie znajdą Państwo szeroką gamę papierów wykorzystywanych do wykonania zlecenia, zarówno o niskiej i wysokiej gramaturze. ',
                'gallery_id'=> 13,
                'created_at' => '2023-08-31 09:07:57',
                'updated_at' => '2023-08-31 09:07:57',
            ],
            [
                'id' => 14,
                'offers_id' => 14,
                'locale' => 'pl',
                'name' => 'Foldery reklamowe / informacyjne',
                'link' => 'foldery',
                'short_description' => 'foldery reklamowe',
                'lead' => 'Projektujemy foldery reklamowe',
                'description' => 'Oferujemy wykonanie folderów reklamowych od A do Z. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku.
                W naszej ofercie znajdą Państwo szeroką gamę papierów wykorzystywanych do wykonania zlecenia.
                Oferujemy wykonanie folderów w różnorodnych rozmiarach oraz formach.',
                'gallery_id'=> 14,
                'created_at' => '2023-08-31 09:07:58',
                'updated_at' => '2023-08-31 09:07:58',
            ],
            [
                'id' => 15,
                'offers_id' => 15,
                'locale' => 'pl',
                'name' => 'Teczki',
                'link' => 'teczki',
                'short_description' => 'Teczki reklamowe',
                'lead' => 'Teczki reklamowe',
                'description' => 'Oferujemy wykonanie teczek reklamowych od A do Z. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wykonania.
                W naszej ofercie znajdą Państwo szeroką gamę materiałów wykorzystywanych do wykonania zlecenia. Wykonujemy teczki na papierach kredowych, laminowane oraz teczki na dyplomy z dodatkowym uszlachetnieniem.',
                'gallery_id'=> 15,
                'created_at' => '2023-08-31 09:07:59',
                'updated_at' => '2023-08-31 09:07:59',
            ],
            [
                'id' => 16,
                'offers_id' => 16,
                'locale' => 'pl',
                'name' => 'Banery',
                'link' => 'banery',
                'short_description' => 'Banery reklamowe oczkowane',
                'lead' => 'Oferujemy wykonanie banerów reklamowych od projektu do wydruku. ',
                'description' => 'Banery wykonywane są z wysokiej jakości materiałów. Wydruki są odporne na warunki atmosferyczne. Oferujemy wykonanie banerów w pełnej gamie kolorystycznej w dowolnym, interesującym Państwa rozmiarze.',
                'gallery_id'=> 16,
                'created_at' => '2023-08-31 09:08:00',
                'updated_at' => '2023-08-31 09:08:00',
            ],
            [
                'id' => 17,
                'offers_id' => 17,
                'locale' => 'pl',
                'name' => 'Rollupy',
                'link' => 'rollupy',
                'short_description' => 'Rollupy reklamowe',
                'lead' => 'Stojaki reklamowe, których konstrukcja umożliwia łatwe i szybkie składanie i rozkładanie. Fotograficzny nadruk na materiale.',
                'description' => 'Rollup to wygodna, elegancka i skuteczna forma reklamy. Konstrukcje stanowią elementy aluminiowe, czego efektem jest mała waga całego stojaka. Rollup jest sprzedawany z wygodną torba transportową.
                Zamawiając u nas rollup reklamowy zyskują Państwo możliwość wykonania lub konsultacji projektu, a także bardzo dobrej jakości wydruk w dobrej cenie.',
                'gallery_id'=> 17,
                'created_at' => '2023-08-31 09:08:01',
                'updated_at' => '2023-08-31 09:08:01',
            ],
            [
                'id' => 18,
                'offers_id' => 18,
                'locale' => 'pl',
                'name' => 'Kalendarze personalizowane',
                'link' => 'kalendarze',
                'short_description' => 'kalendarze firmowe lub rodzinne',
                'lead' => 'Kalendarze ścienne oraz książkowe',
                'description' => 'Realizujemy zamówienia na kalendarze ścienne i książkowe.
                Oferujemy wykonanie kalendarzy od projektu po wydruk. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku lub projektu.',
                'gallery_id'=> 18,
                'created_at' => '2023-08-31 09:08:02',
                'updated_at' => '2023-08-31 09:08:02',
            ],
            [
                'id' => 19,
                'offers_id' => 19,
                'locale' => 'pl',
                'name' => 'Bilety',
                'link' => 'bilety',
                'short_description' => 'Bilety na różne wydarzenia',
                'lead' => 'Oferujemy projektowanie oraz wykonanie biletów na różnorodne okazje.',
                'description' => 'Oferujemy projektowanie oraz wykonanie biletów na różnorodne okazje, mecze, koncerty oraz inne imprezy. Istnieje możliwość wykonania biletów personalizowanych oraz numerowych.',
                'gallery_id'=> 19,
                'created_at' => '2023-08-31 09:08:03',
                'updated_at' => '2023-08-31 09:08:03',
            ],
            [
                'id' => 20,
                'offers_id' => 20,
                'locale' => 'pl',
                'name' => 'Vouchery',
                'link' => 'vouchery',
                'short_description' => 'Vouczery prezentowe',
                'lead' => 'Wykonujemy różnorodne vouchery prezentowe i podarunkowe',
                'description' => 'Oferujemy wykonanie voucherów prezentowych od projektu po wydruk. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku lub projektu.
                W naszej ofercie znajdą Państwo szeroką gamę papierów wykorzystywanych do wykonania zlecenia. 
                Oferujemy wykonanie voucherów już od 1 sztuki.
                Dodatkowo przy większych zamówieniach istnieje możliwość wybrania dodatkowych uszlachetnień produktu. Można wybrać dodatkowe laminowanie, powlekanie folią soft touch, złocenia oraz tłoczenia.',
                'gallery_id'=> 20,
                'created_at' => '2023-08-31 09:08:04',
                'updated_at' => '2023-08-31 09:08:04',
            ],
            [
                'id' => 21,
                'offers_id' => 21,
                'locale' => 'pl',
                'name' => 'Dyplomy',
                'link' => 'dyplomy',
                'short_description' => 'Drukujemy prace na papierach ozdobnych',
                'lead' => 'Drukujemy prace na papierach ozdobnych',
                'description' => 'Oferujemy wykonanie dyplomów oraz certyfikatów od projektu po wydruk. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku lub projektu.
                W naszej ofercie znajdą Państwo szeroką gamę papierów wykorzystywanych do wykonania zlecenia. 
                Oferujemy wykonanie dyplomów już od 1 sztuki.
                Dodatkowo przy większych zamówieniach istnieje możliwość wybrania dodatkowych uszlachetnień produktu. Można wybrać dodatkowe laminowanie, powlekanie folią soft touch, złocenia oraz tłoczenia.',
                'gallery_id'=> 21,
                'created_at' => '2023-08-31 09:08:05',
                'updated_at' => '2023-08-31 09:08:05',
            ],
            [
                'id' => 22,
                'offers_id' => 22,
                'locale' => 'pl',
                'name' => 'Naklejki',
                'link' => 'naklejki',
                'short_description' => 'kolorowe naklejki samoprzylepne',
                'lead' => 'naklejki informacyjne ',
                'description' => 'Naklejki informacyjne, wlepy i inne możemy wykonać już od 1 sztuki.
                Oferujemy wykonanie naklejek od projektu po wydruk. Istnieje możliwość zamówienia projektu wraz z wydrukiem, jak również samego wydruku lub projektu.
                Oferujemy wykonanie naklejek już od 1 sztuki.
                Dodatkowo przy większych zamówieniach istnieje możliwość wybrania dodatkowych uszlachetnień produktu.',
                'gallery_id'=> 22,
                'created_at' => '2023-08-31 09:08:06',
                'updated_at' => '2023-08-31 09:08:06',
            ],

        ];

        // Wstawianie danych w pętli
        foreach ($data as $item) {
            DB::table('offers_translations')->insert($item);
        }
    }
}
