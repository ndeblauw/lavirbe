<x-drukwerk.layout
    title="Offerte aanvraag - LAVIR Drukwerk"
    description="Vraag vrijblijvend een offerte aan bij LAVIR Drukwerk. We bezorgen je zo snel mogelijk een voorstel op maat."
>
    @php
        $input = 'w-full rounded-lg border border-drukwerk-border bg-[#141821] px-3.5 py-3 text-base text-white placeholder-drukwerk-footer focus:border-drukwerk-primary focus:outline-none';
    @endphp

    <section class="mx-auto w-full max-w-2xl px-5 py-12">
        <h1 class="text-center text-3xl font-semibold text-white sm:text-4xl">Offerte aanvraag</h1>

        <p class="mx-auto mt-4 max-w-xl text-center">
            Vul hieronder het offerteformulier in, en ontvang vrijblijvend een offerte in je mailbox.
            We streven ernaar om binnen de 24 uur een offerte te bezorgen.
        </p>

        @if (session('success'))
            <div class="mt-8 rounded-lg bg-green-100 px-4 py-3 text-green-900">{{ session('success') }}</div>
        @endif

        <form action="{{ route('drukwerk.contact.store') }}" method="POST" class="mt-8 flex flex-col gap-5">
            @csrf
            <x-honeypot />

            <x-drukwerk.field label="Jouw naam" name="name">
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="{{ $input }}">
            </x-drukwerk.field>

            <x-drukwerk.field label="Jouw email" name="email">
                <input type="email" name="email" id="email" value="{{ old('email') }}" required class="{{ $input }}">
            </x-drukwerk.field>

            <x-drukwerk.field label="Jouw telefoonnummer (optioneel)" name="phone">
                <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="{{ $input }}">
            </x-drukwerk.field>

            <x-drukwerk.field label="Het product waar je een prijs voor wilt ontvangen" name="subject">
                <select name="subject" id="subject" required class="{{ $input }}">
                    <option value="">Maak een keuze</option>
                    @foreach ($products as $product)
                        <option value="{{ $product }}" @selected(old('subject') === $product)>{{ $product }}</option>
                    @endforeach
                </select>
            </x-drukwerk.field>

            <x-drukwerk.field label="Aantal stuks" name="quantity">
                <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}" min="1" max="50000" required class="{{ $input }}">
            </x-drukwerk.field>

            <x-drukwerk.field
                label="Indien je een voorkeur hebt voor bepaalde materialen, drukwijze of afwerking, kan je hier alle details achterlaten. (optioneel)"
                name="message"
            >
                <textarea name="message" id="message" rows="10" maxlength="5000" class="{{ $input }}">{{ old('message') }}</textarea>
            </x-drukwerk.field>

            <x-drukwerk.button class="self-start">Versturen</x-drukwerk.button>
        </form>
    </section>
</x-drukwerk.layout>
