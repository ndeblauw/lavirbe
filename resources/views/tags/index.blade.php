<x-site-layout title="Categorieën en tags">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
        <section>
            <h2 class="text-xl font-semibold mb-4">Categorieën</h2>

            <ul class="space-y-2">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{ route('categories.show', $category) }}" class="underline hover:decoration-dotted">
                            {{ $category->title }}
                        </a>
                        <span class="text-sm text-gray-800">({{ $category->articles_count }} {{ $category->articles_count === 1 ? 'artikel' : 'artikels' }})</span>
                    </li>
                @endforeach
            </ul>
        </section>

        <section>
            <h2 class="text-xl font-semibold mb-4">Tags</h2>

            <ul class="space-y-2">
                @foreach ($tags as $tag)
                    <li>
                        <a href="{{ route('tags.show', $tag) }}" class="underline hover:decoration-dotted">
                            {{ $tag->title }}
                        </a>
                        <span class="text-sm text-gray-800">({{ $tag->articles_count }} {{ $tag->articles_count === 1 ? 'artikel' : 'artikels' }})</span>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
</x-site-layout>
