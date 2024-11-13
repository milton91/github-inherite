@php
    $carouselImages = [
        'carousel/image1.jpg',
        'carousel/image2.jpg',
    ];
@endphp

@section('content')
<div x-data="{ 
        currentIndex: 0, 
        images: {{ json_encode($carouselImages ?? ['default-image.jpg']) }}, 
        timer: null 
    }" 
    x-init="timer = setInterval(() => currentIndex = (currentIndex + 1) % images.length, 5000)" 
    class="relative w-full max-w-7xl mx-auto mb-6"
>
    <!-- Carousel Container -->
    <div class="relative h-80 overflow-hidden rounded-lg shadow-lg bg-gray-200">
        <template x-for="(image, index) in images" :key="index">
            <div 
                x-show="currentIndex === index" 
                class="absolute inset-0 transition-opacity duration-700 ease-in-out"
                x-transition:enter="opacity-0"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="opacity-100"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
            >
                <img 
                    :src="'/storage/' + image" 
                    alt="Carousel Image" 
                    class="object-cover h-full w-full"
                >
            </div>
        </template>
        <template x-if="images.length === 0">
            <div class="absolute inset-0 flex items-center justify-center bg-gray-200 text-gray-600 text-lg">
                No images available
            </div>
        </template>
    </div>

    <!-- Caption Section -->
    <div class="absolute bottom-6 left-6 text-white text-lg font-semibold bg-black bg-opacity-50 px-4 py-2 rounded-md">
        <template x-if="images[currentIndex]">
            <span x-text="'Image ' + (currentIndex + 1) + ' of ' + images.length"></span>
        </template>
    </div>

    <!-- Navigation Dots -->
    <div class="absolute bottom-4 w-full flex justify-center space-x-2">
        <template x-for="(image, index) in images" :key="index">
            <button 
                @click="currentIndex = index" 
                :class="{
                    'bg-white': currentIndex === index, 
                    'bg-gray-400': currentIndex !== index
                }"
                class="w-3 h-3 rounded-full transition-colors duration-300"
            ></button>
        </template>
    </div>

    <!-- Navigation Arrows -->
    <button 
        @click="currentIndex = (currentIndex - 1 + images.length) % images.length" 
        class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-70 transition-all"
    >
        &larr;
    </button>
    <button 
        @click="currentIndex = (currentIndex + 1) % images.length" 
        class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-3 rounded-full hover:bg-opacity-70 transition-all"
    >
        &rarr;
    </button>
</div>

<!-- Newly Listed -->
<div class="my-8">
    <div class="text-2xl font-bold text-gray-800 mb-4 text-center">
        Newly Listed
    </div>
    
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4">
        @foreach ($items as $item)
        <x-nav-link href="/item/{{ $item['id'] }}" class="group block bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
            <!-- Card Content -->
            <div>
                <!-- Display Item Image -->
                <div class="relative h-48 w-full overflow-hidden">
                    <img 
                        src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('img/THUMBNAIL.png') }}" 
                        alt="{{ $item['name'] }}" 
                        class="object-cover h-full w-full group-hover:scale-105 transition-transform duration-300"
                    >
                </div>
                
                <!-- Card Text -->
                <div class="p-4 space-y-2">
                    <!-- Display Item Name -->
                    <h2 class="text-lg font-semibold text-gray-800 truncate group-hover:text-green-600 transition-colors duration-300">
                        {{ $item['name'] }}
                    </h2>
                    
                    <!-- Display Item Seller -->
                    <p class="text-sm text-gray-500">Seller: {{ $item['seller'] }}</p>
                    
                    <!-- Display Item Price -->
                    <div class="text-lg font-bold text-green-700">
                        Rp. {{ number_format($item['price'], 0, ',', '.') }}
                    </div>
                </div>
            </div>
        </x-nav-link>
        @endforeach
    </div>
</div>


