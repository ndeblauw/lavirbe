<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', config('app.locale', 'nl')) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <x-site-layout-meta
        :title="$title"
        :description="$description"
        :type="$type"
        :image="$image"
        :image-alt="$imageAlt"
        :author="$author"
        :published-at="$publishedAt"
        :modified-at="$modifiedAt"
        :reading-time="$readingTime"
        :keywords="$keywords"
        :noindex="$noindex"
    />

    <x-site-layout-json-ld
        :title="$title"
        :description="$description"
        :type="$type"
        :image="$image"
        :image-alt="$imageAlt"
        :author="$author"
        :published-at="$publishedAt"
        :modified-at="$modifiedAt"
        :reading-time="$readingTime"
        :keywords="$keywords"
        :article-section="$articleSection"
        :breadcrumbs="$breadcrumbs"
    />

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.usefathom.com/script.js" data-site="QJWHUTWR" defer></script>

    <script type="speculationrules">
        {"prefetch":[{"source":"document","where":{"and":[{"href_matches":"/*"},{"not":{"href_matches":["/admin/*","/login","/register","/forgot-password","/logout","/contact","/*\\?(.+)"]}},{"not":{"selector_matches":"a[rel~=\"nofollow\"]"}},{"not":{"selector_matches":".no-prefetch, .no-prefetch a"}}]},"eagerness":"conservative"}]}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#87b2b1]">
    <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

        <x-site-layout-skip-link/>

        <x-site-layout-navigation/>

        <main id="content" class="text-xl">
            <div class="border-b-2 border-black pb-6 mb-8 md:pb-8 md:mb-12">
                <h1 class="text-5xl sm:text-6xl md:text-8xl font-light leading-tight">{!! $title !!}</h1>
            </div>

            {{$slot}}
        </main>

        <x-customer-logos/>

        <x-site-layout-footer/>

    </div>
</body>
</html>
