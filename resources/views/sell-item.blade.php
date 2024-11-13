<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sell Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('items.store') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Item Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <!-- Seller (Automatically filled with the current user) -->
                        <div>
                            <x-input-label for="seller" :value="__('Seller')" />
                            <x-text-input id="seller" name="seller" type="text" class="mt-1 block w-full" value="{{ Auth::user()->name }}" readonly />
                        </div>

                        <!-- Category -->
                        <div>
                            <x-input-label for="category" :value="__('Category')" />
                            <select id="category" name="category" class="mt-1 block w-full" required>
                                <option value="">Select Category</option>
                                <option value="Electronic">Electronic</option>
                                <option value="Automotive">Automotive</option>
                                <option value="Furniture">Furniture</option>
                                <option value="Menswear">Menswear</option>
                                <option value="Womenswear">Womenswear</option>
                                <option value="Other">Other</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('category')" />
                        </div>

                        <!-- Location -->
                        <div>
                            <x-input-label for="location" :value="__('Location')" />
                            <x-text-input id="location" name="location" type="text" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('location')" />
                        </div>

                        <!-- Price -->
                        <div>
                            <x-input-label for="price" :value="__('Price (Rp.)')" />
                            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" required />
                            <x-input-error class="mt-2" :messages="$errors->get('price')" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full" required></textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <!-- Image -->
                        <div>
                            <x-input-label for="image" :value="__('Image')" />
                            <input id="image" name="image" type="file" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div class="flex items-center gap-4 mt-4">
                            <x-primary-button>{{ __('Post Item') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
