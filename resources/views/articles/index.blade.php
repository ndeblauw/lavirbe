<x-site-layout title="Artikels">

    <ul class="space-y-4">
        @foreach ($articles as $article)
            <li>
                <a href="{{ route('articles.show', $article) }}" class="text-xl font-bold hover:underline">
                    {{ $article->title }}
                    <span class="bg-pink-600 text-pink-50 rounded-full text-sm px-2">{{$article->likes->count() }}</span>
                    @auth()
                        @if($article->likes->pluck('id')->contains(auth()->id()))
                            <span class="text-pink-600 text-xs">You liked this article</span>
                            <a class="text-pink-600 text-xs" href="{{route('articles.unlike', $article)}}"> Unlike article</a>

                        @else
                            <a class="text-pink-600 text-xs" href="{{route('articles.like', $article)}}"> Like article</a>
                        @endif
                    @endauth
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
