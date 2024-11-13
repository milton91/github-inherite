<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Items') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($items->isEmpty())
                        <p>You have not listed any items yet.</p>
                    @else
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($items as $item)
                                <div class="p-4 border rounded-lg">
                                    <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('img/placeholder.png') }}" alt="Item Image" class="h-40 w-full object-cover mb-4">
                                    <h3 class="font-bold text-lg">{{ $item->name }}</h3>
                                    <p class="text-gray-600">{{ $item->category }}</p>
                                    <p class="text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                    <p class="text-gray-600">{{ $item->location }}</p>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
