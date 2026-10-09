@php($company = config('drukwerk.company'))

<section class="mx-auto w-full max-w-5xl px-5 py-16 sm:py-24">
    <h1 class="text-5xl leading-tight font-medium sm:text-6xl lg:text-7xl gap-x-4">
        <span class=" text-white">Wij bieden</span>
        <span class=" text-drukwerk-teal">advies</span>
        <span class=" text-white">op maat.</span>
    </h1>

    <div class="grid grid-cols-1 md:grid-cols-5 gap-12 mt-12">
        <div class="md:col-span-2">
            <p class="mx-auto max-w-3xl text-lg sm:text-xl">
                Contacteer ons voor vrijblijvend advies.
            </p>
            <p class="mx-auto max-w-3xl text-lg sm:text-xl">
                Drukwerk, papier, textiel, buttons, patches, gadgets, en meer. LAVIR Drukwerk voorziet
                het juiste product voor jouw project.
            </p>

            <div class="mt-8">
                <x-drukwerk.button :href="'mailto:'.$company['email']">Mail ons</x-drukwerk.button>
            </div>
        </div>

        <div class="md:col-span-3">
            <p class="text-lg sm:text-xl">
                Liever meteen een offerte aanvragen? Twee opties:
            </p>
            <ul class="mt-4 list-disc space-y-1 text-lg sm:text-xl pl-4">
                <li>Vraag via onderstaande knop een vrijblijvende offerte.</li>
                <li>
                    Je kan in de linkerbenedenhoek op &ldquo;winkel&rdquo; klikken en de 50 meest populaire
                    items terugvinden. Let op: niet het hele aanbod is hierin terug te vinden.
                </li>
            </ul>

            <div class="mt-8">
                <x-drukwerk.button :href="route('drukwerk.contact.create')">
                    Vul hier een vrijblijvende offerte aanvraag in
                </x-drukwerk.button>
            </div>

        </div>

    </div>


</section>
