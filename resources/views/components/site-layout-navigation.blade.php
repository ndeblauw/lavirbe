@php
    $menu_items = [
        ['name' => 'Aanbod', 'url' => route('offers.index'), 'route_pattern' => 'offers.*'],
        ['name' => 'Vormingen', 'url' => route('formations.index'), 'route_pattern' => 'formations.*'],
        ['name' => 'Kennisbank', 'url' => route('articles.index'), 'route_pattern' => ['articles.*', 'categories.*', 'tags.*']],
        ['name' => 'Contact', 'url' => route('contact.create'), 'route_pattern' => 'contact.*'],
    ];

    $is_active = fn($item) => request()->routeIs($item['route_pattern']);
    $is_home = request()->routeIs('welcome');
@endphp

<nav x-data="{ open: false }" @click.outside="open = false" class="mt-8 mb-16 md:mt-16 md:mb-24">
    <div class="flex items-center justify-between">
        <a href="{{ route('welcome') }}"
           class="border-b @if($is_home) border-black font-bold @else border-transparent @endif hover:border-dotted hover:border-black px-2 py-1 text-xl font-bold">
            LAVIR
        </a>

        <ul class="hidden sm:flex gap-4 justify-end">
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

        <button @click="open = ! open" class="sm:hidden p-2 border-2 border-black" aria-label="Menu">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden mt-4 border-2 border-black bg-[#87b2b1]">
        <ul class="flex flex-col">
            @foreach($menu_items as $item)
                <li class="border-b border-black/20 @if($is_active($item)) font-bold @endif">
                    <a href="{{$item['url']}}" class="block px-4 py-3 hover:bg-black/10">{{$item['name']}}</a>
                </li>
            @endforeach

            @auth
                <li class="border-b border-black/20">
                    <a href="/admin" class="block px-4 py-3 hover:bg-black/10 font-bold">ADMIN</a>
                </li>
            @endauth
        </ul>
    </div>
</nav>
