@props([
    'toast' => session('toast'),
])

@php
    $type = $toast['type'] ?? null;
    $message = $toast['message'] ?? $toast;
@endphp

<div>
    @if ($toast)
        <div class="
            bg-{{ $type === 'error' ? 'red' : 'green' }}-100 border
            border-{{ $type === 'error' ? 'red' : 'green' }}-400
            text-{{ $type === 'error' ? 'red' : 'green' }}-700
            px-4 py-3 rounded relative mb-4"
        >
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif
</div>
