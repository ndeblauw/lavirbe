@props([
    'article',
])

<a href="{{ route('articles.show', $article) }}" class="block bg-white rounded-none hover:shadow-xs hover:-translate-y-2 transition-all duration-300 border-2 border-black">
    @if($article->media->first())
        <img src="{{ $article->media->first()->getUrl() }}" alt="{{ $article->title }}" class="w-full h-48 object-cover ">
    @endif

    <div class="p-4 flex flex-col justify-between">

        <div>
            <div class="text-sm text-gray-500">
                {{ $article->published_at ? \Carbon\Carbon::parse($article->published_at)->format('d F Y') : 'Nog niet gepubliceerd' }}
            </div>
            <h3 class="text-xl font-bold mb-2">{{ $article->title }}</h3>
        </div>

        <div>
            @if($article->category || $article->tags->isNotEmpty())
                <div class="text-sm text-gray-600 mb-4 space-y-1">
                    @if($article->category)
                        <div class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                            <span>{{ $article->category->title }}</span>
                        </div>
                    @endif
                    @if($article->tags->isNotEmpty())
                        <div class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
                            @foreach ($article->tags as $tag)
                                <span>{{ $tag->title }}</span>{{ !$loop->last ? ' . ' : '' }}
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="text-right">
            <span class="bg-[#87b2b1] px-4 py-1 font-semibold">Lees meer &rarr;</span>
        </div>


    </div>
</a>
