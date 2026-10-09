@props(['products' => [], 'more' => false])

<ul class="columns-2 md:columns-4 gap-8 text-lg">
    @foreach ($products as $product)
        <li>{{ $product }}</li>
    @endforeach

    @if ($more)
        <li aria-hidden="true">&hellip;</li>
    @endif
</ul>
