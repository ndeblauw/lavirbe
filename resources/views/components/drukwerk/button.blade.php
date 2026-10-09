@props(['href' => null])

@php
    $classes = 'inline-block rounded-full bg-gradient-to-br from-drukwerk-blue to-drukwerk-teal px-8 py-3.5 text-base font-bold text-white no-underline transition-opacity hover:opacity-90 focus:outline-none focus-visible:ring-2 focus-visible:ring-drukwerk-teal focus-visible:ring-offset-2 focus-visible:ring-offset-drukwerk-bg';
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</a>
@else
    <button type="submit" {{ $attributes->merge(['class' => $classes]) }}>{{ $slot }}</button>
@endif
