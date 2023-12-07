@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 text-red-600']) }}>
    {{ $value ?? $slot }}
</label>
