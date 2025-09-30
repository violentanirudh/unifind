<div class="w-full mx-auto">

    <h1 class="text-xl font-semibold">Sign In</h1>
    <p class="text-sm text-zinc-500">Please enter your credentials to sign in.</p>

    <form wire:submit.prevent="submit" class="space-y-4 mt-6">
        <x-input type="email" wire:model="email" name="email" label="Email" placeholder="Enter your email" />
        <x-input type="password" wire:model="password" name="password" label="Password"
            placeholder="Enter your password" />
        <x-button type="submit" value="Sign In" class="w-full" />
    </form>

    <a wire:navigate href="{{ route('sign-up') }}" class="text-sm text-blue-500 hover:underline mt-4 block text-center">
        Don't have an account? Sign Up
    </a>

</div>
