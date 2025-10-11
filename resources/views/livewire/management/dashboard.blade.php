{{--
    Livewire View for the Management Dashboard
--}}
<div class="container mx-auto">

    <!-- Stats Cards Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Total Users Card -->
        <div class="bg-white p-6 rounded shadow flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-lg">
                <i class="ph-bold ph-users text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-zinc-500">Total Users</p>
                <p class="text-2xl font-bold text-zinc-800">{{ $totalUsers }}</p>
            </div>
        </div>

        <!-- Total Items Card -->
        <div class="bg-white p-6 rounded shadow flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-green-100 text-green-600 rounded-lg">
                <i class="ph-bold ph-archive-box text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-zinc-500">Total Items Logged</p>
                <p class="text-2xl font-bold text-zinc-800">{{ $totalItems }}</p>
            </div>
        </div>

        <!-- Claimed Items Card -->
        <div class="bg-white p-6 rounded shadow flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-purple-100 text-purple-600 rounded-lg">
                <i class="ph-bold ph-check-circle text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-zinc-500">Items Claimed</p>
                <p class="text-2xl font-bold text-zinc-800">{{ $claimedItems }}</p>
            </div>
        </div>

        <!-- Unclaimed Items Card -->
        <div class="bg-white p-6 rounded shadow flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-yellow-100 text-yellow-600 rounded-lg">
                <i class="ph-bold ph-question text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-zinc-500">Unclaimed Items</p>
                <p class="text-2xl font-bold text-zinc-800">{{ $unclaimedItems }}</p>
            </div>
        </div>

        <!-- Lost Reports Card -->
        <div class="bg-white p-6 rounded shadow flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-red-100 text-red-600 rounded-lg">
                <i class="ph-bold ph-warning-circle text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-zinc-500">Lost Reports</p>
                <p class="text-2xl font-bold text-zinc-800">{{ $lostReports }}</p>
            </div>
        </div>

        <!-- Found Reports Card -->
        <div class="bg-white p-6 rounded shadow flex items-start">
            <div class="flex-shrink-0 h-12 w-12 flex items-center justify-center bg-green-100 text-green-600 rounded-lg">
                <i class="ph-bold ph-check-circle text-2xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-zinc-500">Found Reports</p>
                <p class="text-2xl font-bold text-zinc-800">{{ $foundReports }}</p>
            </div>
        </div>

    </div>

    {{-- You can add more sections here like recent items or recent users --}}

</div>
