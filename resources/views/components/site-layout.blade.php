<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lavir</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-[#87b2b1]">
    <div class="mx-auto max-w-6xl">
        <nav class="mt-16 mb-24 text-right">
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
        </nav>

        <main class="">

            <div class="border-b-2 border-black py-8 mb-12">
                <h1 class="text-7xl font-semibold">Title</h1>
            </div>

            {{$slot}}
        </main>
        <footer>
            <hr/>
            Dit wordt mijn footer
        </footer>

    </div>


</body>
</html>
