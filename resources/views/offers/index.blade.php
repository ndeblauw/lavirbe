<x-site-layout title="Aanbod">

    <p>
        LAVIR biedt ondersteuning op volgende vlakken:
    </p>
    <ul class="list-disc list-inside">
        <li>Financiële ondersteuning (begroting, subsidiedossiers, financieringsmix,..)</li>
        <li>Governance ofwel bestuur van vzw’s. Opstellen van inhoudelijke richtlijnen of beleidsdocumenten. Denk aan een personeelsreglement, vrijwilligersbeleid, gebouwenbeleid,..</li>
        <li>Administratieve (nood)ondersteuning. Heb je tijdelijk of structureel administratieve ondersteuning nodig, dan kan LAVIR een oplossing zijn.</li>
        <li>Personeelszaken zijn ook in de non-profit en social profit zeer belangrijk. Welke verloningen zijn mogelijk en hoe kunnen we als vzw aan evaluatie doen?</li>
        <li>Impactmeting en interne evaluaties zijn fundamenteel om jouw doelstellingen scherp te krijgen en te houden. LAVIR ondersteunt dit proces.</li>
        <li>Digitalisering betekent efficiëntiewinst én minder onnodig werk voor medewerkers of vrijwilligers. LAVIR biedt ondersteuning in het opzetten van digitale oplossingen en kan linken leggen met ontwikkelaars.</li>
    </ul>

    <div class="my-12">
        <p>
            Snel naar
        </p>
        <ul class="list-disc list-inside">
            @foreach($packages as $package)
                <li><a class="underline hover:decoration-dotted" href="#{{ $package->slug }}">{{ $package->title }}</a></li>
            @endforeach
        </ul>
    </div>


    @foreach($packages as $package)
        <div class="mt-12 contentText" id="{{ $package->slug }}">
            <h2 class="text-3xl md:text-4xl mt-8 mb-4">{{ $package->title }}</h2>
            <div class="mb-8">
                {!!$package->body  !!}
            </div>
        </div>
    @endforeach

</x-site-layout>
