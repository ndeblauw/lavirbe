@props([
    'title' => 'LAVIR Drukwerk',
    'description' => 'Drukwerk, papier, textiel, buttons, patches, gadgets. LAVIR Drukwerk voorziet het juiste product voor jouw project.',
])

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $description }}">
    <meta name="robots" content="max-image-preview:large">

    <title>{{ $title }}</title>

    <link rel="icon" href="{{ config('drukwerk.company.logo') }}" sizes="any">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=poppins:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <script src="https://cdn.usefathom.com/script.js" data-site="QJWHUTWR" defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-drukwerk-bg font-poppins text-drukwerk-text antialiased">
    <x-drukwerk.header />

    <main>
        {{ $slot }}
    </main>

    <x-drukwerk.footer />

    <div id="print-widget-target" data-print-id="{{ config('drukwerk.widget_id') }}"></div>
    <script src="https://popup.print.com/widget.js?id={{ config('drukwerk.widget_id') }}"></script>
</body>
</html>
