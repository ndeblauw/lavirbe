<div>
    <div>
        Dit wordt mijn header

        @auth
            | <span style="color: blue"> {{auth()->user()->name}} </span>


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
