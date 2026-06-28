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
                <a href="{{ route('categories.show', ['category' => $article->category]) }}" class="inline-block underline hover:decoration-dotted">{{ $article->category->name }}</a>
            </div>
            @endif
            @if($article->tags->isNotEmpty())
            <div class="mt-6">
                Tags<br>
                @foreach ($article->tags as $tag)
                    - <a href="{{ route('tags.show', ['tag' => $tag]) }}" class="inline-block underline hover:decoration-dotted">{{ $tag->title }}</a><br/>
                @endforeach
            </div>
            @endif
        </div>

        <div class="col-span-2">
            <div class="contentText">
                {!! $article->content !!}
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('articles.index') }}" class="border-2 border-black px-8 py-3 text-xl font-semibold hover:bg-black hover:text-white transition-colors">Terug naar alle artikels</a>

            </div>

        </div>
    </div>







</x-site-layout>
