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
        <div class="bg-pink-500 text-pink-50 p-4 float-right ml-4 mb-4">
            Dit artikel werd geliked door {{$article->likes->count() }} personen.
            <ul class="list-disc list-inside">
            @foreach($article->likes as $user)
                <li class="text-sm text-pink-100">
                    {{$user->name}}
                </li>
            @endforeach
            </ul>

        </div>
        {!! nl2br(e($article->content)) !!}
    </div>

</x-site-layout>
