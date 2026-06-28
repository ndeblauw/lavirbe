<x-site-layout title="Artikels">

    <ul class="space-y-4">
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('articles.show', $article) }}" class="text-xl font-bold hover:underline">
                    {{ $article->title }}
                </a>
                <p class="text-sm text-gray-500">
                    {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : 'Nog niet gepubliceerd' }}
                    @if ($article->author)
                        door {{ $article->author->name }}
                    @endif
                </p>
            </li>
        @endforeach
    </ul>

</x-site-layout>
