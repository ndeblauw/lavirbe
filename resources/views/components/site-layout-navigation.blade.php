@php
    $menu_items = [
        ['name' => 'Home', 'url' => ''],
        ['name' => 'Categorieën', 'url' => 'categories'],
        ['name' => 'Faq', 'url' => 'faqs'],
        ['name' => 'Artikels', 'url' => 'articles'],
        ['name' => 'Contact', 'url' => 'contact'],
    ];

    $current_route = request()->route()->uri();
@endphp

@if(auth()->check() && auth()->user()->is_admin)
    <div class="w-full p-2 bg-gray-700 text-white flex gap-4 justify-between">
        <div>ADMIN PANEL</div>
        <div>
            <a class="px-2 hover:bg-gray-900" href="{{route('admin.categories.index')}}">Categorieën</a>
            <a class="px-2 hover:bg-gray-900" href="{{route('admin.articles.index')}}">Artikels</a>
            <a class="px-2 hover:bg-gray-900" href="{{route('admin.faqs.index')}}">Faqs</a>
            <a class="px-2 hover:bg-gray-900" href="{{route('admin.users.index')}}">Users</a>
            <a class="px-2 hover:bg-gray-900" href="{{route('admin.contacts.index')}}">Contacts</a>
        </div>
    </div>
@endif

<nav class="mt-16 mb-24 text-right">
    <ul class="flex gap-4 justify-end">
        @foreach($menu_items as $item)
            <li class="border-b @if($current_route == $item['url']) border-black @else border-transparent @endif hover:border-dotted hover:border-black px-2 py-1">
                <a href="/{{$item['url']}}">{{$item['name']}}</a>
            </li>
        @endforeach

            <li class="px-2 py-1"> | </li>
            @auth
                <li class="px-2 py-1"><span> {{auth()->user()->name}} </span></li>
            @else
                <li class="px-2 py-1"><a href="{{route('login')}}">Login</a>
                or
                    <a href="{{route('register')}}">Register</a></li>
            @endauth

    </ul>

</nav>
