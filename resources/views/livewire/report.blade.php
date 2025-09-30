<div class="w-full">

    <div class="mb-4">
        <a wire:navigate href="{{ url()->previous() }}" class="text-blue-500 flex items-center gap-2">
            <i class="ph-bold ph-arrow-left"></i> Back
        </a>
    </div>

    <h1 class="text-xl font-medium">Report Issue</h1>
    <p class="text-sm text-zinc-500">Report your missing item with a breif description.</p>

    <form wire:submit.prevent="submit" class="space-y-4 mt-6">
        <x-input type="text" wire:model="name" name="name" label="Name" placeholder="Item name" />
        <x-textarea wire:model="description" name="description" label="Description" placeholder="Describe the issue" class="h-32 resize-none"  />

        <label class="flex flex-col mb-6">
            <span class="mb-1 text-sm text-zinc-700 font-medium">Image (optional)</span>
            <input type="file" wire:model="image" accept="image/*" class="hidden" />
            <div class="border border-zinc-300 px-3 py-2 rounded flex items-center gap-2 cursor-pointer hover:bg-zinc-50">
                <i class="ph-bold ph-upload text-xl text-zinc-500"></i>
                <span class="text-sm text-zinc-500">Click to upload an image</span>
            </div>
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="mt-2 w-32 h-32 object-cover rounded">
            @endif
            @error('image') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </label>

        <x-button type="submit" value="Submit Report" wire:loading.remove />
        <x-button type="button" class="gap-2" wire:loading>
            <i class="ph-bold ph-spinner-gap animate-spin"></i>
            <span>Reporting...</span>
        </x-button>
    </form>

</div>
