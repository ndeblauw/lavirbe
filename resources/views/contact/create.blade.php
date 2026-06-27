<x-site-layout title="Contact">

    <p class="mb-8 leading-relaxed">
        Stel hieronder via het formulier een vraag over ons aanbod, of vraag een telefonisch gesprek aan.
        Vergeet in dat laatste geval zeker niet je nummer toe te voegen en de momenten waarop ik je het beste kan bereiken.
    </p>

    <p class="mb-8">Hopelijk tot snel<br>Ailan</p>

    @if(session('success'))
        <div class="border-2 border-black p-4 mb-8 bg-green-100 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="name" class="block mb-1">Je naam</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full border-2 border-black p-3 bg-white text-xl @error('name') border-red-600 @enderror">
            @error('name')
            <div class="text-red-600 text-base mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email" class="block mb-1">Je e-mailadres</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}"
                   class="w-full border-2 border-black p-3 bg-white text-xl @error('email') border-red-600 @enderror">
            @error('email')
            <div class="text-red-600 text-base mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="subject" class="block mb-1">Onderwerp</label>
            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                   class="w-full border-2 border-black p-3 bg-white text-xl @error('subject') border-red-600 @enderror">
            @error('subject')
            <div class="text-red-600 text-base mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="message" class="block mb-1">Je bericht (optioneel)</label>
            <textarea name="message" id="message" rows="10"
                      class="w-full border-2 border-black p-3 bg-white text-xl @error('message') border-red-600 @enderror">{{ old('message') }}</textarea>
            @error('message')
            <div class="text-red-600 text-base mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="hidden" aria-hidden="true">
            <label for="website">Laat dit veld leeg</label>
            <input type="text" name="website" id="website" tabindex="-1" autocomplete="off">
        </div>

        <button type="submit"
                class="border-2 border-black px-8 py-3 text-xl font-semibold hover:bg-black hover:text-white transition-colors">
            Versturen
        </button>
    </form>


</x-site-layout>
