@php
    $menu_items = [
        ['name' => 'Categorieën', 'url' => 'categories'],
        ['name' => 'Faq', 'url' => 'faqs'],
        ['name' => 'Artikels', 'url' => 'articles'],
    ];

    $current_route = request()->route()->uri();
@endphp

<nav class="mt-16 mb-24 text-right">

    <ul class="flex gap-4 justify-end">
        @foreach($menu_items as $item)
            <li class="border-b @if($current_route == $item['url']) border-black @else border-transparent @endif hover:border-dotted hover:border-black px-2 py-1">
                <a href="/{{$item['url']}}">{{$item['name']}}</a>
            </li>
        @endforeach
    </ul>


    @auth
        | <span style="color: blue"> {{auth()->user()->name}} </span>

        @if(auth()->user()->is_admin)
            | Beheer:
            <a href="{{route('admin.categories.index')}}">Categorieën</a>
            <a href="{{route('admin.faqs.index')}}">Faqs</a>
            <a href="{{route('admin.users.index')}}">Users</a>
        @endif

    @else
        <a href="{{route('login')}}">Login</a>
        or
        <a href="{{route('register')}}">Register</a>
    @endauth

    <hr/>
</nav>
