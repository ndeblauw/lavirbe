<title>{{ $fullTitle() }}</title>
<meta name="description" content="{{ $description }}">
<meta name="robots" content="{{ $robotsContent() }}">
<link rel="canonical" href="{{ $canonical }}">

@if($author)
    <meta name="author" content="{{ $author }}">
@endif

@if(! empty($keywords))
    <meta name="keywords" content="{{ implode(', ', $keywords) }}">
@endif

<meta name="theme-color" content="#87b2b1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<meta property="og:locale" content="{{ str_replace('-', '_', config('app.locale', 'nl')) }}">
<meta property="og:type" content="{{ $type }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:site_name" content="{{ config('app.name', 'LAVIR') }}">

@if($image)
    <meta property="og:image" content="{{ $image }}">
    <meta property="og:image:alt" content="{{ $imageAlt }}">
@endif

@if($type === 'article')
    @if($publishedAt)
        <meta property="article:published_time" content="{{ $publishedAt }}">
    @endif
    @if($modifiedAt)
        <meta property="article:modified_time" content="{{ $modifiedAt }}">
    @endif
@endif

<meta name="twitter:card" content="{{ $image ? 'summary_large_image' : 'summary' }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $description }}">

@if($image)
    <meta name="twitter:image" content="{{ $image }}">
@endif

@if($author)
    <meta name="twitter:label1" content="Geschreven door">
    <meta name="twitter:data1" content="{{ $author }}">
@endif

@if($readingTime)
    <meta name="twitter:label2" content="Geschatte leestijd">
    <meta name="twitter:data2" content="{{ $readingTime }} minuten">
@endif

<link rel="dns-prefetch" href="//fonts.bunny.net">
<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>

<link rel="icon" href="/img/favicon-32.png" sizes="32x32">
<link rel="icon" href="/img/favicon-192.png" sizes="192x192">
<link rel="apple-touch-icon" href="/img/apple-touch-icon-180.png">
<meta name="msapplication-TileImage" content="/img/mstile-270.png">
