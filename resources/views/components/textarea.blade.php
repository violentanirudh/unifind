@props([
    'name' => '',
    'value' => '',
    'label' => '',
    'placeholder' => '',
    'class' => '',
])

<div>
    <label for="{{ $name ?? '' }}" class="block mb-1 font-medium text-zinc-700 text-sm">
        {{ $label ?? '' }}
    </label>
    <textarea
        name="{{ $name ?? '' }}"
        value="{{ $value ?? '' }}"
        placeholder="{{ $placeholder ?? '' }}"
        class="border rounded px-3 py-2 w-full border-zinc-300 text-sm {{ $class ?? '' }}"
        {{ $attributes }}
    ></textarea>
    @error($name)
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror
</div>
