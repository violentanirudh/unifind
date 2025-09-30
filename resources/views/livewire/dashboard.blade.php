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
                <h2 class="text-lg font-medium w-full truncate text-blue-600">
                    <a wire:navigate href="{{ route('item', $item->code) }}">{{ $item->name }}</a>
                </h2>
                <p class="mt-2 text-zinc-500 text-sm">{{ Str::limit($item->description, 100) }}</p>
                <div class="mt-2 flex justify-between">
                    <span class="text-sm text-zinc-500">{{ $item->created_at->diffForHumans() }} </span>
                    <span class="text-xs bg-zinc-100 px-2 py-1 rounded">
                        {{ $item->code }}
                    </span>
                </div>
                <!-- Actions -->
                @if (Gate::allows('delete-item', $item))
                    <x-button wire:click="delete({{ $item }})" class="mt-4 !bg-red-800 hover:bg-red-700 gap-2 text-sm">
                        <i class="ph-bold ph-trash text-white"></i>
                        <span class="text-white">Delete</span>
                    </x-button>
                @endif
            </div>
        @endforeach
    </div>

</div>
