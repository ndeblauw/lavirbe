@php
    $menu_items = [
        ['name' => 'Categorieën', 'url' => 'categories'],
        ['name' => 'Faq', 'url' => 'faqs'],
        ['name' => 'Artikels', 'url' => 'articles'],
    ];

    $current_route = request()->route()->uri();
@endphp

<nav class="mt-16 mb-24 text-right">
    @if(auth()->check() && auth()->user()->is_admin)
    <div class="absolute right-0 top-0 p-4 bg-gray-700 text-white">
            <a class="px-2 hover:bg-gray-900" {{route('admin.categories.index')}}">Categorieën</a>
            <a class="px-2 hover:bg-gray-900" {{route('admin.faqs.index')}}">Faqs</a>
            <a class="px-2 hover:bg-gray-900" {{route('admin.users.index')}}">Users</a>
    </div>
    @endif

    <ul class="flex gap-4 justify-end">
        @foreach($menu_items as $item)
            <li class="border-b @if($current_route == $item['url']) border-black @else border-transparent @endif hover:border-dotted hover:border-black px-2 py-1">
                <a href="/{{$item['url']}}">{{$item['name']}}</a>
            </li>
        @endforeach
    </ul>


    @auth
        | <span style="color: blue"> {{auth()->user()->name}} </span>


    @else
        <a href="{{route('login')}}">Login</a>
        or
        <a href="{{route('register')}}">Register</a>
    @endauth

    <hr/>
</nav>
