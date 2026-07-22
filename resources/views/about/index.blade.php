<x-site-layout
    :title="$seo['title'] ?? 'Over ons'"
    :description="$seo['description'] ?? null"
>

    <div class="flex flex-col md:flex-row gap-8 md:gap-12 mb-12">
        <div class="md:w-3/4">
            <h2 class="text-3xl md:text-4xl mb-4">Ik ben Aïlan</h2>

            <p class="mb-6 leading-relaxed">
                Een scherp oog voor cijfers, strategisch inzicht en een vat vol kennis. Hoe ik dat vergaard heb? Wel, op 18 jarige leeftijd richtte ik een vzw op. Ondertussen wordt deze verdergezet door anderen, maar toen al werd het zaadje geplant om mezelf in de vzw wereld onder te dompelen. Als, voor lange tijd, enige administratief betrokkene, zocht ik op alle vragen een antwoord. Verdere ervaring als werknemer bij verschillende vzw's maakt me een echte vzw expert.
            </p>

            <p class="leading-relaxed">
                De non-profit blijft me aantrekken: de belangeloze doelen en de impact op de maatschappij weerspiegelen mijn eigen moreel kompas. Had ik al vermeld dat ik van cijfers houd? Een boekhouding die op punt staat, richting geven aan processen voor een gestructureerd financieel systeem, een begroting opstellen en/of opvolgen. Het zijn allemaal onderdelen die mij veel voldoening geven.
            </p>
        </div>

        <div class="md:w-1/4 flex flex-col items-center justify-end">
            <img src="{{ asset('/img/ailan-contour.png') }}" alt="Aïlan" class="w-full max-w-[200px]  border-b border-black">
            <div class="mt-2">linkedin | instagram</div>
        </div>
    </div>

    <div class="mb-12">
        <h2 class="text-3xl md:text-4xl mb-4">Praktische ingesteldheid</h2>

        <p class="mb-6 leading-relaxed">
            Onder de, soms, warrige krullen zit een praktische geest. Wij zien het grotere geheel en bieden naast ad hoc ondersteuning ook de mogelijkheid om de processen in een vzw vorm te geven of te updaten. HR, finance en databeheer komen zeker in aanmerking.
        </p>
    </div>

    <div class="mb-12">
        <h2 class="text-3xl md:text-4xl mb-4">Een werk van twee: LAVIR</h2>

        <h3 class="text-2xl mb-3">Persoonlijk contact</h3>

        <p class="mb-6 leading-relaxed">
            LAVIR staat voor persoonlijk, warm contact. Het is heel eenvoudig: 95% van de vragen komt bij Aïlan terecht. Je krijgt hem aan de telefoon, te zien in de meeting of op kantoor. Lissa behandelt de 5 andere procenten: facturatie, offertes, ondersteuning bij administratie of boekhouding. Je contacteert haar via mail.
        </p>
    </div>

    <div class="mb-12">
        <h2 class="text-3xl md:text-4xl mb-4">Vrijwillige engagementen</h2>

        <p class="mb-6 leading-relaxed">
            Ook in mijn vrije tijd beoefen ik mijn passie. Als bestuurder van De Landgenoten, het Vlaams Woningfonds en lid van de Algemene Vergadering van Sportpret vzw blijf ik op alle niveau's betrokken in het werkveld van non-profit organisaties.
        </p>
    </div>

</x-site-layout>
