<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Schedule an appointment</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <form method="POST" action="{{ route('appointments.store') }}" class="space-y-5">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Select technician</label>
                        <select name="technician_id" class="mt-1 block w-full rounded-md border-gray-300" required>
                            @foreach($technicians as $technician)
                                <option value="{{ $technician->id }}">{{ $technician->name }} · {{ $technician->specialization ?? 'Repair expert' }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Appointment date</label>
                            <input type="date" name="appointment_date" class="mt-1 block w-full rounded-md border-gray-300" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Appointment time</label>
                            <input type="time" name="appointment_time" class="mt-1 block w-full rounded-md border-gray-300" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Notes</label>
                        <textarea name="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-violet-600 text-white px-5 py-2 rounded-lg">Confirm booking</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
