<x-site-layout title="{{ $tag->title }}">

    <h1>{{ $tag->title }}</h1>

    @if($articles->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    @else
        <p class="mt-6">Geen artikels gevonden met deze tag.</p>
    @endif

    <a href="{{ route('tags.index') }}" class="inline-block mt-6 underline hover:decoration-dotted">Terug naar overzicht</a>

</x-site-layout>
