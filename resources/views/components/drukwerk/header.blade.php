@php($company = config('drukwerk.company'))

<header class="mx-auto flex w-full max-w-[1100px] items-center gap-4 px-5 py-5">
    <a href="/" class="shrink-0" aria-label="{{ $company['name'] }}">
        <img
            src="{{ $company['logo'] }}"
            width="50"
            height="50"
            alt=""
            class="h-[50px] w-[50px] rounded-full"
        >
    </a>

    <div>
        <p class="text-[22px] leading-tight font-bold text-white">
            <a href="/" class="text-inherit no-underline">{{ $company['name'] }}</a>
        </p>
        <p class="text-xs font-light">{{ $company['tagline'] }}</p>
    </div>
</header>
