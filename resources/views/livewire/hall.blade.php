{{--
    Hall of Fame Page
    - Displays top 10 users passed from the controller in the $users variable.
    - Assumes $users is a collection of objects, with each object having 'name' and 'points' properties.
    - Shows a styled empty state if the $users collection is empty.
    - Uses a simple border to separate users instead of alternating background colors.
--}}

<div class="min-h-screen">
    <main class="container mx-auto px-4 sm:px-6 py-16 sm:py-20">

        <section class="text-center mb-12">
            <div class="inline-flex items-center justify-center h-16 w-16 bg-yellow-100 text-yellow-500 rounded-full mb-4">
                <i class="ph-bold ph-trophy text-4xl"></i>
            </div>
            <h1 class="text-3xl md:text-4xl font-bold text-zinc-800">Hall of Fame</h1>
            <p class="text-zinc-600 mt-2 max-w-2xl mx-auto">
                Celebrating the campus heroes who go the extra mile to help others.
            </p>
        </section>

        <section class="max-w-3xl mx-auto">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <div class="p-6 border-b border-zinc-100">
                    <h2 class="text-xl font-bold text-zinc-700 mb-1">Top Earners</h2>
                    <p class="text-sm text-zinc-500">A special thanks to our most helpful community members.</p>
                </div>

                @forelse ($users as $user)
                    @if ($loop->iteration > 10)
                        @break
                    @endif

                    <div class="flex items-center px-6 py-4 transition duration-200 ease-in-out hover:bg-blue-50 @if(!$loop->last) border-b border-zinc-100 @endif">
                        {{-- Rank Number and Medal Icon --}}
                        <div class="w-12 text-center">
                            @if ($loop->iteration <= 3)
                                <i class="ph-bold ph-medal text-3xl
                                    @if ($loop->iteration == 1) text-yellow-400 @endif
                                    @if ($loop->iteration == 2) text-slate-400 @endif
                                    @if ($loop->iteration == 3) text-orange-400 @endif
                                "></i>
                            @else
                                <span class="font-bold text-lg text-zinc-500">{{ $loop->iteration }}</span>
                            @endif
                        </div>

                        {{-- User Avatar (Initials) and Name --}}
                        <div class="flex-1 flex items-center ml-4">
                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 text-blue-600 font-bold rounded-full flex items-center justify-center">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div class="ml-4">
                                <p class="font-semibold text-zinc-800">{{ $user->name }}</p>
                            </div>
                        </div>

                        {{-- Points Earned --}}
                        <div class="flex items-center text-right">
                            <span class="font-bold text-blue-600 text-lg">{{ $user->points }}</span>
                            <p class="ml-2 text-zinc-500 text-sm">Points</p>
                        </div>
                    </div>
                @empty
                    {{-- Empty State: Displayed when $users is empty --}}
                    <div class="text-center p-10 sm:p-16">
                        <div class="flex items-center justify-center h-20 w-20 mx-auto bg-blue-100 text-blue-400 rounded-full mb-6">
                           <i class="ph-bold ph-binoculars text-5xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">The Hall is Awaiting Its Heroes</h3>
                        <p class="text-zinc-600 max-w-sm mx-auto mb-6">
                            No one has been featured yet. Be the first to make a difference by reporting an item you've found!
                        </p>
                        <a href="#" class="bg-blue-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-md">
                            I Found Something
                        </a>
                    </div>
                @endforelse
            </div>
        </section>

    </main>
</div>
