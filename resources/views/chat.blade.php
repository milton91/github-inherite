<x-app-layout>
    <x-slot:title>{{ $product->name }} - Chat</x-slot>

    <div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Chat about "{{ $product->name }}"</h1>

        <!-- Chat Messages -->
        <div class="bg-gray-100 p-4 rounded-lg mb-6 h-96 overflow-y-scroll">
            @foreach ($chats as $chat)
                <div class="mb-4">
                    <strong>{{ $chat->user->name }}:</strong>
                    <p>{{ $chat->message }}</p>
                    <small class="text-gray-500">{{ $chat->created_at->diffForHumans() }}</small>
                </div>
            @endforeach
        </div>

        <!-- Chat Form -->
        <form method="POST" action="{{ route('chat.store', $product->id) }}">
            @csrf
            <textarea name="message" rows="3" class="w-full p-2 border rounded-lg" placeholder="Type your message..."></textarea>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-2">Send</button>
        </form>
    </div>
</x-app-layout>
