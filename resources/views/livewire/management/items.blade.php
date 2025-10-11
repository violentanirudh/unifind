<div class="bg-white rounded-lg shadow overflow-hidden" x-data="{
    'usersForm': false,
    'claimedForm': false,
    'claimedId': null
}">
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
                        Status
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
                            @if ($item->status === 'lost')
                                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Lost</span>
                            @elseif ($item->status === 'found')
                                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Found</span>
                            @elseif ($item->status === 'deposited')
                                <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Deposited</span>
                            @elseif ($item->status === 'claimed')
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Claimed</span>
                            @elseif ($item->status === 'rejected')
                                <span class="bg-zinc-100 text-zinc-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Rejected</span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at->format('d M, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-3 pr-4">
                                {{-- Claimed Button --}}
                                <x-action-button
                                    :item="$item"
                                    icon="ph-bold ph-shield-check"
                                    popover="Mark this item as claimed."
                                    title="Claimed"
                                    color="text-green-600"
                                    hoverColor="hover:text-green-800"
                                    @click="claimedId = {{ $item->id }}; claimedForm = true;"
                                />

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

    <div class="fixed inset-0 bg-black/10 flex items-center justify-center z-50" x-show="claimedForm" x-transition.opacity>
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md" x-show="claimedForm" x-transition.scale>
            <h2 class="text font-semibold mb-4">Claim Item</h2>
            <div class="relative">
            <x-input wire:model.live.debounce.500ms="user" x-ref="user" label="User" class="mb-4" @keyup="usersForm = true"  />
                @if (!empty($usersList))
                    <div class="w-full absolute bg-white border border-gray-200 rounded-md shadow-lg max-h-60 overflow-y-auto" x-show="usersForm" @click.away="usersForm = false">
                        {{-- List of users --}}
                        @foreach ($usersList as $user)
                            <span
                                wire:key="{{ $user }}"
                                @click="$refs.user.value = '{{ $user }}'; usersForm = false;"
                                class="block w-full px-4 py-2 text-sm text-gray-800 cursor-pointer hover:bg-zinc-100 hover:text-zinc-900"
                            >{{ $user }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="flex justify-end space-x-4 text-sm font-medium">
                <button @click="claimedForm = false; claimedId = null;" class="cursor-pointer px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</button>
                <button wire.loading.class="cursor-not-allowed opacity-50" wire:click="updateStatus(claimedId, $refs.user.value)" class="cursor-pointer px-4 py-2 bg-blue-600 text-white flex items-center gap-2 rounded hover:bg-blue-700">
                    <i wire:loading class="ph-bold ph-spinner gap-2 animate-spin"></i>
                    <span>Claimed</span>
                </button>
            </div>
        </div>
    </div>

</div>
