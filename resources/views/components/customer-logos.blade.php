@if ($customers->isNotEmpty())
    <h2 class="text-4xl mt-12 mb-4">Tevreden klanten</h2>
    <div class="mb-12 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
        @foreach ($customers as $customer)
            @if ($customer->website_url)
                <a href="{{ $customer->website_url }}" target="_blank" rel="noopener noreferrer"
                   class="flex items-center justify-center bg-white p-4 aspect-square">
                    <img src="{{ $customer->getFirstMediaUrl('logo') }}"
                         alt="{{ $customer->name }}"
                         class="max-h-full max-w-full object-contain">
                </a>
            @else
                <div class="flex items-center justify-center bg-white p-4 aspect-square">
                    <img src="{{ $customer->getFirstMediaUrl('logo') }}"
                         alt="{{ $customer->name }}"
                         class="max-h-full max-w-full object-contain">
                </div>
            @endif
        @endforeach
    </div>
@endif
