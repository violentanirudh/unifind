<div>

    <!-- Filters Button Group : Reported | Deposited | Claimed-->
    <label class="flex items-center justify-between bg-white shadow shadow-xl shadow-blue-200/20 border-blue-200 w-full gap-2 ring-zinc-200 focus-within:ring-4 focus-within:border-zinc-700 px-6 py-4 rounded-lg">
        <i wire:loading.remove class="ph-bold ph-magnifying-glass text-xl text-zinc-500"></i>
        <i wire:loading class="ph-bold ph-spinner-gap text-xl text-zinc-500 animate-spin"></i>
        <input type="text" wire:model.live.debounce.500ms="search" name="search" placeholder="Search items..." class="w-full outline-none" />
    </label>

    <div class="mt-6">

        <h1 class="text-2xl font-bold mb-6">Recent Items</h1>

        {{-- The main grid container --}}
        <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-2 gap-6">

            @foreach ($items as $item)
                {{-- Each card is a link, making the whole unit clickable --}}
                <a wire:navigate href="{{ route('item', $item->code) }}" :key="{{ $item->id }}"
                class="group relative aspect-square rounded-lg overflow-hidden shadow-lg transition-transform duration-300 hover:scale-105 bg-zinc-800"
                >

                    @if ($item->image_path)
                        <div
                            style="background-image: url('{{ $item->image_path }}')"
                            class="absolute inset-0 bg-cover bg-center transition-transform duration-300 group-hover:scale-110"
                        ></div>

                        <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                    @else
                        <div class="w-full h-full bg-zinc-100 flex items-center justify-center">
                            <i class="ph-bold ph-image text-5xl text-zinc-400"></i>
                        </div>
                    @endif

                    <div class="relative h-full flex flex-col justify-between text-white">

                        <div class="flex justify-between items-center p-4">
                            <span class="text-xs bg-black/60 backdrop-blur-sm px-3 py-1 rounded-full font-mono">
                                {{ $item->code }}
                            </span>
                            <span class="text-xs text-zinc-200">{{ $item->created_at->diffForHumans() }}</span>
                        </div>

                        <div class="w-full pt-8 bg-gradient-to-t from-black/80 to-transparent p-4">
                            <h2 class="text-lg font-bold truncate">{{ $item->name }}</h2>
                            <p class="text-sm text-zinc-300 line-clamp-2">{{ $item->description }}</p>
                        </div>

                    </div>
                </a>
            @endforeach
        </div>
    </div>

    <div class="flex justify-between items-center gap-4 mt-10 flex-row-reverse">
         @if ($items->nextPageUrl())
            <a href="{{ $items->nextPageUrl() }}" class="text-blue-500 flex items-center gap-2">
                Next
                <i class="ph-bold ph-arrow-right"></i>
            </a>
        @endif
        <span></span>
        @if ($items->previousPageURL())
            <a href="{{ $items->previousPageUrl() }}" class="text-blue-500 flex items-center gap-2">
                <i class="ph-bold ph-arrow-left"></i>
                Previous
            </a>
        @endif
    </div>

</div>
