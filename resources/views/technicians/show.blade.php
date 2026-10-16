<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Technician profile</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm p-8">
                <div class="flex items-center gap-5">
                    <div class="h-20 w-20 rounded-full bg-violet-100 flex items-center justify-center text-violet-700 text-2xl font-bold">{{ strtoupper(substr($technician->name, 0, 1)) }}</div>
                    <div>
                        <div class="text-2xl font-bold">{{ $technician->name }}</div>
                        <div class="text-gray-500">{{ $technician->specialization ?? 'General repair specialist' }}</div>
                    </div>
                </div>
                <p class="mt-6 text-gray-700">{{ $technician->bio ?? 'Passionate about fixing everyday items and helping the community repair what they love.' }}</p>
                <div class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                    <div class="bg-violet-50 rounded-xl p-4"><div class="text-gray-500">Experience</div><div class="mt-2 font-semibold">6+ years</div></div>
                    <div class="bg-emerald-50 rounded-xl p-4"><div class="text-gray-500">Service area</div><div class="mt-2 font-semibold">{{ $technician->service_area ?? 'Local area' }}</div></div>
                    <div class="bg-slate-100 rounded-xl p-4"><div class="text-gray-500">Availability</div><div class="mt-2 font-semibold">Available this week</div></div>
                </div>
                <div class="mt-8 flex gap-3">
                    <a href="{{ route('appointments.create') }}" class="bg-violet-600 text-white px-5 py-2 rounded-lg">Request repair</a>
                    <a href="{{ route('conversations.index') }}" class="bg-slate-200 text-slate-900 px-5 py-2 rounded-lg">Message technician</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
