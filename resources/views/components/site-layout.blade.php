@props([
    'title' => 'Lavir',
])

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
    <div class="mx-auto max-w-5xl">

        <x-site-layout-navigation/>

        <main class="">
            <div class="border-b-3 border-black pb-8 mb-12">
                <h1 class="text-8xl font-light">{{$title}}</h1>
            </div>

            {{$slot}}
        </main>

        <x-customer-logos/>

        <x-site-layout-footer/>

    </div>
</body>
</html>
