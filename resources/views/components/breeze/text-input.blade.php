@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'w-full border-2 border-black p-3 bg-white']) }}>
