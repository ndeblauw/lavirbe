@props(['title', 'image', 'imageAlt' => ''])

<article class="overflow-hidden rounded-lg border border-drukwerk-border">
    <img src="{{ $image }}" alt="{{ $imageAlt }}" class="aspect-video w-full object-cover" loading="lazy">

    <div class="p-6">
        <h3 class="text-2xl font-semibold text-white">{{ $title }}</h3>
        <div class="mt-3 space-y-3">{{ $slot }}</div>
    </div>
</article>
