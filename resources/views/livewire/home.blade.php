<div>
    <section class="text-center py-16">
        <h1 class="text-4xl font-bold leading-tight mb-4">
            The simple way to find what you've lost.
        </h1>
        <p class="text-lg text-zinc-600 max-w-md mx-auto mb-8">
            A centralized platform to report lost items and return found ones.
        </p>
        <div class="flex flex-col space-y-4 max-w-sm mx-auto">
            <a href="{{ route('report') }}"
                class="bg-zinc-900 text-sm text-white py-3 px-8 rounded font-medium hover:bg-zinc-800 transition-colors">
                Report a Lost Item
            </a>
            <a href="{{ route('report') }}"
                class="bg-zinc-100 text-zinc-900 py-3 px-8 text-sm rounded font-medium hover:bg-zinc-200 transition-colors">
                I Found Something
            </a>
        </div>
    </section>

    <!-- How It Works Section -->
    <section id="how-it-works" class="py-16">
        <div class="mb-12">
            <h2 class="text-3xl font-bold">How It Works</h2>
            <p class="text-lg text-zinc-600 mt-2">A secure and streamlined process.</p>
        </div>
        <div class="flex flex-col space-y-10">
            <!-- Step 1 -->
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded bg-blue-100 text-blue-600">
                    <i class="ph-bold ph-notebook text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-medium mb-1">Report or Submit</h3>
                    <p class="text-zinc-600">
                        Quickly post details about a lost item, or submit a found item to the central desk.
                    </p>
                </div>
            </div>
            <!-- Step 2 -->
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded bg-blue-100 text-blue-600">
                    <i class="ph-bold ph-bell-ringing text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-medium mb-1">System Logs & Notifies</h3>
                    <p class="text-zinc-600">
                        Our staff logs the item and the system automatically posts an update to the portal.
                    </p>
                </div>
            </div>
            <!-- Step 3 -->
            <div class="flex items-start space-x-4">
                <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded bg-blue-100 text-blue-600">
                    <i class="ph-bold ph-shield-check text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-medium mb-1">Securely Claim Item</h3>
                    <p class="text-zinc-600">
                        The owner visits the desk, provides proof of ownership, and is reunited with their item.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-white py-8">
        <div class="text-center">
            <p class="text-zinc-600">&copy; 2024 Unifind. All rights reserved.</p>
            <div class="flex space-x-6 justify-center mt-4">
                <a href="#" class="text-zinc-600 hover:text-blue-600">About</a>
                <a href="#" class="text-zinc-600 hover:text-blue-600">Privacy</a>
            </div>
        </div>
    </footer>
</div>
