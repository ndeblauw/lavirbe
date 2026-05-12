<div>
    <div>
        Dit wordt mijn header

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
    </div>

    {{$slot}}

    <div>
        <hr/>
        Dit wordt mijn footer
    </div>
</div>
