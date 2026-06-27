<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'title' => 'Basispakketten',
                'hidden' => false,
                'body' => '<p>LAVIR biedt verschillende basispakketten aan voor vzw\'s en bestuurders. Uiteraard is dit slechts een voorstel, heeft u een andere vraag over het beheer van uw vzw? Aarzel niet om vrijblijvend contact op te nemen.</p><h3>Begrotingsondersteuning</h3><p>Het opstellen van een begroting is een cruciale stap voor een gezonde vzw. In dit pakket worden jullie hierin stap voor stap ondersteund en vinden er twee tussentijdse opvolggesprekken plaats. Je ontvangt een duidelijk stappenplan + analyse van de uiteindelijke begroting.</p><h3>Extra financiële middelen aantrekken?</h3><p>Heeft jouw vzw grote financiële zorgen en loopt de zoektocht naar extra financiële middelen niet zoals gehoopt? Samen overlopen we de opties en dienen we aanvragen in voor bijkomende middelen. 99% met succes!</p><h3>Beleidsdocumenten op maat</h3><p>Nood aan een duidelijk (intern) beleidsdocument? Denk aan een neergeschreven vrijwilligersbeleid, personeelsbeleid, gebouwenbeleid,.. Samen doorlopen we een kort proces waarbij ingezet wordt op participatie van alle betrokkenen. Zo creëren we een gedragen resultaat met meer impact.</p><h3>Statuten opstellen</h3><p>De statuten vormen de basis van elke vzw, het is dus een belangrijk document. De basisafspraken van jouw vzw staan hierin opgenomen. Statuten kunnen heel algemeen zijn, maar kunnen ook specifiek bepaalde artikels of clausules bevatten voor jouw specifieke situatie. Aarzel niet om hier vrijblijvend meer info over te vragen.</p><p><strong>Prijs:</strong> €190 per traject van opstellen/wijzigen statuten</p><h3>Oog voor armoede en diversiteit</h3><p>De maatschappij verandert continu, als vzw sta je middenin het maatschappelijk veld en is het belangrijk gevoelig te zijn voor maatschappijproblemen zoals armoede of rekening te houden met meer diversiteit. In een traject van 3 sessies van telkens 2u worden de belangrijkste aspecten hiervan meegegeven met concrete tips.</p>',
            ],
            [
                'title' => 'Aangifte UBO',
                'hidden' => false,
                'body' => '<p>Voor de aangifte bij het UBO register bieden we uiteraard ook onze diensten aan. Voor €45 zorgen we ervoor dat alles juridisch in orde is.</p>',
            ],
            [
                'title' => 'Aangifte Patrimoniumtaks',
                'hidden' => false,
                'body' => '<p>Voor de aangifte van de patrimoniumtaks voor vzw\'s kunnen we zorgen voor een vlekkeloze aangifte. Voor €45 zorgen we ervoor dat alles financieel in orde is.</p>',
            ],
            [
                'title' => 'Administratieve ondersteuning',
                'hidden' => false,
                'body' => '<h3>Boekhoudkundige ondersteuning</h3><p>Op zoek naar administratieve ondersteuning zoals facturen opstellen, boekhouding aanvullen,..? LAVIR biedt administratieve ondersteuning op maat.</p><h3>Kasboekhouding sjabloon</h3><p>Start je met de boekhouding van een vzw? Ons opgemaakt sjabloon helpt je goed starten! Volg de instructies vermeld in het document en de jaarrekening van de vzw is klaar om te dienen op de ondernemingsrechtbank.</p><p>Mail ons om het sjabloon aan te kopen.</p><p><strong>Prijs:</strong> €50</p>',
            ],
            [
                'title' => 'Lid worden',
                'hidden' => false,
                'body' => '<p>Zoek je als organisatie een vaste partner om jouw vzw gerelateerde vragen aan te kunnen stellen? Op elk moment van de dag? Dan is het LAVIR lidmaatschap de ideale oplossing. Voor een vast bedrag per jaar kan je jaarlijks een aantal maal een telefonische hulplijn inroepen. Dit is bedoeld voor vragen die beantwoord kunnen worden op maximaal 10 minuten. Uiteraard kan dit ook via mail. Voor uitgebreidere vragen, maken we graag een apart voorstel.</p><ul><li><strong>Lidmaatschap LAVIR – mini:</strong> €20/jaar met 3x telefonische/mail ondersteuning</li><li><strong>Lidmaatschap LAVIR – standaard:</strong> €50/jaar met 8x telefonische/mail ondersteuning</li><li><strong>Lidmaatschap LAVIR – premium:</strong> €75/jaar met 12x telefonische/mail ondersteuning</li></ul><p>Na betaling van de bijdrage, start de periode van 12 maanden. Er is geen automatische verlening of opzeg nodig. Na 12 maanden contacteren we u voor een eventuele verlenging, dit is geheel vrijblijvend.</p>',
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
