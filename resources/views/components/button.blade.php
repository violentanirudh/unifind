@props([
    'type' => 'button',
    'name' => '',
    'class' => '',
    'value' => null,
])

<button type="{{ $type }}" class="bg-blue-600 px-6 py-4 rounded text-white cursor-pointer flex justify-center items-center text-sm {{ $class }}" {{ $attributes }}>
    {{ $value ?? $slot }}
</button>
