<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    
    <!-- Header with navigation -->
    <div class="hidden md:flex items-center justify-between w-full">
        <div class="ml-10 flex items-baseline space-x-4">
            <x-nav-link href="/" :active="request()->is('/')">Back</x-nav-link>
        </div>
    </div>

    <!-- Main Content -->
    <div class="hidden md:flex items-stretch justify-between w-full">
        <!-- Image Thumbnails -->
        <div class="ml-10 space-x-4 w-1/5">
            <div class="h-20 w-20 my-5">
                <img src="{{ asset('img/sofa1.png') }}" alt="sofa1" class="h-full w-full object-contain">
            </div>
            <div class="h-20 w-20 my-5">
                <img src="{{ asset('img/sofa2.png') }}" alt="sofa2" class="h-full w-full object-contain">
            </div>
            <div class="h-20 w-20 my-5">
                <img src="{{ asset('img/sofa3.png') }}" alt="sofa3" class="h-full w-full object-contain">
            </div>
            <div class="h-20 w-20 my-5">
                <img src="{{ asset('img/sofa4.png') }}" alt="sofa4" class="h-full w-full object-contain">
            </div>
        </div>

        <!-- THUMBNAIL Image (object-cover to force it to fill the square, might crop parts) -->
        <div class="ml-10 space-x-4 flex-none h-64 w-64 overflow-hidden w-2/5">
            <img src="{{ asset('img/THUMBNAIL.png') }}" alt="thumbnail" class="object-cover h-full w-full">
        </div>

        <!-- Info Card -->
        <div class="ml-10 items-baseline space-x-4 w-2/5">
            <div class="flex space-x-4">
                <div class="text-xl">Comfy Sofa</div>
                <div class="text-xl">880.000</div>
            </div>
            <div class="flex">Furniture</div>
            <div>Toko bagus</div>
            <div>Alam Sutera</div>
            <div>This is rating</div>
            <div>Sofa estetok</div>
            <div class="flex space-x-4">
                <x-nav-link href="/login" :active="request()->is('login')" class="bg-green-500 text-white rounded-full px-4 py-1 hover:bg-green-600 whitespace-nowrap" style="background-color: #063628">
                  Chat now
                </x-nav-link>
                <img src="{{ asset('img/wishlist.png') }}" alt="chat-logo" class="h-6 w-6">
            </div>
        </div>
    </div>
</x-layout>
