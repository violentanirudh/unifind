<div>

    <!-- Filters Button Group : Reported | Deposited | Claimed-->
    <label class="flex items-center justify-between border border-zinc-200 w-full gap-2 ring-zinc-200 focus-within:ring-4 focus-within:border-zinc-700 px-4 py-2 rounded">
        <i wire:loading.remove class="ph-bold ph-magnifying-glass text-zinc-500"></i>
        <i wire:loading class="ph-bold ph-spinner-gap text-zinc-500 animate-spin"></i>
        <input type="text" wire:model.live.debounce.500ms="search" name="search" placeholder="Search items..." class="w-full outline-none" />
    </label>

    <div class="divide-y divide-zinc-200 mt-6">
        @foreach ($items as $item)
            <div class="py-4" :key="{{ $item->id }}">
                <h2 class="text-lg font-medium w-full truncate text-blue-500">
                    <a wire:navigate href="{{ route('item', $item->code) }}">{{ $item->name }}</a>
                </h2>
                <p class="mt-2 text-zinc-500 text-sm">{{ Str::limit($item->description, 100) }}</p>
                <div class="mt-2 flex justify-between">
                    <span class="text-sm text-zinc-500">{{ $item->created_at->diffForHumans() }} </span>
                    <span class="text-xs bg-zinc-100 px-2 py-1 rounded">
                        {{ $item->code }}
                    </span>
                </div>
                @if ($user->id === $item->reported_by)
                    <span class="text-xs bg-green-100 px-2 py-1 rounded">
                        Reported by you
                    </span>
                @endif
            </div>
        @endforeach
    </div>


    <div class="flex justify-between items-center gap-4 mt-10 flex-row-reverse">
         @if ($items->nextPageUrl())
            <a href="{{ $items->nextPageUrl() }}" class="text-blue-500 flex items-center gap-2">
                Next
                <i class="ph-bold ph-arrow-right"></i>
            </a>
        @endif

        @if ($items->previousPageURL())
            <a href="{{ $items->previousPageUrl() }}" class="text-blue-500 flex items-center gap-2">
                <i class="ph-bold ph-arrow-left"></i>
                Previous
            </a>
        @endif
    </div>

</div>
