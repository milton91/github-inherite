<!-- resources/views/components/search-banner.blade.php -->
<div class="relative bg-cover bg-center h-64" style="background-image: url('/path/to/your/banner-image.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Dark overlay -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="h-64 flex flex-col justify-center">
            <h2 class="text-3xl font-bold text-white">
                Pass it on, Save more. Find what you need in Inherite.
            </h2>
            <div class="mt-4">
                <form action="{{ route('search') }}" method="GET" class="flex">
                    <input type="text" name="query" placeholder="What are you looking for?" class="flex-grow p-4 rounded-l-md focus:outline-none">
                    <button type="submit" class="bg-green-600 text-white p-4 rounded-r-md hover:bg-green-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </form>
                <!-- Quick search buttons -->
                <div class="flex mt-2 space-x-2">
                    @foreach(['Bookshelf', 'Furniture', 'T-shirt', 'Wardrobe', 'Car'] as $item)
                        <a href="{{ route('search', ['query' => $item]) }}" class="text-sm bg-gray-200 text-gray-800 px-3 py-2 rounded-md hover:bg-gray-300">{{ $item }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
