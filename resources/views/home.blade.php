<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    
    <!-- NEWLY LISTED -->
    <div class="">
        <div class="font-bold">
            New Listed
        </div>
        <div class="flex flex-wrap justify-center">
            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card> 
            </x-nav-link>
            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card> 
            </x-nav-link>
            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card> 
            </x-nav-link>
            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card> 
            </x-nav-link>
        </div>
    </div>

    <div class="">
        <div class="font-bold">
            New Listed
        </div>
        
        <div class="flex flex-wrap justify-center">
            @foreach ($items as $item)
            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card>
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $item['name'] }}</h2>
            </x-nav-link>
            @endforeach

            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card> 
            </x-nav-link>
            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card> 
            </x-nav-link>
            <x-nav-link href="/item" class="w-full md:w-1/4 p-4">
                <x-product-card></x-product-card> 
            </x-nav-link>
        </div>
    </div>

    
</x-layout>