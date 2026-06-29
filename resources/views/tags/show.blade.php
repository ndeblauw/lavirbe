<x-site-layout title="{{ $tag->title }}">

    @if($articles->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
            @foreach ($articles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    @else
        <p class="mt-6">Geen artikels gevonden met deze tag.</p>
    @endif

    <div class="text-center mt-12 space-x-4">
        <a href="{{ route('tags.index') }}" class="border-2 border-black px-8 py-3 text-xl font-semibold hover:bg-black hover:text-white transition-colors">Terug naar categorieën en tags</a>
        <a href="{{ route('articles.index') }}" class="border-2 border-black px-8 py-3 text-xl font-semibold hover:bg-black hover:text-white transition-colors">Terug naar kennisbank</a>
    </div>
</x-site-layout>
