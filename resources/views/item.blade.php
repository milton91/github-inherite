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
        <div class="ml-10 flex space-x-4">
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
        <div class="ml-10 space-x-4 flex-none h-64 w-64 overflow-hidden">
            <img src="{{ asset('img/THUMBNAIL.png') }}" alt="thumbnail" class="object-cover h-full w-full">
        </div>

        <!-- Info Card -->
        <div class="ml-10 flex items-baseline space-x-4">
            <x-nav-link href="/" :active="request()->is('/')">This is the info card</x-nav-link>
        </div>
    </div>
</x-layout>
