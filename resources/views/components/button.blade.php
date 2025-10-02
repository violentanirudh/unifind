@props([
    'type' => 'button',
    'name' => '',
    'class' => '',
    'value' => null,
])

<button type="{{ $type }}" class="bg-zinc-900 px-3 py-2 rounded text-white cursor-pointer flex justify-center items-center text-sm {{ $class }}" {{ $attributes }}>
    {{ $value ?? $slot }}
</button>
