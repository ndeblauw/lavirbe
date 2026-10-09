@php($company = config('drukwerk.company'))

<section class="mx-auto w-full max-w-5xl px-5 py-16 text-center sm:py-24">
    <h1 class="text-5xl leading-tight font-medium sm:text-6xl lg:text-7xl">
        <span class="block text-white">Wij bieden</span>
        <span class="block text-drukwerk-gray">advies</span>
        <span class="block text-white">op maat.</span>
    </h1>

    <p class="mx-auto mt-8 max-w-3xl text-lg sm:text-xl">
        Drukwerk, papier, textiel, buttons, patches, gadgets, en meer. LAVIR Drukwerk voorziet
        het juiste product voor jouw project. Contacteer ons voor vrijblijvend advies.
    </p>

    <div class="mt-8">
        <x-drukwerk.button :href="'mailto:'.$company['email']">Mail ons</x-drukwerk.button>
    </div>

    <p class="mx-auto mt-12 max-w-3xl text-lg sm:text-xl">
        Liever meteen een offerte aanvragen? Twee opties:
    </p>
    <ul class="mx-auto mt-4 max-w-3xl list-disc space-y-1 text-left text-lg sm:text-xl">
        <li>Je kan via onderstaande knop een vrijblijvende offerte vragen.</li>
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
</section>
