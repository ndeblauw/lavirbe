<x-site-layout title="Categorieën">

    <h1>Categorieën</h1>

    <ul>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('categories.show', $category) }}">
                    {{ $category->name }}
                </a>
            </li>
        @endforeach
    </ul>

</x-site-layout>

