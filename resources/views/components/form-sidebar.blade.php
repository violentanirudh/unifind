<div class="">
    <div x-show="showSidebar" x-on:click="showSidebar = false" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-900/60 z-30"></div>

    <aside
        x-show="showSidebar"
        x-transition:enter="transition ease-in-out duration-300 transform"
        x-transition:enter-start="translate-x-full"
        x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in-out duration-300 transform"
        x-transition:leave-start="translate-x-0"
        x-transition:leave-end="translate-x-full"
        class="fixed top-0 right-0 h-full w-full max-w-md bg-white z-40 shadow-xl"
        style="display: none;"
    >

        <div class="flex flex-col h-full">
            <header class="flex items-center justify-between p-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-800">Edit Item Report</h2>
                <button @click="showSidebar = false" class="text-gray-500 hover:text-gray-800">
                    <i class="ph-bold ph-x text-xl"></i>
                </button>
            </header>

            <div class="flex-grow p-6 overflow-y-auto">
                {{--
                    NOTE: In a real Livewire component, you would pre-populate the `wire:model`
                    properties in your component's `mount()` or `edit()` method.

                    e.g., $this->name = $item->name;
                           $this->location = $item->location;
                --}}
                <div class="w-full" x-data="{ mode: 'form' }"> <form wire:submit.prevent="update" class="space-y-4">

                        {{-- The 'name' input is always visible in edit mode --}}
                        <x-input type="text" wire:model="name" name="name" label="Item Name" placeholder="e.g., Black Leather Wallet" />

                        {{-- The rest of the form is wrapped in the x-show="mode === 'form'" div --}}
                        <div class="space-y-4" x-show="mode === 'form'">
                            <x-input type="text" wire:model="location" name="location" label="Location" placeholder="e.g., Library, 2nd Floor" />

                            <x-textarea wire:model="description" name="description" label="Description" placeholder="Describe the item" class="h-32 resize-none" />

                            <label class="flex flex-col mb-6">
                                <span class="mb-1 text-sm text-zinc-700 font-medium">Image</span>
                                <input id="imageUpload" type="file" wire:model="image" accept="image/*" class="sr-only" />
                                <label for="imageUpload" class="border border-zinc-300 px-3 py-2 rounded flex items-center gap-2 cursor-pointer hover:bg-zinc-50">
                                    <i class="ph-bold ph-upload text-xl text-zinc-500"></i>
                                    <span class="text-sm text-zinc-700 truncate">Change image...</span>
                                </label>
                                @error('image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                <div class="mt-2 w-32 h-32 rounded bg-zinc-100 flex items-center justify-center overflow-hidden">
                                    <img src="https://placehold.co/400x400/e2e8f0/64748b?text=Wallet" alt="Dummy Image Preview" class="w-full h-full object-cover">
                                </div>
                            </label>

                            <div class="space-y-2 mb-8">
                                <label class="block text-sm text-zinc-700 font-medium">Type</label>
                                <div class="flex items-center gap-4">
                                    {{-- The 'lost' radio is checked for this dummy data --}}
                                    <label class="flex items-center gap-2 text-zinc-700 cursor-pointer border px-3 py-1 rounded has-checked:bg-zinc-900 has-checked:text-white has-checked:border-zinc-900 border-zinc-900 bg-zinc-900 text-white">
                                        <input type="radio" wire:model="type" name="type" value="lost" class="hidden" checked />
                                        <span class="text-sm">I lost this item</span>
                                    </label>
                                    <label class="flex items-center gap-2 text-zinc-700 cursor-pointer border border-zinc-300 px-3 py-1 rounded has-checked:bg-zinc-900 has-checked:text-white has-checked:border-zinc-900">
                                        <input type="radio" wire:model="type" name="type" value="found" class="hidden" />
                                        <span class="text-sm">I found this item</span>
                                    </label>
                                </div>
                                @error('type')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                            </div>

                            <x-button type="submit" value="Update Report" wire:loading.remove />
                            <x-button type="button" class="gap-2" wire:loading>
                                <i class="ph-bold ph-spinner-gap animate-spin"></i>
                                <span>Updating...</span>
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </aside>
</div>
