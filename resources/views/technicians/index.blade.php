<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Find technicians</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($technicians as $technician)
                    <div class="bg-white rounded-2xl shadow-sm p-5">
                        <div class="flex items-center gap-4">
                            <div class="h-14 w-14 rounded-full bg-violet-100 flex items-center justify-center text-violet-700 font-bold">{{ strtoupper(substr($technician->name, 0, 1)) }}</div>
                            <div>
                                <div class="font-semibold text-lg">{{ $technician->name }}</div>
                                <div class="text-sm text-gray-500">{{ $technician->specialization ?? 'General repairs' }}</div>
                            </div>
                        </div>
                        <p class="mt-4 text-sm text-gray-600">{{ $technician->bio ?? 'Experienced repair specialist.' }}</p>
                        <div class="mt-4 flex justify-between text-sm text-gray-600">
                            <span>Service area</span>
                            <span>{{ $technician->service_area ?? 'Local' }}</span>
                        </div>
                        <div class="mt-2 flex justify-between text-sm text-gray-600">
                            <span>Rating</span>
                            <span>4.9/5</span>
                        </div>
                        <div class="mt-5 flex gap-3">
                            <a href="{{ route('technicians.show', $technician->id) }}" class="flex-1 text-center bg-violet-600 text-white px-3 py-2 rounded-lg">View profile</a>
                            <a href="{{ route('conversations.index') }}" class="flex-1 text-center bg-slate-200 text-slate-900 px-3 py-2 rounded-lg">Message</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
