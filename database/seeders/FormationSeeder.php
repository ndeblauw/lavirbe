<?php

namespace Database\Seeders;

use App\Models\Formation;
use Illuminate\Database\Seeder;

class FormationSeeder extends Seeder
{
    public function run(): void
    {
        $formations = [
            [
                'title' => 'Een sterke subsidieaanvraag schrijven',
                'slug' => 'een-sterke-subsidieaanvraag-schrijven',
                'hidden' => false,
                'body' => '<p>Subsidies krijgen voor jouw initiatief verloopt niet altijd vanzelf. Het schrijven van een sterke subsidieaanvraag is een aparte vaardigheid. In deze workshop gaan we dieper in op de kenmerken van alle subsidies die er zijn en welke oproepen of subsidiemogelijkheden voor jouw organisatie de beste keuze zijn. Vervolgens gaan we praktisch kijken hoe je nu best zo\'n aanvraagformulier correct invult en welke tips je kan toepassen voor meer slaagkans!</p><ul><li>Kenmerken (en verschillen) van subsidies</li><li>Hoe selecteer ik de juiste oproep voor mijn initiatief</li><li>Praktische aspecten aan het schrijven van een sterke aanvraag</li></ul><h3>Lesgever</h3><p>Ailan Iriks &ndash; met 10 jaar ervaring binnen de non-profit sector en ervaring in verschillende sectoren van jeugd, sport, sociaal-cultureel, omgeving, gezondheidspreventie.. kent hij het subsidielandschap en de mogelijkheden die er zijn.</p><h3>Details</h3><p><strong>Duurtijd:</strong> 2u-3u<br><strong>Prijs:</strong> op aanvraag: <a href="'.route('contact.create').'">contact</a></p>',
                'image' => 'workshop-subsidies-1024x576.png',
            ],
            [
                'title' => 'Alles over vrijwilligerswerk',
                'slug' => 'alles-over-vrijwilligerswerk',
                'hidden' => false,
                'body' => '<p>In deze workshop duiken we in de wetgeving rond vrijwilligerswerk en welke mogelijkheden er zijn om vrijwilligers te vergoeden. In het tweede deel bekijken we een vrijwilligersbeleid van dichtbij, wat moet hier zeker in staan, en hoe kan je zo\'n vrijwilligersbeleid actief gaan gebruiken in jouw vereniging? Een derde en laatste deel van de workshop bestaat uit de praktische kant van een vrijwilligerswerking. Hoe zorg ik voor de administratie, welke papieren laat ik invullen, hoe regel ik een verzekering voor vrijwilligers, praktische tools voor vrijwilligersplanningen,..</p><ul><li>Wetgeving rond vrijwilligerswerk</li><li>Een vrijwilligersbeleid opzetten</li><li>Praktische aspecten aan vrijwilligerswerking</li></ul><h3>Lesgever</h3><p>Ailan Iriks &ndash; met 10 jaar ervaring binnen de non-profit sector en ervaring met verschillende vrijwilligerswerkingen heeft hij een stevige basis om jou mee te nemen in de wereld van vrijwilligerswerk.</p><h3>Details</h3><p><strong>Duurtijd:</strong> 2u-3u<br><strong>Prijs:</strong> op aanvraag: <a href="'.route('contact.create').'">contact</a></p>',
                'image' => 'Workshop-vrijwilligers-1024x576.png',
            ],
        ];

        foreach ($formations as $data) {
            $image = $data['image'];
            unset($data['image']);

            $formation = Formation::create($data);

            $imagePath = storage_path('seeds/formations/'.$image);

            if (file_exists($imagePath)) {
                $formation->addMedia($imagePath)
                    ->preservingOriginal()
                    ->toMediaCollection('banner');
            }
        }
    }
}
