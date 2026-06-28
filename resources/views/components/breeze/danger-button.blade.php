<button {{ $attributes->merge(['type' => 'submit', 'class' => 'border-2 border-red-600 px-8 py-3 text-xl font-semibold text-red-600 hover:bg-red-600 hover:text-white transition-colors']) }}>
    {{ $slot }}
</button>
