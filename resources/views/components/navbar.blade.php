<!-- A fully responsive navbar for both mobile and desktop screens -->
<!-- Requires Tailwind CSS and Alpine.js -->

<div x-data="{ open: false }" class="max-w-screen-xl w-full">
    <div class="container mx-auto px-6 h-16 flex justify-between items-center">
        <!-- Logo -->
        <a wire:navigate href="{{ route('feeds') }}" class="text-2xl font-bold">UniFind</a>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex items-center space-x-6">
            @auth
                <a wire:navigate href="{{ route('home.guest') }}" class="text-blue-600 hover:text-blue-600">Home</a>
                <a wire:navigate href="{{ route('feeds') }}" class="text-blue-600 hover:text-blue-600">Feeds</a>
                <a wire:navigate href="{{ route('report') }}" class="text-blue-600 hover:text-blue-600">Report Item</a>
                <a wire:navigate href="{{ route('profile') }}" class="text-blue-600 hover:text-blue-600">Profile</a>
                <a wire:navigate href="{{ route('rewards') }}" class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-semibold bg-blue-700 text-white hover:bg-blue-600 transition-colors">
                    <i class="ph-bold ph-database"></i>
                    {{-- Assumes a 'points' attribute on the User model --}}
                    <span>{{ auth()->user()->points ?? 0 }} Points</span>
                </a>
                <a href="{{ route('logout') }}" class="text-blue-600 hover:text-blue-600">Sign Out</a>
            @else
                <a wire:navigate href="{{ route('sign-in') }}" class="text-blue-600 hover:text-blue-600">Sign In</a>
                <a wire:navigate href="{{ route('sign-up') }}" class="bg-blue-600 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">Sign Up</a>
            @endauth
        </nav>

        <!-- Mobile Menu Button -->
        <div class="md:hidden gap-4 flex items-center">
            <a wire:navigate href="{{ route('rewards') }}" class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-sm font-semibold bg-blue-700 text-white hover:bg-blue-600 transition-colors">
                    <i class="ph-bold ph-database"></i>
                    {{-- Assumes a 'points' attribute on the User model --}}
                    <span>{{ auth()->user()->points ?? 0 }} Points</span>
                </a>
            <button @click="open = !open" aria-label="Toggle Menu">
                <i class="ph-bold ph-list text-2xl" x-show="!open"></i>
                <i class="ph-bold ph-x text-2xl" x-show="open" style="display: none;"></i>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (sliding out from top) -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="-translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="-translate-x-full"
         style="display: none;"
         class="md:hidden absolute top-20 left-0 w-full bg-white/40 backdrop-blur-sm"
         @click.away="open = false">
        <div class="p-6 flex flex-col space-y-4">
            @auth
                <a wire:navigate href="{{ route('home.guest') }}" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                    <i class="ph-bold ph-house"></i> Home
                </a>
                <a wire:navigate href="{{ route('feeds') }}" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                    <i class="ph-bold ph-tray"></i> Feeds
                </a>
                <a wire:navigate href="{{ route('report') }}" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                    <i class="ph-bold ph-warning-circle"></i> Report Missing Item
                </a>
                <a wire:navigate href="{{ route('profile') }}" class="flex items-center gap-2 text-gray-700 hover:text-blue-600">
                    <i class="ph-bold ph-user"></i> Profile
                </a>
                <a href="{{ route('logout') }}" class="flex items-center gap-2 text-gray-700 hover:text-blue-600 pt-4 mt-2">
                    <i class="ph-bold ph-sign-out"></i> Sign Out
                </a>
            @else
                <a wire:navigate href="{{ route('sign-in') }}" class="block py-2 text-gray-700 hover:text-blue-600">Sign In</a>
                <a wire:navigate href="{{ route('sign-up') }}" class="block py-2 text-gray-700 hover:text-blue-600">Sign Up</a>
            @endauth
        </div>
    </div>
</div>
