@props([
    'eyebrow',
    'title',
    'image',
    'imageAlt' => '',
    'reverse' => false,
    'buttonHref' => null,
    'buttonText' => 'Mail ons',
])

@php
    $columns = $reverse
        ? 'md:grid-cols-[1fr_minmax(0,33%)]'
        : 'md:grid-cols-[minmax(0,35%)_1fr]';
@endphp

<section class="mx-auto grid w-full max-w-6xl items-center gap-10 px-5 py-12 {{ $columns }}">
    <figure class="{{ $reverse ? 'md:order-2' : '' }}">
        <img src="{{ $image }}" alt="{{ $imageAlt }}" class="w-full rounded-lg" loading="lazy">
    </figure>

    <div class="{{ $reverse ? 'md:order-1' : '' }}">
        <p class="text-sm font-semibold tracking-wide uppercase">{{ $eyebrow }}</p>
        <h2 class="mt-2 text-3xl font-semibold text-white sm:text-4xl">{{ $title }}</h2>

        <div class="mt-4 space-y-4 text-lg">
            {{ $slot }}
        </div>

        @if ($buttonHref)
            <div class="mt-6">
                <x-drukwerk.button :href="$buttonHref">{{ $buttonText }}</x-drukwerk.button>
            </div>
        @endif
    </div>
</section>
