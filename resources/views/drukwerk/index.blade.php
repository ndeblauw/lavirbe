<x-drukwerk.layout title="LAVIR Drukwerk">
    <x-drukwerk.hero />

    <x-drukwerk.feature
        eyebrow="Onze kern"
        title="Advies en Design voor jouw project"
        image="/img/drukwerk/brand/371164329_1184356959619458_874487311815188223_n-1024x1024.png"
        :button-href="'mailto:'.config('drukwerk.company.email')"
    >
        <p>
            We willen jou helpen het beste materiaal te bestellen. Laat ons weten wat je nodig hebt,
            en we doen enkele vrijblijvende voorstellen. Heb je zelf ontwerpen gemaakt? Perfect!
            Wil je graag dat wij voor jou een ontwerp maken? Ook dat kan zeker en vast!
        </p>
    </x-drukwerk.feature>

    <x-drukwerk.feature
        eyebrow="Persoonlijk contact"
        title="Persoonlijk contact en begeleiding"
        image="/img/drukwerk/photos/foto-lissa.jpg"
        :reverse="true"
        :button-href="'mailto:'.config('drukwerk.company.email')"
    >
        <p>
            Lissa staat voor je klaar met gratis advies, stalen, lookbooks, en meer. Zo komt jouw
            project helemaal goed! Aarzel niet om een mailtje te sturen en we maken concrete afspraken.
        </p>
    </x-drukwerk.feature>

    <div class="mx-auto w-full max-w-6xl px-5 py-8 text-center">
        <x-drukwerk.button :href="route('drukwerk.contact.create')">
            Vul hier een vrijblijvende offerte aanvraag in
        </x-drukwerk.button>
    </div>

    @php
        $highlights = [
            [
                'title' => 'Pins op maat',
                'image' => '/img/drukwerk/products/Ontwerp-zonder-titel7.png',
                'paragraphs' => [
                    'Een leuk ontwerp voor een pin? Op kledij, rugzakken, pennenzakken, en meer: overal is een pin een extra leuk accent! Vanaf 25 stuks per ontwerp. Ideaal voor jeugdbewegingen, clubs, en meer.',
                ],
            ],
            [
                'title' => 'Matten',
                'image' => '/img/drukwerk/products/tapijt.png',
                'paragraphs' => [
                    'Op zoek naar een gepersonaliseerde (rubberen) mat voor de inkom van jouw zaak? Jouw logo in het groot aan de inkom zorgt voor extra zichtbaarheid! Verschillende soorten en maten beschikbaar.',
                ],
            ],
            [
                'title' => 'Stickers',
                'image' => '/img/drukwerk/products/Ontwerp-zonder-titel6.png',
                'paragraphs' => [
                    'Stickers nodig? Per vel, op een rol, vierkant, rond, eigen vorm, en meer: alles kan aan een scherpe prijs! Ideaal om cadeaus een extra accent van jouw winkel of merk mee te geven.',
                ],
            ],
            [
                'title' => 'Beachflag',
                'image' => '/img/drukwerk/products/Ontwerp-zonder-titel12.png',
                'paragraphs' => [
                    'Ligt jouw zaak verborgen achter een hoekje? Of wil je graag mensen al van ver informeren en nieuwsgierig maken? Dan is een beachflag een ideaal item voor jou! Er zijn verschillende vormen en groottes mogelijk, van bijna 2 meter tot 4,4 meter groot.',
                ],
            ],
            [
                'title' => 'Plaatmateriaal',
                'image' => '/img/drukwerk/products/Ontwerp-zonder-titel9.png',
                'paragraphs' => [
                    'Een stevige aluminium plaat nodig voor aan jouw gevel? Of stijlvolle naamplaatjes voor verschillende vergaderzalen? Dibond plaatmateriaal is breed inzetbaar.',
                    'Ook honingraatkarton, plexiglas, forex (kunststof), golfkarton en foamboards zijn allemaal mogelijke opties in ons gamma. We helpen je graag een juiste keuze te maken.',
                ],
            ],
            [
                'title' => 'Luxe kaartjes',
                'image' => '/img/drukwerk/products/Ontwerp-zonder-titel8.png',
                'paragraphs' => [
                    'Op zoek naar dat tikkeltje extra? Met onze luxe kaartjes scoor je zeker en vast! Ideaal voor een trouw, geboorte, en meer. Er zijn oneindig veel combinaties mogelijk qua papiersoorten, afwerkingen en materialen. We hebben een boek vol stalen waar we je graag door laten bladeren.',
                ],
            ],
        ];
    @endphp

    <section class="mx-auto w-full max-w-6xl px-5 py-12">
        <h2 class="text-center text-3xl font-semibold text-white sm:text-4xl">Producten in de kijker</h2>

        <div class="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($highlights as $highlight)
                <x-drukwerk.product-card :title="$highlight['title']" :image="$highlight['image']">
                    @foreach ($highlight['paragraphs'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </x-drukwerk.product-card>
            @endforeach
        </div>
    </section>

    <div class="mx-auto w-full max-w-6xl px-5 py-8 text-center">
        <x-drukwerk.button :href="route('drukwerk.contact.create')">
            Vul hier een vrijblijvende offerte aanvraag in
        </x-drukwerk.button>
    </div>

    <section class="mx-auto w-full max-w-6xl px-5 py-12">
        <h2 class="text-3xl font-semibold text-white sm:text-4xl">Zoek je iets anders?</h2>
        <p class="mt-4 text-lg">
            Het aanbod van LAVIR is quasi oneindig. Denk je aan iets om te bedrukken? Wij kunnen het
            jou bezorgen!
        </p>

        <div class="mt-8">
            <x-drukwerk.product-list :products="$products" />
        </div>
    </section>
</x-drukwerk.layout>
