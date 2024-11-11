@props(['value'])

<label {{ $attributes->merge(['class' => 'block text-xl text-sm text-white']) }}>
    {{ $value ?? $slot }}
</label>