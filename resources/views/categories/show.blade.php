<x-site-layout title="{{ $category->title }}">
    @if($articles->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    @else
        <p class="mt-6">Geen artikels gevonden in deze categorie.</p>
    @endif

    <a href="{{ route('categories.index') }}" class="inline-block mt-6 underline hover:decoration-dotted">Terug naar overzicht</a>
</x-site-layout>
