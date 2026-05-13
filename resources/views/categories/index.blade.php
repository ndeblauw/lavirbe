<x-site-layout title="Categorieën">

    <h1>Categorieën</h1>

    <ul class="grid grid-cols-4 gap-4">
        @foreach ($categories as $category)
            <li>
                <img src="{{ $category->picture_image() }}" alt="Image for {{ $category->name }} picture" width="20%">
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>

