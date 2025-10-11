{{--
    Livewire View for Managing Rewards
    - This view is rendered by the App\Livewire\Management\Rewards component.
    - It now uses custom Blade components for form elements.
--}}
<div class="container mx-auto">
    <!-- Session Status Message -->
    @if (session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative mb-6" role="alert">
            <span class="block sm:inline">{{ session('status') }}</span>
        </div>
    @endif

    <!-- Add New Reward Form -->
    <div class="bg-white p-6 sm:p-8 rounded shadow-lg mb-8">
        <h2 class="text-xl font-bold text-zinc-700 mb-4">Add a New Reward</h2>

        {{-- The form now submits to the `store` method in the component --}}
        <form wire:submit.prevent="store" class="space-y-4">
            @csrf

            {{-- Title Input using x-input component --}}
            <x-input
                label="Title"
                type="text"
                name="title"
                wire:model="title"
                required
            />

            {{-- Description Input using x-textarea component --}}
            <x-textarea
                label="Description"
                name="description"
                wire:model="description"
                rows="3"
            />

            {{-- Points Required Input using x-input component --}}
            <x-input
                label="Points Required"
                type="number"
                name="points_required"
                wire:model="points_required"
                min="0"
                required
            />

            {{-- Submit Button using x-button component --}}
            <div class="text-right">
                <x-button type="submit" class="font-bold transition duration-300 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <span wire:loading.remove wire:target="store">Add Reward</span>
                    <span wire:loading wire:target="store">Saving...</span>
                </x-button>
            </div>
        </form>
    </div>

    <!-- Existing Rewards Table -->
    <div class="bg-white rounded shadow-lg overflow-hidden">
        <div class="p-6">
             <h2 class="text-xl font-bold text-zinc-700">Existing Rewards</h2>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-zinc-200">
                <thead class="bg-zinc-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Title</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Description</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-zinc-500 uppercase tracking-wider">Points</th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-zinc-200">
                    @forelse ($rewards as $reward)
                        {{-- Add a wire:key for Livewire's DOM diffing --}}
                        <tr wire:key="{{ $reward->id }}">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-zinc-900">{{ $reward->title }}</td>
                            <td class="px-6 py-4 whitespace-normal text-sm text-zinc-600 max-w-sm">{{ $reward->description }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-zinc-600">{{ $reward->points_required }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                {{-- The delete button now uses x-button with custom styling --}}
                                <x-button
                                    wire:click="delete({{ $reward->id }})"
                                    wire:confirm="Are you sure you want to delete this reward?"
                                    class="!bg-transparent !text-red-600 !p-0 !shadow-none hover:!text-red-900 font-medium">
                                    Delete
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-sm text-zinc-500">
                                No rewards have been created yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination links --}}
        @if($rewards->hasPages())
        <div class="p-6 bg-zinc-50 border-t border-zinc-200">
            {{ $rewards->links() }}
        </div>
        @endif
    </div>
</div>

