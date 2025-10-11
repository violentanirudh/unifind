<div class="max-w-96 mx-auto my-10">

    <h1 class="text-3xl font-bold">Sign Up</h1>
    <p class="text-sm text-zinc-500">Create an account to get started.</p>

    <form wire:submit.prevent="submit" class="space-y-4 mt-6">
        <x-input type="text" wire:model="name" name="name" label="Name" placeholder="Enter your name" />
        <x-input type="email" wire:model="email" name="email" label="Email" placeholder="Enter your email" />
        <x-input type="password" wire:model="password" name="password" label="Password" placeholder="Enter your password" />
        <x-button type="submit" value="Sign Up" class="w-full" />
    </form>

    <a wire:navigate href="{{ route('sign-in') }}" class="text-blue-500 hover:underline mt-4 block text-center text-sm">
        Already have an account? Sign In
    </a>

</div>
