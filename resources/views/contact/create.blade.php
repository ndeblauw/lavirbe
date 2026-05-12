<x-site-layout>

<form action="{{ route('contact.store') }}" method="post">
    @csrf
    <x-form-textinput name="email" label="Uw emailadres"/>

    {{-- Todo: add textarea for message --}}
    <x-form-textinput name="message" label="Uw bericht"/>

    <button type="submit" class="btn btn-primary">Versturen</button>
</form>

</x-site-layout>
