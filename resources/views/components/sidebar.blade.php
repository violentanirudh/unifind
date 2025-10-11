<aside class="bg-white text-gray-800 w-80 z-20 border-r border-gray-200">

    {{-- Logo / Brand --}}
    <div class="h-16 flex items-center px-8 border-b border-gray-200">
        <a href="/management/dashboard" class="text-xl font-bold text-gray-800">
            UniFind <span class="text-blue-600">Admin</span>
        </a>
    </div>

    {{-- Navigation Links --}}
    <nav class="flex flex-col flex-grow h-[calc(100vh-4rem)] p-4">

        <div class="flex-grow space-y-1">
            <p class="px-3 pt-2 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Main</p>
            <a wire:navigate href="{{ route('management.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ request()->is('admin/dashboard') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ph-bold ph-gauge"></i>
                Dashboard
            </a>

            <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">Management</p>
            <a wire:navigate href="{{ route('management.items') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ request()->is('admin/items*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ph-bold ph-cube"></i>
                Items
            </a>
            <a wire:navigate href="{{ route('management.feeds') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ request()->is('admin/feeds*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ph-bold ph-tray"></i>
                Feeds
            </a>

            {{-- Admin-Only Links --}}
            @can('is-admin')
                <p class="px-3 pt-4 pb-1 text-xs font-semibold text-gray-400 uppercase tracking-wider">System</p>
                <a wire:navigate href="{{ route('management.users') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ request()->is('admin/users*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600' }}">
                    <i class="ph-bold ph-users"></i>
                    Manage Users
                </a>
                <a wire:navigate href="{{ route('management.rewards') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ request()->is('admin/settings*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600' }}">
                    <i class="ph-bold ph-crown-simple"></i>
                    Manage Rewards
                </a>
                <a href="/management/settings" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ request()->is('admin/settings*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600' }}">
                    <i class="ph-bold ph-gear"></i>
                    Settings
                </a>
            @endcan
        </div>

        {{-- User Profile & Logout at the bottom --}}
        <div class="mt-auto border-t border-gray-200 -mx-4 px-4 pt-4">
            <a href="{{ route('profile') }}" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-gray-100 {{ request()->is('admin/profile*') ? 'bg-blue-50 text-blue-600 font-semibold' : 'text-gray-600' }}">
                <i class="ph-bold ph-user-circle"></i>
                My Profile
            </a>
            <a href="{{ route('logout') }}" class="flex items-center gap-3 px-3 py-2 rounded-md text-red-600 hover:bg-red-50">
                <i class="ph-bold ph-sign-out"></i>
                Sign Out
            </a>
        </div>
    </nav>
</aside>
