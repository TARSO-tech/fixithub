<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Repair requests</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <div class="flex justify-between items-center">
                <h3 class="text-lg font-semibold">Your repair requests</h3>
                <a href="{{ route('repair-requests.create') }}" class="bg-violet-600 text-white px-4 py-2 rounded-lg">Create request</a>
            </div>

            @if($repairRequests->isEmpty())
                <div class="bg-white rounded-2xl p-6 text-gray-700 shadow-sm">No repair requests yet.</div>
            @else
                <div class="space-y-4">
                    @foreach($repairRequests as $request)
                        <div class="bg-white rounded-2xl shadow-sm p-5">
                            <div class="flex justify-between items-center">
                                <div>
                                    <div class="text-xl font-semibold">{{ $request->title }}</div>
                                    <div class="text-sm text-gray-500">{{ $request->item_name }} · {{ $request->category }}</div>
                                </div>
                                <span class="px-3 py-1 rounded-full bg-violet-100 text-violet-700 text-xs font-semibold">{{ $request->status }}</span>
                            </div>
                            <p class="mt-3 text-gray-600">{{ $request->description }}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
