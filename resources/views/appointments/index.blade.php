<x-app-layout>
    <x-slot name="header">
        <div>
            <p class="text-sm font-medium text-slate-500">Stay on schedule</p>
            <h1 class="mt-1 text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">Appointments</h1>
        </div>
    </x-slot>

    <div class="space-y-6">
        <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-end">
            <div>
                <h2 class="text-lg font-bold text-slate-900">Your appointments</h2>
                <p class="mt-1 text-sm text-slate-500">Manage your repair visits and booking requests.</p>
            </div>
            <a href="{{ route('appointments.create') }}" class="inline-flex items-center justify-center gap-2 rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-violet-700">
                <span class="text-lg leading-none">+</span> Book appointment
            </a>
        </div>

        @if($appointments->isEmpty())
            <div class="surface-card px-6 py-14 text-center">
                <span class="mx-auto grid h-14 w-14 place-items-center rounded-2xl bg-violet-50 text-violet-700">
                    <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><rect x="3" y="5" width="18" height="16" rx="2"/><path stroke-linecap="round" d="M16 3v4M8 3v4M3 10h18"/></svg>
                </span>
                <h3 class="mt-4 font-semibold text-slate-900">Nothing on your calendar yet</h3>
                <p class="mt-1 text-sm text-slate-500">Book a time with a technician to get a repair underway.</p>
                <a href="{{ route('appointments.create') }}" class="mt-5 inline-flex rounded-xl bg-violet-600 px-4 py-2.5 text-sm font-semibold text-white hover:bg-violet-700">Book an appointment</a>
            </div>
        @else
            <div class="grid gap-4">
                @foreach($appointments as $appointment)
                    @php
                        $statusStyle = match (strtolower($appointment->status)) {
                            'accepted', 'confirmed', 'scheduled' => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
                            'cancelled', 'declined' => 'bg-rose-50 text-rose-700 ring-rose-600/20',
                            default => 'bg-amber-50 text-amber-700 ring-amber-600/20',
                        };
                    @endphp
                    <article class="surface-card flex flex-col gap-5 p-5 sm:flex-row sm:items-center sm:p-6">
                        <div class="grid h-14 w-14 shrink-0 place-items-center rounded-2xl bg-violet-50 text-center text-xs font-bold leading-tight text-violet-700">
                            <span>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M') }}<br>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d') }}</span>
                        </div>
                        <div class="min-w-0 flex-1">
                            <div class="flex flex-wrap items-center gap-2">
                                <h2 class="font-bold text-slate-900">Repair appointment</h2>
                                <span class="rounded-full px-2.5 py-1 text-xs font-semibold ring-1 ring-inset {{ $statusStyle }}">{{ $appointment->status }}</span>
                            </div>
                            <p class="mt-1 text-sm text-slate-500">{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('l, F j, Y') }} at {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}</p>
                            <p class="mt-1 text-sm text-slate-600">Technician: <span class="font-medium text-slate-800">{{ $appointment->technician?->name ?? 'Not available' }}</span></p>
                        </div>
                        @if($appointment->notes)
                            <p class="max-w-sm border-t border-slate-100 pt-3 text-sm text-slate-500 sm:border-l sm:border-t-0 sm:pl-5 sm:pt-0">{{ $appointment->notes }}</p>
                        @endif
                    </article>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
