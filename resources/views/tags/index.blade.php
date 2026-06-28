<x-site-layout title="Tags">

    <ul class="space-y-2">
        @foreach ($tags as $tag)
            <li>
                <a href="{{ route('tags.show', $tag) }}" class="underline hover:decoration-dotted">
                    {{ $tag->title }}
                </a>
                <span class="text-sm text-gray-500">({{ $tag->articles_count }} artikels)</span>
            </li>
        @endforeach
    </ul>

</x-site-layout>
