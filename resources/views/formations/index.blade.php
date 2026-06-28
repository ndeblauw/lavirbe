<x-site-layout title="Vormingen">

    <p>
        LAVIR vzw coaching biedt vormingen aan gericht op medewerkers en bestuurders van vzw’s. Bekijk hieronder het aanbod. Momenteel worden vormingen enkel op aanvraag georganiseerd.
    </p>

    <div class="my-12">
        <p>
            Snel naar
        </p>
        <ul class="list-disc list-inside">
            @foreach($formations as $formation)
                <li><a class="underline hover:decoration-dotted" href="#{{ $formation->slug }}">{{ $formation->title }}</a></li>
            @endforeach
        </ul>
    </div>


    @foreach($formations as $formation)
        <div class="mt-12 contentText" id="{{ $formation->slug }}">
            <h2 class="text-4xl mt-8 mb-4">{{ $formation->title }}</h2>
            <div class="mb-8">
                {!!$formation->body  !!}
            </div>
        </div>
    @endforeach

</x-site-layout>
