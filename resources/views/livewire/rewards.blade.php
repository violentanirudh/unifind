<div>
    {{--
        You need to ensure your main layout file (layouts.app) includes:
        1. The Tailwind CSS script: <script src="https://cdn.tailwindcss.com"></script>
        2. The Phosphor Icons script: <script src="https://unpkg.com/@phosphor-icons/web"></script>
        3. A custom font like 'Inter' for the best look.
        4. @livewireStyles and @livewireScripts directives.
    --}}

    <div class="container mx-auto px-4 py-12 md:py-20">

        <!-- Header Section -->
        <header class="text-center mb-12">
            <h1 class="text-2xl md:text-5xl font-bold text-slate-800"> Redeem Rewards</h1>
            <p class="mt-4 text-base text-slate-600">Use your points for amazing perks and items.</p>
        </header>

        <!-- Rewards Grid -->
        <main class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            @forelse ($rewards as $reward)
                <div class="bg-white rounded-2xl shadow-lg p-6 flex flex-col text-center items-center transition-transform transform hover:scale-105">
                    <div class="text-6xl text-indigo-500 mb-4">
                        {{-- Dynamically display the icon from your database --}}
                        <i class="ph-bold ph-{{ $reward->icon ?? 'gift' }}"></i>
                    </div>
                    <h2 class="text-xl font-bold text-slate-800">{{ $reward->title }}</h2>
                    <p class="text-slate-500 mt-2 flex-grow">{{ $reward->description }}</p>
                    <div class="my-6 text-2xl font-bold text-amber-500 flex items-center gap-2">
                        <i class="ph-fill ph-star"></i>
                        <span>{{ number_format($reward->points_required) }}</span> Points
                    </div>
                    <button class="w-full bg-indigo-600 text-white font-semibold py-3 rounded-lg hover:bg-indigo-700 transition-colors">
                        Redeem
                    </button>
                </div>
            @empty
                <div class="sm:col-span-2 lg:col-span-3 text-center py-12">
                     <div class="text-6xl text-slate-300 mb-4">
                        <i class="ph-bold ph-package"></i>
                    </div>
                    <p class="text-slate-500 text-lg">No rewards are available at the moment. Please check back later!</p>
                </div>
            @endforelse

        </main>
    </div>
</div>
