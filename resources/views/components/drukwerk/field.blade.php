@props(['label', 'name', 'for' => null])

<div>
    <label for="{{ $for ?? $name }}" class="mb-1.5 block font-medium text-white">{{ $label }}</label>

    {{ $slot }}

    @error($name)
        <p class="mt-1.5 text-sm text-red-400">{{ $message }}</p>
    @enderror
</div>
