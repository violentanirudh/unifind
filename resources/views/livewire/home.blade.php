<div class="">
    <main>
        <!-- Hero Section -->
        <section class="relative rounded-2xl">
            <div class="container mx-auto px-4 sm:px-6 py-16 sm:py-20 lg:py-32 text-center">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-3xl sm:text-4xl md:text-6xl font-bold text-zinc-900 mb-4 leading-tight">
                        Reuniting Lost Items With Their Owners
                    </h1>
                    <p class="text-base sm:text-lg md:text-xl text-zinc-700 mb-8">
                        The official, secure, and centralized platform for the campus community to report and recover lost belongings.
                    </p>
                    <div class="flex flex-col sm:flex-row justify-center items-center gap-4">
                        <a href="{{ route('report') }}" class="w-full sm:w-auto bg-blue-600 text-white font-bold py-3 px-8 rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out shadow-lg">
                            Report a Lost Item
                        </a>
                        <a href="{{ route('report') }}" class="w-full sm:w-auto bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-blue-50 transition duration-300 ease-in-out shadow-lg">
                            I Found Something
                        </a>
                        <a href="{{ route('hall-of-fame') }}" class="w-full sm:w-auto bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-blue-50 transition duration-300 ease-in-out shadow-lg">
                            Hall Of Fame
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- "How It Works" Section -->
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-zinc-800">A Simple Path to Recovery</h2>
                    <p class="text-zinc-600 mt-2 max-w-2xl mx-auto">Our streamlined process makes it easy to report, find, and claim items.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 text-center">
                    <!-- Step 1 -->
                    <div class="p-6">
                        <div class="flex items-center justify-center h-16 w-16 mx-auto bg-blue-100 text-blue-600 rounded-full text-2xl font-bold mb-4">1</div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">Report Your Lost Item</h3>
                        <p class="text-zinc-600">Quickly fill out a form on the portal with details about your missing belonging.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="p-6">
                        <div class="flex items-center justify-center h-16 w-16 mx-auto bg-blue-100 text-blue-600 rounded-full text-2xl font-bold mb-4">2</div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">Finder Submits to LAF Desk</h3>
                        <p class="text-zinc-600">Anyone who finds an item can easily deposit it at the central Lost & Found (LAF) Desk.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="p-6">
                        <div class="flex items-center justify-center h-16 w-16 mx-auto bg-blue-100 text-blue-600 rounded-full text-2xl font-bold mb-4">3</div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">Get Instant Notifications</h3>
                        <p class="text-zinc-600">Once logged by staff, updates are posted to the portal and our WhatsApp channel.</p>
                    </div>
                    <!-- Step 4 -->
                    <div class="p-6">
                        <div class="flex items-center justify-center h-16 w-16 mx-auto bg-blue-100 text-blue-600 rounded-full text-2xl font-bold mb-4">4</div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">Claim Your Item Securely</h3>
                        <p class="text-zinc-600">Visit the LAF Desk with proof of ownership to have your item returned safely.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-16 md:py-24">
            <div class="container mx-auto px-4 sm:px-6">
                <div class="text-center mb-12">
                     <h2 class="text-3xl md:text-4xl font-bold text-zinc-800">Why Our System Works</h2>
                    <p class="text-zinc-600 mt-2 max-w-2xl mx-auto">We built a platform focused on trust, efficiency, and security.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Feature 1: Centralized Hub -->
                    <div class="bg-white p-8 rounded-lg ">
                        <div class="flex items-center justify-center h-12 w-12 bg-blue-100 text-blue-600 rounded-full mb-4">
                            <i class="ph-bold ph-map-pin text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">One Centralized Hub</h3>
                        <p class="text-zinc-600">No more scattered WhatsApp groups. One single source of truth for all lost and found items on campus.</p>
                    </div>

                    <!-- Feature 2: Secure & Verified -->
                    <div class="bg-white p-8 rounded-lg ">
                        <div class="flex items-center justify-center h-12 w-12 bg-green-100 text-green-600 rounded-full mb-4">
                           <i class="ph-bold ph-shield-check text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">Secure & Verified</h3>
                        <p class="text-zinc-600">With campus email verification and in-person claims at the LAF Desk, your items are always in safe hands.</p>
                    </div>

                    <!-- Feature 3: Instant Reach -->
                    <div class="bg-white p-8 rounded-lg ">
                        <div class="flex items-center justify-center h-12 w-12 bg-purple-100 text-purple-600 rounded-full mb-4">
                           <i class="ph-bold ph-chats-circle text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold text-zinc-800 mb-2">WhatsApp Integration</h3>
                        <p class="text-zinc-600">Get immediate notifications about found items through our dedicated WhatsApp channel for wide and instant reach.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Final Call to Action Section -->
        <section class="bg-gradient-to-r from-blue-700 via-blue-500 to-blue-700 rounded-2xl text-center text-white">
            <div class="container mx-auto px-4 sm:px-6 py-16 text-center">
                <h2 class="text-2xl sm:text-3xl font-bold text-white mb-4">Ready to Find What's Lost?</h2>
                <p class="text-blue-100 text-base sm:text-lg mb-8 max-w-2xl mx-auto">Join the campus community in creating a more trustworthy and efficient way to handle lost and found items.</p>
                <a href="#" class="bg-white text-blue-600 font-bold py-3 px-8 rounded-lg hover:bg-zinc-100 transition duration-300 ease-in-out shadow-lg">
                    Get Started Now
                </a>
            </div>
        </section>
    </main>
</div>

