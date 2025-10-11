<div>

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
                @if (auth()->id() === $item->reported_by)
                    <span class="text-xs bg-green-100 px-2 py-1 rounded">
                        Reported by you
                    </span>
                @endif
            </div>
        @endforeach
    </div>

</div>
