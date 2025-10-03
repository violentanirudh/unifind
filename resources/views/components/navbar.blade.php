<div
    class="w-full border-b border-zinc-200 px-6 flex justify-between items-center relative h-16 sticky top-0 bg-white z-10"
    x-data="{
        open: false,
        handleMenu() {
            this.open = !this.open;
            this.$refs.menu.classList.toggle('hidden');
        }
    }"
>

    <a wire:navigate href="{{ route('dashboard') }}" class="text-xl font-bold">UniFind</a>

    @if (auth()->check())

        <button @click="handleMenu" class="cursor-pointer">
            <i class="ph-bold ph-list text-xl block" x-show='!open'></i>
            <i class="ph-bold ph-x text-xl block" x-show='open'></i>
        </button>

        <div class="bg-white absolute left-0 top-16 w-full hidden border-b border-zinc-200" x-ref="menu">
            <div class="p-6 flex flex-col space-y-4">
                <a wire:navigate href="{{ route('home.guest') }}" class="flex items-center gap-2 hover:text-blue-600">
                    <i class="ph-bold ph-house"></i>
                    Home
                </a>
                <a wire:navigate href="{{ route('dashboard') }}" class="flex items-center gap-2 hover:text-blue-600">
                    <i class="ph-bold ph-tray"></i>
                    Feeds
                </a>
                <a wire:navigate href="{{ route('report') }}" class="flex items-center gap-2 hover:text-blue-600">
                    <i class="ph-bold ph-warning-circle"></i>
                    Report Missing Item
                </a>
                <a wire:navigate href="{{ route('profile') }}" class="flex items-center gap-2 hover:text-blue-600">
                    <i class="ph-bold ph-user"></i>
                    Profile
                </a>
                <a href="{{ route('logout') }}" class="flex items-center gap-2 hover:text-blue-600">
                    <i class="ph-bold ph-sign-out"></i>
                    Sign Out
                </a>
            </div>
        </div>
    @else
        <div class="space-x-4">
            <a wire:navigate href="{{ route('sign-in') }}" class="text-blue-500 hover:underline">Sign In</a>
            <a wire:navigate href="{{ route('sign-up') }}" class="text-blue-500 hover:underline">Sign Up</a>
        </div>
    @endif

</div>
