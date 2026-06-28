<x-site-layout title="Categorieën">

    <h1>Categorieën</h1>

    <ul class="grid grid-cols-4 gap-4">
        @foreach ($categories as $category)
            <li>
                <img src="{{ $category->picture_image() }}" alt="Image for {{ $category->name }} picture" width="20%">
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->name }}
                </a>
                <span class="text-sm text-gray-500">({{ $category->articles_count }} artikels)</span>
            </li>
        @endforeach
    </ul>

</x-site-layout>

