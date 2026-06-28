<button {{ $attributes->merge(['type' => 'button', 'class' => 'border-2 border-black px-8 py-3 text-xl font-semibold hover:bg-black hover:text-white transition-colors']) }}>
    {{ $slot }}
</button>
