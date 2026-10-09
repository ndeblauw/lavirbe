@php($company = config('drukwerk.company'))

<footer class="mx-auto w-full max-w-[1100px] px-5 py-8 text-sm text-drukwerk-footer">
    <div class="grid gap-8 border-t border-drukwerk-footer-border pt-8 sm:grid-cols-3">
        <div>
            <h2 class="mb-3 text-base font-semibold text-white">{{ $company['name'] }}</h2>
            <p>{{ $company['tagline'] }}</p>
        </div>

        <div>
            <h2 class="mb-3 text-base font-semibold text-white">Social media</h2>
            <a
                href="{{ $company['instagram'] }}"
                target="_blank"
                rel="noopener"
                class="inline-flex items-center gap-2 text-drukwerk-teal hover:underline"
            >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5" aria-hidden="true">
                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                </svg>
                Instagram
            </a>
        </div>

        <div>
            <h2 class="mb-3 text-base font-semibold text-white">Contact</h2>
            <p>
                {{ $company['legal_name'] }}<br>
                {{ $company['vat'] }}<br>
                {{ $company['address'] }}
            </p>
            <p class="mt-2">
                <a href="mailto:{{ $company['email'] }}" class="text-drukwerk-teal hover:underline">{{ $company['email'] }}</a>
            </p>
        </div>
    </div>

    <div class="mt-8 border-t border-drukwerk-footer-border pt-6">
        <p>Copyright &copy; {{ date('Y') }} <a href="/" class="text-drukwerk-teal hover:underline">{{ $company['name'] }}</a></p>
    </div>
</footer>
