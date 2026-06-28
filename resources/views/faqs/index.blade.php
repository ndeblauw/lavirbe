<x-site-layout
    :title="$seo['title'] ?? 'Veelgestelde vragen'"
    :description="$seo['description'] ?? null"
>

    @foreach($faqs as $faq)
        <div class="mt-8">
            <h2 class="text-2xl md:text-3xl mb-2">{{$faq->category->title}} - {{ $faq->question }}</h2>
            <p class="ml-4">{{ $faq->answer }}</p>
        </div>
    @endforeach

</x-site-layout>
