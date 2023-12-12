<!-- resources/views/components/textarea-input.blade.php -->

@props(['id', 'name', 'rows', 'value', 'required', 'class'])

<div>
    <x-input-label :for="$id" :value="$slot" />

    <textarea id="{{ $id }}" name="{{ $name }}" rows="{{ $rows }}" class="border border-gray-300
        rounded-md px-3 py-2 w-full {{ $class }}" {{ $required ? 'required' : '' }}>{{ $value }}</textarea>

    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>