<div>
    <div class="mb-4">
        <a wire:navigate href="{{ route('feeds') }}" class="text-blue-500 flex items-center gap-2">
            <i class="ph-bold ph-arrow-left"></i> Back
        </a>
    </div>

    <h1 class="text-xl font-medium">Profile</h1>
    <p class="text-sm text-zinc-500">View and edit your profile information.</p>

    <div class="space-y-4 mt-6">
        <x-input label="Name" :value="$user->name" class="block mt-1 w-full" readonly />
        <x-input label="Email" :value="$user->email" class="block mt-1 w-full" readonly />
    </div>

    <form wire:submit.prevent="savePassword" class="mt-6 space-y-4">
        <!-- Change Password -->
        <h2 class="text-lg font-medium mt-8">Change Password</h2>
        <x-input label="New Password" wire:model="password" type="password" placeholder="Enter new password" name="password" class="block mt-1 w-full" />
        <x-input label="Confirm Password" wire:model="password_confirmation" type="password" placeholder="Confirm new password" name="password_confirmation" class="block mt-1 w-full" />
        <x-button type="submit" value="Update Password" wire:loading.remove />
        <x-button wire:loading>
            <i class="ph-bold ph-spinner-gap animate-spin"></i> Updating...
        </x-button>
    </form>
</div>
