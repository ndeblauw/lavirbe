<x-site-layout title="Kennisbank">

    <form action="{{ route('articles.index') }}" method="GET" class="mb-6">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Zoek in artikels..."
                   class="w-full border-2 border-black p-3 bg-white text-xl">
            <button type="submit"
                    class="border-2 border-black px-6 py-3 text-xl font-semibold hover:bg-black hover:text-white transition-colors whitespace-nowrap">
                Zoeken
            </button>
        </div>
        @if(request('search'))
            <a href="{{ route('articles.index') }}" class="inline-block mt-2 underline hover:decoration-dotted">
                Wis zoekopdracht
            </a>
        @endif
    </form>

    <div class="mb-6">
        {{$articles->links()}}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($articles as $article)
            <x-article-card :article="$article" />
        @endforeach
    </div>

</x-site-layout>
