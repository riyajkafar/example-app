<!-- resources/views/components/textarea-input.blade.php -->

@props(['id', 'name', 'rows', 'value', 'required', 'class'])

<div class="mb-1">
    <x-input-label :for="$id" :value="$slot" />

    <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}"
        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm {{ $class }}"
        {{ $required ? 'required' : '' }}>{{ $value }}</textarea>

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
