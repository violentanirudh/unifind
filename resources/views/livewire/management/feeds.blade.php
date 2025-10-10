<div class="bg-white rounded-lg shadow overflow-hidden">
    {{-- Search Input --}}
    <div class="p-4">
        <x-input wire:model.live.debounce.750ms="search" placeholder="Search reports..." class="w-full" />
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Code
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Reported By
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Created
                    </th>
                    <th scope="col" class="px-6 py-3 text-right">
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($items as $item)
                    <tr class="bg-white border-b border-zinc-200 hover:bg-zinc-50" wire:key="{{ $item->id }}">
                        <th scope="row" class="px-6 py-4 font-medium text-zinc-900 whitespace-nowrap flex gap-4 items-center">

                            {{-- Green dot to display is_visible state --}}
                            <div class="h-2 w-2 rounded-full {{ $item->is_visible ? 'bg-green-400' : 'bg-zinc-200' }}">
                            </div>

                            {{ $item->name }}
                        </th>
                        <td class="w-24 text-center">
                            {{  $item->code }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->reporter->name ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at->format('d M, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-3">
                                {{-- Approve Button --}}
                                <button wire:click="approve({{ $item->id }})" title="Approve" class="text-green-600 hover:text-green-800 cursor-pointer">
                                    <i class="ph-bold ph-check-circle text-xl"></i>
                                </button>

                                {{-- Edit Button --}}
                                <button @click="showSidebar = true" title="Edit" class="text-blue-600 hover:text-blue-800 cursor-pointer">
                                    <i class="ph-bold ph-pencil-simple text-xl"></i>
                                </button>

                                {{-- Delete Button with confirmation --}}
                                <button
                                    wire:click="delete({{ $item->id }})"
                                    wire:confirm="Are you sure you want to delete this report?"
                                    title="Delete"
                                    class="text-red-600 hover:text-red-800">
                                    <i class="ph-bold ph-trash text-xl"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" wclass="px-6 py-4 text-center text-gray-500 bg-zinc-200">
                            <div class="flex flex-col items-center justify-center py-4">
                                <i class="ph-bold ph-file-magnifying-glass text-4xl mb-2"></i>
                                No reports found.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="flex justify-between items-center gap-4 p-6 text-sm text-zinc-700">

        <span>Showing Page {{ $items->currentPage() }} of {{ $items->lastPage()  }}</span>

        <div class="flex gap-6 flex-row-reverse">
         @if ($items->nextPageUrl())
            <a wire:navigate href="{{ $items->nextPageUrl() }}" class="text-blue-500 flex items-center gap-2">
                Next
                <i class="ph-bold ph-arrow-right"></i>
            </a>
        @endif
        <span></span>
        @if ($items->previousPageURL())
            <a wire:navigate href="{{ $items->previousPageUrl() }}" class="text-blue-500 flex items-center gap-2">
                <i class="ph-bold ph-arrow-left"></i>
                Previous
            </a>
        @endif
        </div>
    </div>
</div>
