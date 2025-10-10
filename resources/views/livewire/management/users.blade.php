<div class="bg-white rounded-lg shadow overflow-hidden">
    {{-- Search Input --}}
    <div class="p-4">
        <x-input wire:model.live.debounce.750ms="search" placeholder="Search users by name or email..." class="w-full" />
    </div>

    {{-- Users Table --}}
    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        User
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Joined Date
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Actions</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr class="bg-white border-b border-zinc-200 hover:bg-zinc-50" wire:key="{{ $user->id }}">

                        {{-- User Name & Email --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                {{-- You can replace this with an avatar if you have one --}}
                                <div class="h-10 w-10 flex-shrink-0">
                                    <div class="flex items-center justify-center h-full w-full rounded-full bg-gray-200 text-gray-500 font-semibold">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-base font-semibold text-gray-900">{{ $user->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>

                        {{-- Status Badge --}}
                        <td class="px-6 py-4">
                            @if ($user->is_active)
                                <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Active</span>
                            @else
                                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full">Inactive</span>
                            @endif
                        </td>

                        {{-- Role Badge --}}
                        <td class="px-6 py-4">
                           <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full capitalize">{{ $user->role }}</span>
                        </td>

                        {{-- Joined Date --}}
                        <td class="px-6 py-4">
                            {{ $user->created_at->format('d M, Y') }}
                        </td>

                        {{-- Action Buttons --}}
                        <td class="px-6 py-4">
                            <div class="flex justify-end items-center space-x-3">
                                {{-- Toggle Active Status Button --}}
                                <button wire:click="toggleStatus({{ $user->id }})" title="Toggle Active Status" class="text-gray-500 hover:text-gray-800">
                                    <i class="ph-bold ph-power text-xl"></i>
                                </button>

                                {{-- Edit Button --}}
                                <button wire:click="edit({{ $user->id }})" title="Edit User" class="text-blue-600 hover:text-blue-800">
                                    <i class="ph-bold ph-pencil-simple text-xl"></i>
                                </button>

                                {{-- Delete Button --}}
                                <button
                                    wire:click="delete({{ $user->id }})"
                                    wire:confirm="Are you sure you want to delete this user?"
                                    title="Delete User"
                                    class="text-red-600 hover:text-red-800">
                                    <i class="ph-bold ph-trash text-xl"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                            <div class="flex flex-col items-center justify-center py-4">
                                <i class="ph-bold ph-users text-4xl mb-2"></i>
                                No users found.
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination (using your existing style) --}}
    <div class="flex justify-between items-center gap-4 p-6 text-sm text-zinc-700">
        @if ($users->hasPages())
            <span>Showing Page {{ $users->currentPage() }} of {{ $users->lastPage()  }}</span>

            <div class="flex gap-6 flex-row-reverse">
             @if ($users->nextPageUrl())
                <button wire:click="nextPage" wire:loading.attr="disabled" class="text-blue-500 flex items-center gap-2">
                    Next
                    <i class="ph-bold ph-arrow-right"></i>
                </button>
            @endif
            <span></span>
            @if ($users->previousPageUrl())
                <button wire:click="previousPage" wire:loading.attr="disabled" class="text-blue-500 flex items-center gap-2">
                    <i class="ph-bold ph-arrow-left"></i>
                    Previous
                </button>
            @endif
            </div>
        @else
             <span>Showing {{ $users->count() }} of {{ $users->total() }} results</span>
        @endif
    </div>
</div>
