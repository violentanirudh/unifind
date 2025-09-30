<div>

    <div class="mb-4">
        <a wire:navigate href="{{ route('dashboard') }}" class="text-blue-500 flex items-center gap-2">
            <i class="ph-bold ph-arrow-left"></i> Back
        </a>
    </div>

    <div class="w-full aspect-square mb-4 bg-zinc-100 rounded-lg overflow-hidden">
        @if ($item->image_path)
            <img src="{{ $item->image_path }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
        @endif
    </div>
    <h1 class="text-lg font-medium">{{ $item->name }}</h1>
    <p class="text-sm text-zinc-500 mt-2">Reported On: {{ $item->created_at->format('d M Y') }}</span></p>
    <p class="text-zinc-500 text-sm mt-2 text-zinc-500">{{ $item->description }}</p>


    <div class="mt-4">
        @php
            $statusColors = [
                'lost' => 'bg-red-100 text-red-700',
                'found' => 'bg-amber-100 text-amber-700',
                'deposited' => 'bg-blue-100 text-blue-700',
                'claimed' => 'bg-green-100 text-green-700',
            ];
        @endphp

        <span class="px-3 py-1 rounded-full text-xs font-medium {{ $statusColors[$item->status] ?? 'bg-zinc-100 text-zinc-600' }}">
            {{ ucfirst($item->status) }}
        </span>
    </div>

</div>
