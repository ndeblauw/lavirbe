<nav class="mt-16 mb-24 text-right">

    <ul class="flex gap-4 justify-end">
        <li><a href="/categories">Categorieën</a></li>
        <li><a href="/faqs">Faq</a></li>
        <li><a href="/articles">Artikels</a></li>
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
