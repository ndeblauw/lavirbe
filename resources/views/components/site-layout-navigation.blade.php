@php
    $menu_items = [
        ['name' => 'LAVIR', 'url' => route('welcome'), 'route_pattern' => 'welcome'],
        ['name' => 'Aanbod', 'url' => route('offers.index'), 'route_pattern' => 'offers.*'],
        ['name' => 'Vormingen', 'url' => route('formations.index'), 'route_pattern' => 'formations.*'],
        ['name' => 'Kennisbank', 'url' => route('articles.index'), 'route_pattern' => ['articles.*', 'categories.*', 'tags.*']],
        ['name' => 'Contact', 'url' => route('contact.create'), 'route_pattern' => 'contact.*'],
    ];

    $is_active = fn($item) => request()->routeIs($item['route_pattern']);
@endphp

<nav class="mt-16 mb-24 text-right">
    <ul class="flex gap-4 justify-end">
        @foreach($menu_items as $item)
            <li class="border-b @if($is_active($item)) border-black font-bold @else border-transparent @endif hover:border-dotted hover:border-black px-2 py-1">
                <a href="{{$item['url']}}">{{$item['name']}}</a>
            </li>
        @endforeach

        @auth
            <li class="px-2 py-1"> | </li>
            <li class="px-2 py-1"><a href="/admin"> ADMIN </a></li>
        @endauth
    </ul>

</nav>
