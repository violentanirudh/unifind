<div class="w-full" x-data="{
    mode: 'search'
}">

    <div class="mb-4">
        <a wire:navigate href="{{ route('dashboard') }}" class="text-blue-500 flex items-center gap-2">
            <i class="ph-bold ph-arrow-left"></i> Back
        </a>
    </div>

    <h1 class="text-xl font-medium">Report Missing Item</h1>
    <p class="text-sm text-zinc-500">Report your missing item with a breif description.</p>

    <form wire:submit.prevent="submit" class="space-y-4 mt-6">

        <div>
            <x-input type="text" wire:model.live.debounce.500ms="name" name="name" label="Item Name" placeholder="Enter lost or found item" />
            <p class='text-xs text-zinc-500 mt-1'>Start typing to see matching items from the feed.</p>
        </div>


        <ul x-show="mode === 'search'">
            @if (count($items) === 0 && strlen($name) >= 3)
                <li class="text-sm text-zinc-500 mb-2 py-4">
                    <p class="font-medium text-zinc-700">We couldn’t find any reports for
                        <span class="font-semibold">“{{ $name }}”</span>.
                    </p>
                    <p class="text-xs text-zinc-500 flex items-center gap-1 mt-2">
                        Try adjusting your search or
                        <button type="button" x-on:click="mode = 'form'" class="inline text-sm text-blue-500 font-medium hover:underline cursor-pointer">
                            Submit a new report
                        </button>
                    </p>
                </li>
            @endif

            @if (count($items) > 0)
                <li class="text-sm text-zinc-500 mb-2 py-2">
                    <div class="font-medium text-zinc-700">We found {{ count($items) }} matching items</div>
                    <p class="text-sm text-zinc-500">Please check if your item is listed below.</p>
                </li>
            @endif

            @foreach ($items as $item)
                <li class="flex items-center gap-2 mb-1 justify-between">
                    <a wire:navigate href="{{ route('item', $item->code) }}"
                    class="text-blue-500 truncate hover:underline">
                        {{ $item['name'] }}
                    </a>
                    <i class="ph-bold ph-arrow-right text-blue-500"></i>
                </li>
            @endforeach
        </ul>


        <div class="space-y-4" x-show="mode === 'form'">
            <x-input type="text" wire:model="location" name="location" label="Location" placeholder="Last seen location" />

            <x-textarea wire:model="description" name="description" label="Description" placeholder="Describe the issue" class="h-32 resize-none"  />

            <label class="flex flex-col mb-6">
                <span class="mb-1 text-sm text-zinc-700 font-medium">Image (optional)</span>
                <input type="file" wire:model="image" accept="image/*" class="hidden" />
                <div class="border border-zinc-300 px-3 py-2 rounded flex items-center gap-2 cursor-pointer hover:bg-zinc-50">
                    <i class="ph-bold ph-upload text-xl text-zinc-500"></i>
                    @if ($image)
                        {{-- If an image is selected, show its name --}}
                        <span class="text-sm text-zinc-700 truncate">{{ $image->getClientOriginalName() }}</span>
                        <button wire:click.prevent="removeImage" class="text-red-500 cursor-pointer">
                            <i class="ph-bold ph-x block"></i>
                        </button>
                    @else
                        {{-- Otherwise, show the default placeholder --}}
                        <span class="text-sm text-zinc-500">Click to upload an image</span>
                    @endif
                </div>
                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                <div class="mt-2 w-32 h-32 rounded bg-zinc-100 flex items-center justify-center overflow-hidden">
                @if ($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-32 h-32 object-cover ">
                @else
                    <i class="ph-bold ph-image text-4xl text-zinc-300"></i>
                @endif
                </div>
            </label>

            <div class="space-y-2 mb-8">
                <label class="block text-sm text-zinc-700 font-medium">Type</label>

                <div class="flex items-center gap-4">
                    <label class="flex items-center gap-2 text-zinc-700 cursor-pointer border border-zinc-300 px-3 py-1 rounded has-checked:bg-zinc-900 has-checked:text-white has-checked:border-zinc-900">
                        <input type="radio" wire:model="type" name="type" value="lost" class="hidden" />
                        <span class="text-sm">I lost this item</span>
                    </label>
                    <label class="flex items-center gap-2 text-zinc-700 cursor-pointer border border-zinc-300 px-3 py-1 rounded has-checked:bg-zinc-900 has-checked:text-white has-checked:border-zinc-900">
                        <input type="radio" wire:model="type" name="type" value="found" class="hidden" />
                        <span class="text-sm">I found this item</span>
                    </label>
                </div>
                @error('type')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
            </div>

            <x-button type="submit" value="Submit Report" wire:loading.remove />
            <x-button type="button" class="gap-2" wire:loading>
                <i class="ph-bold ph-spinner-gap animate-spin"></i>
                <span>Reporting...</span>
            </x-button>
        </div>
    </form>

</div>
