<h1>{{ $category->name }}</h1>

<p>
    {{ $category->description }}
</p>

<a href="{{ route('categories.index') }}">Terug naar overzicht</a>
