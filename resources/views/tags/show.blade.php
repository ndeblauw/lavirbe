<x-site-layout title="{{ $tag->title }}">

    <h1>{{ $tag->title }}</h1>

    @if($articles->isNotEmpty())
        <ul class="space-y-4 mt-6">
            @foreach ($articles as $article)
                <li>
                    <a href="{{ route('articles.show', $article) }}" class="text-xl font-bold hover:underline">
                        {{ $article->title }}
                    </a>
                    <p class="text-sm text-gray-500">
                        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : 'Nog niet gepubliceerd' }}
                    </p>
                </li>
            @endforeach
        </ul>
    @else
        <p class="mt-6">Geen artikels gevonden met deze tag.</p>
    @endif

    <a href="{{ route('tags.index') }}" class="inline-block mt-6 underline hover:decoration-dotted">Terug naar overzicht</a>

</x-site-layout>
