<div class="">
    <div class="font-bold">
        New Listed
    </div>
    
    <div class="flex flex-wrap justify-center">
        @foreach ($items as $item)
        <x-nav-link href="/item/{{ $item['id'] }}" class="w-full md:w-1/4 p-4">
            <div>
                <!-- Display Item Image -->
                <div class="space-x-4 flex-none h-40 w-40 overflow-hidden w-full">
                    <img src="{{ $item['image'] ? asset('storage/' . $item['image']) : asset('img/THUMBNAIL.png') }}" 
                         alt="{{ $item['name'] }}" 
                         class="object-cover h-full w-full rounded-lg">
                </div>
                
                <!-- Display Item Name -->
                <div>
                    <h2>{{ $item['name'] }}</h2>
                </div>
                
                <!-- Display Item Seller -->
                <div>
                    <p>{{ $item['seller'] }}</p>
                </div>
                
                <!-- Display Item Price -->
                <div>
                    <div class="font-bold">Rp. {{ number_format($item['price'], 0, ',', '.') }}</div>
                </div>
            </div>
        </x-nav-link>
        @endforeach
    </div>
</div>

