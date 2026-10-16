<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Request a repair</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-sm p-6">
                <form method="POST" action="{{ route('repair-requests.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Repair title</label>
                        <input name="title" value="{{ old('title') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Item name</label>
                            <input name="item_name" value="{{ old('item_name') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Repair category</label>
                            <select name="category" class="mt-1 block w-full rounded-md border-gray-300" required>
                                @foreach(['Smartphones','Laptops','Computers','Household Appliances','Furniture','Bicycles','Other Items'] as $category)
                                    <option value="{{ $category }}" {{ old('category') === $category ? 'selected' : '' }}>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Problem description</label>
                        <textarea name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300" required>{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Preferred repair date</label>
                            <input type="date" name="preferred_date" value="{{ old('preferred_date') }}" class="mt-1 block w-full rounded-md border-gray-300">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Service location</label>
                            <input name="service_location" value="{{ old('service_location', 'Downtown') }}" class="mt-1 block w-full rounded-md border-gray-300" required>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Preferred technician</label>
                        <select name="preferred_technician" class="mt-1 block w-full rounded-md border-gray-300">
                            <option value="">No preference</option>
                            @foreach($technicians as $technician)
                                <option value="{{ $technician->id }}" {{ old('preferred_technician') == $technician->id ? 'selected' : '' }}>{{ $technician->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="bg-violet-600 text-white px-5 py-2 rounded-lg">Submit request</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
