@props([
    'item',
    'icon',
    'popover',
    'title',
    'color' => 'text-gray-600',
    'hoverColor' => 'hover:text-gray-800',
])

<div x-data="{ open: false }" class="relative">
    <button
        @mouseover="open = true"
        @mouseleave="open = false"
        title="{{ $title }}"
        {{ $attributes->merge(['class' => $color . ' ' . $hoverColor . ' cursor-pointer']) }}
    >
        <i class="{{ $icon }} text-xl"></i>
    </button>
    <!-- Popover Content -->
    <div
        x-ref="popover"
        x-show="open"
        x-cloak
        x-init="
            $watch('open', isOpen => {
                if (!isOpen) return;

                $nextTick(() => {
                    const popover = $refs.popover;

                    popover.style.left = '50%';
                    popover.style.right = 'auto';
                    popover.style.transform = 'translateX(-50%)';

                    const popoverRect = popover.getBoundingClientRect();
                    const boundaryPadding = 16;

                    if (popoverRect.right > (window.innerWidth - boundaryPadding)) {
                        popover.style.left = 'auto';
                        popover.style.right = '0';
                        popover.style.transform = 'translateX(0)';
                    }

                    if (popoverRect.left < boundaryPadding) {
                        popover.style.left = '0';
                        popover.style.right = 'auto';
                        popover.style.transform = 'translateX(0)';
                    }
                });
            })
        "
        class="absolute bottom-full mb-2 w-max max-w-xs bg-zinc-800 text-zinc-200 text-xs rounded-md px-3 py-2 z-10"
    >
        {{ $popover }}
    </div>
</div>
