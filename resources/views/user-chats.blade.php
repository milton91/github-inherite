<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Chats
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg">
                <div class="p-6 space-y-4">
                    @foreach ($chats as $chat)
                        <div class="border-b pb-4 mb-4">
                            <h3 class="text-lg font-semibold">
                                Chat about <a href="{{ route('chat.index', $chat->product->id) }}" class="text-blue-600 hover:underline">
                                    {{ $chat->product->name }}
                                </a>
                            </h3>
                            <p class="text-gray-600">Last message: {{ $chat->message }}</p>
                            <p class="text-sm text-gray-500">Sent at: {{ $chat->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    @endforeach

                    @if ($chats->isEmpty())
                        <p class="text-gray-600">You have no chats yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
