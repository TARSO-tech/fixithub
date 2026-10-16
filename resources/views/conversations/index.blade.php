<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Messages</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <div class="border-r border-gray-200 p-4 bg-slate-50">
                        <h3 class="font-semibold mb-4">Conversations</h3>
                        <form method="POST" action="{{ route('conversations.store') }}" class="space-y-3">
                            @csrf
                            <select name="recipient_id" class="w-full rounded-md border-gray-300">
                                @foreach($contacts as $contact)
                                    <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                                @endforeach
                            </select>
                            <textarea name="body" rows="3" class="w-full rounded-md border-gray-300" placeholder="Write a message..."></textarea>
                            <button type="submit" class="w-full bg-violet-600 text-white px-3 py-2 rounded-lg">Send</button>
                        </form>
                    </div>
                    <div class="lg:col-span-2 p-5">
                        @if($conversations->isEmpty())
                            <p class="text-gray-600">No conversations yet.</p>
                        @else
                            @foreach($conversations as $conversation)
                                <div class="space-y-3">
                                    @foreach($conversation->messages as $message)
                                        <div class="{{ $message->sender_id === auth()->id() ? 'text-right' : 'text-left' }}">
                                            <div class="inline-block rounded-xl px-4 py-2 {{ $message->sender_id === auth()->id() ? 'bg-violet-600 text-white' : 'bg-slate-100 text-slate-800' }}">
                                                {{ $message->body }}
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
