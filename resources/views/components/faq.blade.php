@props(['question', 'answer'])

<div x-data="{ open: false }" class="overflow-hidden">
    <h2>
        <button
            type="button"
            class="cursor-pointer flex items-center justify-between gap-2 w-full py-2 font-medium focus:outline-none text-left"
            @click="open = !open"
        >
            <span class="text-base">{{ $question }}</span>
            <i class="ph-bold ph-caret-down"></i>
        </button>
    </h2>
    <div
        x-show="open"
        x-collapse
        x-cloak
        class="text-zinc-500 text-sm"
    >
        <p>{{ $answer }}</p>
    </div>
</div>
