<x-site-layout title="Veelgestelde vragen">

    <h1>Frequently Asked Questions</h1>

    @foreach($faqs as $faq)
        <div>
            <h2>{{$faq->category->name}} - {{ $faq->question }}</h2>
            <p>{{ $faq->answer }}</p>
        </div>
    @endforeach

</x-site-layout>
