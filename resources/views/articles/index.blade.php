<x-site-layout title="Kennisbank">

    <div class="mb-6">
        {{$articles->links()}}
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($articles as $article)
            <x-article-card :article="$article" />
        @endforeach
    </div>

</x-site-layout>
