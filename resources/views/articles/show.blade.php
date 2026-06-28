<x-site-layout title="{{ $article->title }}">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="text-base">
            <img src="{{ $article->media->first()->getUrl() }}" alt="{{ $article->title }}" class="w-full h-auto mb-4">

            <div>
                Gepubliceerd op {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->translatedFormat('d F Y') : 'Nog niet' }}
            </div>
            @if ($article->author)
                <div class="mt-2">
                    door {{ $article->author->name }}
                </div>
            @endif

            @if($article->category)
            <div class="mt-6">
                Categorie<br/>
                <a href="" class="inline-block underline hover:decoration-dotted">{{ $article->category->name }}</a>
            </div>
            @endif
            @if($article->tags->isNotEmpty())
            <div class="mt-6">
                Tags<br>
                @foreach ($article->tags as $tag)
                    - <a href="" class="inline-block underline hover:decoration-dotted">{{ $tag->title }}</a><br/>
                @endforeach
            </div>
            @endif
        </div>

        <div class="col-span-2">
            <div class="contentText">
                {!! $article->content !!}
            </div>
        </div>
    </div>


    <a href="{{ route('articles.index') }}" class="text-sm text-gray-500 hover:underline mb-4 inline-block">Terug naar artikels</a>

    <p class="text-sm text-gray-500 mb-6">
        {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : 'Nog niet gepubliceerd' }}
        @if ($article->category)
            in <a href="{{ route('categories.show', $article->category) }}" class="text-blue-600 hover:underline">{{ $article->category->name }}</a>
        @endif
    </p>



</x-site-layout>
