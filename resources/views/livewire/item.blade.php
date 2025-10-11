<div class="flex flex-col lg:flex-row lg:space-x-12">

    <!-- Left Column: Item Details & Actions -->
    <div class="lg:w-1/3">
        <div class="w-full aspect-square mb-4 bg-zinc-100 rounded-lg overflow-hidden flex items-center justify-center">
            @if ($item->image_path)
                <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}" class="w-full h-full object-cover">
            @else
                {{-- Fallback icon when no image is available --}}
                <i class="ph-bold ph-package text-6xl text-zinc-400"></i>
            @endif
        </div>
        <h1 class="text-lg font-medium">{{ $item->name }}</h1>
        <p class="text-sm text-zinc-500 mt-2">Reported On: {{ $item->created_at->format('d M Y') }}</span></p>
        <p class="text-zinc-500 text-sm mt-2 text-zinc-500">{{ $item->description }}</p>

        <div class="mt-4">
            @php
                $statusColors = [
                    'lost' => 'bg-red-100 text-red-700',
                    'found' => 'bg-amber-100 text-amber-700',
                    'deposited' => 'bg-blue-100 text-blue-700',
                    'claimed' => 'bg-green-100 text-green-700',
                ];
            @endphp

            <span class="px-3 py-1 rounded text-xs font-medium {{ $statusColors[$item->status] ?? 'bg-zinc-100 text-zinc-600' }}">
                {{ ucfirst($item->status) }}
            </span>
        </div>

        <!-- Actions : Delete -->
        <div class="mt-12">
            @if (Gate::allows('delete-item', $item))
                <x-button wire:click="delete({{ $item }})" class="mt-4 !bg-red-800 hover:bg-red-700 gap-2 text-sm">
                    <i class="ph-bold ph-trash text-white"></i>
                    <span class="text-white">Delete</span>
                </x-button>
            @endif
        </div>
    </div>

    <!-- Right Column: FAQs -->
    <div class="lg:w-2/3 mt-12 lg:mt-0">
        @php
            $faqItems = [
                [
                    'question' => 'How do I claim my item?',
                    'answer' => 'To claim your item, please contact the person who reported it or visit the lost and found office with a valid ID.'
                ],
                [
                    'question' => 'What should I do if I find an item?',
                    'answer' => 'If you find an item, please report it through our platform or take it to the nearest lost and found office.'
                ],
                [
                    'question' => 'How long will my item be kept?',
                    'answer' => 'Items will be kept for a period of 30 days. After this period, unclaimed items may be donated or disposed of according to our policy.'
                ],
                [
                    'question' => 'Can I update the status of my reported item?',
                    'answer' => 'Yes, you can update the status of your reported item by logging into your account and editing the item details.'
                ]
            ];
        @endphp

        <div class="w-full">
            <h2 class="text-xl font-semibold text-gray-800 mb-8">Frequently Asked Questions</h2>
            <div class="space-y-4">
                @foreach ($faqItems as $faq)
                    <x-faq :question="$faq['question']" :answer="$faq['answer']" />
                @endforeach
            </div>
        </div>
    </div>

</div>

