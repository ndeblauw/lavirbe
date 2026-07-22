<x-site-layout
    :title="$seo['title'] ?? 'LAVIR'"
    :description="$seo['description'] ?? null"
>

    <div class="py-8 md:py-16">
        <p class="text-2xl md:text-3xl leading-relaxed max-w-3xl">
            Persoonlijke, praktische en structurele ondersteuning van jouw vzw
        </p>

        <div class="mt-8 md:mt-12">
            <a href="{{ route('offers.index') }}"
               class="inline-block border-2 border-black px-8 py-3 text-xl font-semibold hover:bg-black hover:text-white transition-colors">
                Ontdek wat wij voor jou kunnen doen
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8 py-8 md:py-12 border-t-2 border-black">
        <div class="border-2 border-black p-6 md:p-8 bg-white/30">
            <h2 class="text-2xl font-semibold mb-4">Startersbegeleiding</h2>
            <p class="leading-relaxed">
                Net begonnen met je vzw of plannen om te starten? Weet je niet waar te beginnen?
                <a href="{{ route('contact.create') }}" class="underline hover:decoration-dotted font-medium">Neem contact op</a>
                voor een vrijblijvend kennismakingsgesprek.
            </p>
        </div>

        <div class="border-2 border-black p-6 md:p-8 bg-white/30">
            <h2 class="text-2xl font-semibold mb-4">Vzw in nood</h2>
            <p class="leading-relaxed">
                Is je financieel verantwoordelijke uitgevallen of heb je tijdelijk ondersteuning nodig voor specifieke opdracht?<br/>
                <a href="{{ route('contact.create') }}" class="underline hover:decoration-dotted font-medium">Wij helpen je graag verder!</a>
            </p>
        </div>

        <div class="border-2 border-black p-6 md:p-8 bg-white/30">
            <h2 class="text-2xl font-semibold mb-4">Nood aan een klankbord</h2>
            <p class="leading-relaxed">
                Heb je nood om even te ping-pongen over een nieuw idee of de toekomst van je vzw?
                Misschien is ons abonnement voor korte vragen wel iets voor jou?
                <a href="{{ route('offers.index') }}" class="underline hover:decoration-dotted font-medium">Bekijk snel het aanbod!</a>
            </p>
        </div>
    </div>

</x-site-layout>
