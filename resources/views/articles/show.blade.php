<x-site-layout title="{{ $article->title }}">

    <a href="{{ route('articles.index') }}" class="text-sm text-gray-500 hover:underline mb-4 inline-block">Terug naar artikels</a>

    <h1>{{ $article->title }}</h1>

    <p class="text-sm text-gray-500 mb-6">
        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : 'Nog niet gepubliceerd' }}
        @if ($article->author)
            door {{ $article->author->name }}
        @endif
        @if ($article->category)
            in <a href="{{ route('categories.show', $article->category) }}" class="text-blue-600 hover:underline">{{ $article->category->name }}</a>
        @endif
    </p>

    <div class="prose max-w-none">
        {{ nl2br(e($article->content)) }}
    </div>

</x-site-layout>
