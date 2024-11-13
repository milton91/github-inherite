<x-app-layout>
    <x-slot:title>{{ $title }}</x-slot>
    
    <!-- Header with navigation -->
    <div class="hidden md:flex items-center justify-between w-full p-5">
        <div class="flex items-center space-x-4">
            <x-nav-link href="/dashboard" :active="request()->is('/')">Back</x-nav-link>
        </div>
    </div>

    <!-- Main Content -->
    <div class="flex flex-col md:flex-row items-stretch justify-between w-full p-5 space-y-6 md:space-y-0">
        
        <!-- Carousel for Images -->
        <div x-data="{
                currentIndex: 0,
                images: {{ json_encode(explode(',', $item['image'])) }}
            }" 
            class="flex flex-col items-center w-full md:w-1/2">

            <!-- Updated height and width -->
            <div class="relative h-64 w-64 overflow-hidden rounded-md shadow-lg">
                <template x-for="(image, index) in images" :key="index">
                    <div x-show="currentIndex === index" class="absolute inset-0 transition-all duration-500">
                        <img :src="'/storage/' + image" alt="Item Image" class="object-cover h-full w-full">
                    </div>
                </template>
            </div>

            <!-- Navigation buttons -->
            <div class="flex justify-center space-x-4 mt-4">
                <button @click="currentIndex = (currentIndex - 1 + images.length) % images.length" class="bg-gray-200 hover:bg-gray-300 p-2 rounded-full">
                    &larr; Previous
                </button>
                <button @click="currentIndex = (currentIndex + 1) % images.length" class="bg-gray-200 hover:bg-gray-300 p-2 rounded-full">
                    Next &rarr;
                </button>
            </div>
        </div>

        <!-- Info Card -->
        <div class="w-full md:w-2/5 space-y-4">
            <div class="text-2xl font-semibold text-gray-900">{{ $item['name'] }}</div>
            <div class="text-xl font-bold text-green-700">Rp. {{ number_format($item['price'], 0, ',', '.') }}</div>
            <div class="text-md text-gray-700">{{ $item['category'] }}</div>
            <div class="text-md text-gray-600">Seller: {{ $item['seller'] }}</div>
            <div class="text-md text-gray-600">Location: {{ $item['location'] }}</div>
            <!-- <div class="text-md text-yellow-500">Rating: {{ $item['rating'] }} ★</div> -->
            <div class="text-sm text-gray-500">{{ $item['description'] }}</div>
            <div class="flex space-x-4 items-center mt-4">
            <x-nav-link href="{{ route('chat.index', $item['id']) }}" class="bg-green-600 text-white rounded-full px-4 py-2 hover:bg-green-700">
                Chat Now
            </x-nav-link>
                <button class="focus:outline-none">
                    <img src="{{ asset('img/wishlist.png') }}" alt="wishlist" class="h-6 w-6">
                </button>
            </div>
        </div>
    </div>
</x-app-layout>
