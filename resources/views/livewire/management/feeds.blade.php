<div class="bg-white rounded-lg shadow overflow-hidden" x-data="{
    'deleteForm': false,
    'deleteId': null,
    'editForm': false,
    'editId': null,
    'approveForm': false,
    'approveId': null,
    'usersForm': false,
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
                        Points
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
                            {{ $item->points ?? 'N/A' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->created_at->format('d M, Y') }}
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center space-x-3">
                                {{-- Approve/Disapprove Button --}}
                                @if (!$item->is_visible)
                                    <x-action-button
                                        :item="$item"
                                        icon="ph-bold ph-x-circle"
                                        popover="Click to disapprove"
                                        title="Disapprove"
                                        color="text-red-600"
                                        hoverColor="hover:opacity-75"
                                        wire:click="approve({{ $item->id }}, 0)"
                                    />
                                @else
                                    <x-action-button
                                        :item="$item"
                                        icon="ph-bold ph-check-circle"
                                        popover="Click to approve"
                                        title="Approve"
                                        color="text-green-600"
                                        hoverColor="hover:opacity-75"
                                        @click="approveForm = true; approveId = {{ $item->id }}"
                                    />
                                @endif

                                {{-- Edit Button --}}
                                <x-action-button
                                    :item="$item"
                                    icon="ph-bold ph-vault"
                                    popover="Mark item as deposited."
                                    title="Deposit"
                                    color="text-blue-600"
                                    hoverColor="hover:text-blue-800"
                                    @click="editId = {{ $item->id }}; editForm = true;"
                                />

                                {{-- Delete Button --}}
                                <x-action-button
                                    :item="$item"
                                    icon="ph-bold ph-trash"
                                    popover="Permanently delete this item. This action cannot be undone."
                                    title="Delete"
                                    color="text-red-600"
                                    hoverColor="hover:text-red-800"
                                    @click="deleteId = {{ $item->id }}; deleteForm = true;"
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

    <div class="fixed inset-0 bg-black/10 flex items-center justify-center z-50" x-show="deleteForm" x-transition.opacity>
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md" x-show="deleteForm" x-transition.scale>
            <h2 class="text font-semibold mb-4">Confirm Deletion</h2>
            <p class="mb-4 text-sm">Are you sure you want to delete this item? This action cannot be undone.</p>
            <div class="flex justify-end space-x-4 text-sm font-medium">
                <button @click="deleteForm = false; deleteId = null;" class="cursor-pointer px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</button>
                <button wire:click="delete(deleteId)" class="cursor-pointer px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 bg-black/10 flex items-center justify-center z-50" x-show="approveForm" x-transition.opacity>
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md" x-show="approveForm" x-transition.scale>
            <h2 class="text font-semibold mb-4">Approve Item</h2>
            <x-input x-ref="points" label="Set Reward Points" class="mb-4" />
            <div class="flex justify-end space-x-4 text-sm font-medium">
                <button @click="approveForm = false; approveId = null;" class="cursor-pointer px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</button>
                <button wire:click="approve(approveId, $refs.points.value)" class="cursor-pointer px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Approve</button>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 bg-black/10 flex items-center justify-center z-50" x-show="editForm" x-transition.opacity>
        <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md" x-show="editForm" x-transition.scale>
            <h2 class="text font-semibold mb-4">Edit Item</h2>
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
                <button @click="editForm = false; editId = null;" class="cursor-pointer px-4 py-2 bg-gray-200 text-gray-700 rounded hover:bg-gray-300">Cancel</button>
                <button wire:click="updateStatus(editId, $refs.user.value)" class="cursor-pointer px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Deposited</button>
            </div>
        </div>
    </div>

</div>
